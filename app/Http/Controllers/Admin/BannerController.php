<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BannerService;
use App\Http\Requests\Banners\StoreBannerRequest;
use App\Http\Requests\Banners\UpdateBannerRequest;

class BannerController extends Controller
{
    /**
     * @var BannerService
     */
    protected $bannerService;

    /**
     * @param BannerService $bannerService
     */
    public function __construct(
        BannerService $bannerService
    ){
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        $banners = $this->bannerService->index();

        return view('admins.banners.index', compact('banners'));
    }

    public function create(StoreBannerRequest $request)
    {
        $response = $this->bannerService->create($request->all());
        if ($response['status']) {
            return redirect()->back()->with('success', 'Create banner successfully!');
        }

        return redirect()->back()->with('error', 'Create banner error!');
    }

    public function detail($id)
    {
        $banner = $this->bannerService->detail($id);

        return $banner;
    }

    public function update(UpdateBannerRequest $request, $id)
    {
        $response = $this->bannerService->update($request->all(), $id);
        if ($response['status']) {
            return redirect()->back()->with('success', 'Update banner successfully!');
        }

        return redirect()->back()->with('error', 'Update banner error!');
    }

    public function delete($id)
    {
        $response = $this->bannerService->delete($id);
        if ($response['status']) {
            return redirect()->back()->with('success', 'delete banner successfully!');
        } else {
            $item = 'Banner';
            return view('admins.404', compact('item'));
        }
    }
}
