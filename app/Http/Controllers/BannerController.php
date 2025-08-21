<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderby('updated_at', 'desc')->get();
        return view('admin.banners.index', [
            'banners' => $banners,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('foto_banner')) {
                $fileBanner = $request->file('foto_banner');
                $extensionBanner = $fileBanner->getClientOriginalExtension();
                $filenameBanner = Str::random(40) . '.' . $extensionBanner;

                $fileBanner->storeAs('media/banner/', $filenameBanner, 'public');

                $pathBanner = "/storage/media/banner/" . $filenameBanner;
            }

            if ($request->hasFile('banner_mobile')) {
                $fileMobile = $request->file('banner_mobile');
                $extensionMobile = $fileMobile->getClientOriginalExtension();
                $filenameMobile = Str::random(40) . '.' . $extensionMobile;

                $fileMobile->storeAs('media/banner/', $filenameMobile, 'public');

                $pathMobile = "/storage/media/banner/" . $filenameMobile;
            }

            Banner::create([
                'foto_banner' => isset($pathBanner) ? $pathBanner : NULL,
                'banner_mobile' => isset($pathMobile) ? $pathMobile : NULL,
                'mostrar' => isset($request->mostrar_banner) ? 1 : 0,
                'link' => isset($request->link_banner) ? $request->link_banner : NULL,
            ]);

            return redirect(route('banner.index'))->with('success', 'Banner postado com sucesso!');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Não conseguimos postar o banner, tente novamente mais tarde.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $banner = Banner::findOrFail($id);

        try {
            if ($request->hasFile('foto_banner')) {
                $fileBanner = $request->file('foto_banner');
                $extensionBanner = $fileBanner->getClientOriginalExtension();
                $filenameBanner = Str::random(40) . '.' . $extensionBanner;

                $fileBanner->storeAs('media/banner/', $filenameBanner, 'public');

                $pathBanner = "/storage/media/banner/" . $filenameBanner;
            } else {
                $pathBanner = $banner->foto_banner;
            }

            if ($request->hasFile('banner_mobile')) {
                $fileMobile = $request->file('banner_mobile');
                $extensionMobile = $fileMobile->getClientOriginalExtension();
                $filenameMobile = Str::random(40) . '.' . $extensionMobile;

                $fileMobile->storeAs('media/banner/', $filenameMobile, 'public');

                $pathMobile = "/storage/media/banner/" . $filenameMobile;
            } else {
                $pathMobile = $banner->banner_mobile;
            }

            $banner->foto_banner = $pathBanner;
            $banner->banner_mobile = $pathMobile;
            $banner->mostrar = isset($request->mostrar_banner) ? 1 : 0;
            $banner->link = isset($request->link_banner) ? $request->link_banner : NULL;

            $banner->save();

            return redirect(route('banner.index'))->with('success', 'Banner salvo com sucesso!');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Não conseguimos salvar o banner, tente novamente mais tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner excluído com sucesso!');
    }
}
