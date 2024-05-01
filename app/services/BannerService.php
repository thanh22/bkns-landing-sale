<?php

namespace App\Services;

use App\Models\Banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BannerService
{
    /**
     * 
     */
    public function __construct(){}

    public function index()
    {
        return Banner::paginate(PAGE_LIMIT);
    }

    /**
     * @param $data
     * @return array
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $name = $request['image']->getClientOriginalName();
            Storage::disk('public')->putFileAs('/banners/', $request['image'], $name);
            $data = [
                'name' => $request['name'],
                'image' => $name,
                'active' => $request['active'],
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ];

            $banner = Banner::create($data);
            DB::commit();

            return [
                'status' => true,
                'data' => $banner
            ];
        } catch (\Exception $e) {
            Log::error("create banner error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            Log::error('banner data', $request);
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'Create banner error ' . $e->getMessage()
            ];
        }
    }

    public function detail($id)
    {
        $data = Banner::find($id);
        return response()->json(['data'  => $data]);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $banner = Banner::find($id);
            if (!empty($request['image'])) {
                $name = $request['image']->getClientOriginalName();
                Storage::disk('public')->putFileAs('/banners/', $request['image'], $name);
            } else {
                $name = $banner->image;
            }

            $banner->name = $request['name'];
            $banner->image = $name;
            $banner->active = $request['active'];
            $banner->updated_by = auth()->user()->id;
            $banner->save();

            DB::commit();

            return [
                'status' => true,
                'data' => $banner
            ];
        } catch (\Exception $e) {
            Log::error("update banner error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            Log::error('banner data', $request);
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'update banner error ' . $e->getMessage()
            ];
        }
    }

    public function delete($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return [
                'status' => false
            ];
        }
        DB::beginTransaction();
        try {
            $banner->delete();
            DB::commit();

            return [
                'status' => true,
            ];
        } catch (\Exception $e) {
            Log::error("delete banner error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'delete banner error ' . $e->getMessage()
            ];
        }
    }
}
