<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use App\Models\Post;
use App\Models\Product;
use App\Services\AnalyticsService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::with(['analytics' => function ($query) {
            $query->select('id', 'product_id', 'views');
        }])->orderBy('created_at', 'DESC')->paginate(10);


        $analytics = [
            "viewsToday" => AnalyticsService::viewToday(),
            "viewTodayPercentage" => AnalyticsService::viewTodayPercentage(),
            "viewsWeek" => AnalyticsService::viewsWeek(),
            "viewsMonth" => AnalyticsService::countViewsMonth()
        ];

        $moreViewSecures = Product::withSum('analytics', 'views')
            ->orderByDesc('analytics_sum_views')
            ->with('analytics')
            ->paginate(5);


        return view('admin.dashboard', compact('products', 'analytics', 'moreViewSecures', 'products'));
    }
}
