<?php

namespace App\Services;

use App\Models\AccessLog;
use App\Models\Analytics;
use Exception;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PostAccess;
use Carbon\Carbon;

class AnalyticsService
{
    //Aumenta uma visualização no site, é dividido por dia e post
    public static function newView(Request $request, $resourceType = 'page',  $resourceId = null)
    {
        $date = \Illuminate\Support\Carbon::today()->toDateString();
        $deviceType = self::getDeviceType();
        $ip = request()->ip();

        $excludedIps = ['2804:4a50:f037:7900:595d:6d3:9ee2:ba41', '2804:4a50:f037:7900:d847:f6a5:e2eb:e57e', '2804:4a50:f037:7900:7cd8:d06d:dbdd:cab5'];

        if (in_array($ip, $excludedIps)) {
            return;
        }

        $sessionKey = "viewed_{$resourceId}_{$date}_{$deviceType}_{$ip}_{$resourceType}";

        if (session()->has($sessionKey)) {
            return;
        }

        self::trackAccess($request, $resourceType, $resourceId);

        session()->put($sessionKey, true);

        try {
            $register = Analytics::where('date_analytics_view', $date)
                ->where($resourceType, $resourceId)
                ->where('deviceType', $deviceType)
                ->first();

            if (!$register) {
                Analytics::create([
                    'date_analytics_view' => $date,
                    'views' => 1,
                    $resourceType => $resourceId,
                    'deviceType' => $deviceType
                ]);
            } else {
                $register->increment('views');
            }
        } catch (\Exception $e) {
            Log::error('Erro ao registrar visualização: ' . $e->getMessage());
        }
    }

    //Recupera o número de visualizações de hoje
    public static function viewToday()
    {
        $date = Date::today()->toDateString();
        $views = 0;
        $viewsDesktop = 0;
        $viewsMobile = 0;
        try {
            $registers = Analytics::where('date_analytics_view',  $date)->get();
            foreach ($registers as $register) {
                $views += $register->views;

                if ($register->deviceType == 1) {
                    $viewsMobile += $register->views;
                }

                if ($register->deviceType == 2) {
                    $viewsDesktop += $register->views;
                }
            }
        } catch (Exception $e) {
        }

        return ['allViews' => $views, 'viewsDesktop' =>  $viewsDesktop, 'viewsMobile' => $viewsMobile];
    }

    public static function viewTodayPercentage()
    {
        $today = Date::today();
        $lastWeek = now()->subDays(7)->toDateString();
        $todayString = $today->toDateString();

        $viewsToday = 0;
        $viewsLastWeek = 0;

        try {
            // Buscar visualizações de hoje
            $todayRegisters = Analytics::whereDate('date_analytics_view', $todayString)->get();
            if ($todayRegisters) {
                foreach ($todayRegisters as $item) {
                    $viewsToday += $item->views;
                }
            }

            // Buscar visualizações do mesmo dia da semana passada
            $lastWeekRegisters = Analytics::whereDate('date_analytics_view', $lastWeek)->get();
            if ($lastWeekRegisters) {
                foreach ($lastWeekRegisters as $item) {
                    $viewsLastWeek += $item->views;
                }
            }

            // Debug para verificar os valores
            Log::info("Hoje: $todayString -> Views: $viewsToday | Semana Passada: $lastWeek -> Views: $viewsLastWeek");


            if ($viewsLastWeek > 0) {
                $percentageChange = (($viewsToday - $viewsLastWeek) / $viewsLastWeek) * 100;
            } else {
                $percentageChange = $viewsToday > 0 ? 100 : 0;
            }
        } catch (Exception $e) {
            Log::error("Erro ao calcular variação de views: " . $e->getMessage());
            return 0;
        }

        return round($percentageChange, 2); // Arredonda para 2 casas decimais
    }


    public static function viewsWeek()
    {
        $endDate = Date::today();
        $startDate = $endDate->copy()->subDays(6);

        // Criar um array de referência para os últimos 7 dias
        $dateRange = [];
        for ($i = 0; $i < 7; $i++) {
            $dateRange[$startDate->copy()->addDays($i)->toDateString()] = 0;
        }

        // Buscar dados do banco dentro do período
        $analyticsData = Analytics::whereBetween('date_analytics_view', [$startDate, $endDate])
            ->get();
        // dd($analyticsData);
        // Preencher o array de views com os valores do banco
        foreach ($dateRange as $date => $value) {
            foreach ($analyticsData as $item) {
                if ($date == $item->date_analytics_view) {
                    $dateRange[$date] += $item->views;
                }
            }
        }

        // Criar labels dinâmicos (mantendo hoje como último dia)
        $labels = [];
        $nomesDiasSemana = [
            'Sunday' => 'Domingo',
            'Monday' => 'Segunda',
            'Tuesday' => 'Terça',
            'Wednesday' => 'Quarta',
            'Thursday' => 'Quinta',
            'Friday' => 'Sexta',
            'Saturday' => 'Sábado',
        ];

        foreach (array_keys($dateRange) as $date) {
            $diaIngles = Date::parse($date)->format('l');
            $labels[] = $nomesDiasSemana[$diaIngles];
        }



        return ['labels' => $labels, 'views' => array_values($dateRange)];
    }

    public static function countViewsMonth()
    {
        $endDate = Date::today();
        $startDate = $endDate->copy()->subDays(30);
        $views = 0;

        $analyticsData = Analytics::whereBetween('date_analytics_view', [$startDate, $endDate])
            ->get();

        foreach ($analyticsData as $item) {
            $views += $item->views;
        }

        return $views;
    }

    public static function countViewsMonthProducts()
    {
        $endDate = Date::today();
        $startDate = $endDate->copy()->subDays(30);
        $views = 0;

        $analyticsData = Analytics::whereBetween('date_analytics_view', [$startDate, $endDate])->where('product_id', "!=", null)
            ->get();

        foreach ($analyticsData as $item) {
            $views += $item->views;
        }

        return $views;
    }


    protected static function trackAccess(Request $request, $resourceType = null, $resourceId = null)
    {
        $ip = $request->ip();
        $url = $request->path();
        $today = Carbon::today()->toDateString();
        $cacheKey = "geoip_{$ip}_{$today}";

        $location = Cache::remember($cacheKey, now()->addHours(24), function () use ($ip) {
            $response = Http::get("http://ip-api.com/json/{$ip}?fields=status,message,country,regionName,city,zip,lat,lon");
            return $response->json();
        });

        // Evita salvar acesso duplicado no mesmo dia
        $exists = AccessLog::where([
            ['ip', '=', $ip],
            ['resource_type', '=', $resourceType],
            ['resource_id', '=', $resourceId],
            ['date', '=', $today],
        ])->exists();

        if (!$exists) {
            AccessLog::create([
                'ip' => $ip,
                'resource_type' => $resourceType,
                'resource_id' => $resourceId,
                'url' => $url,
                'country' => $location['country'] ?? null,
                'region' => $location['regionName'] ?? null,
                'city' => $location['city'] ?? null,
                'zip' => $location['zip'] ?? null,
                'lat' => $location['lat'] ?? null,
                'lon' => $location['lon'] ?? null,
                'date' => $today,
            ]);
        }
    }

    protected static function getDeviceType()
    {
        $mobile = FALSE;
        $user_agents = array("iPhone", "iPad", "Android", "webOS", "BlackBerry", "iPod", "Symbian", "IsGeneric");

        foreach ($user_agents as $user_agent) {
            if (strpos($_SERVER['HTTP_USER_AGENT'], $user_agent) !== FALSE) {
                $mobile = TRUE;
                break;
            }
        }

        if ($mobile) {
            return 1;
        } else {
            return 2;
        }
    }
}
