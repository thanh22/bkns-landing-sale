<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    /**
     * 
     */
    public function __construct(){}

    public function index()
    {
        return Category::paginate(PAGE_LIMIT);
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
            Storage::disk('public')->putFileAs('/categories/', $request['image'], $name);
            $data = [
                'name' => $request['name'],
                'image' => $name,
                'active' => $request['active'],
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ];

            $category = Category::create($data);
            DB::commit();

            return [
                'status' => true,
                'data' => $category
            ];
        } catch (\Exception $e) {
            Log::error("create category error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            Log::error('category data', $request);
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'Create category error ' . $e->getMessage()
            ];
        }
    }

    public function detail($id)
    {
        $data = Category::find($id);
        return response()->json(['data'  => $data]);
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $banner = Category::find($id);
            if (!empty($request['image'])) {
                $name = $request['image']->getClientOriginalName();
                Storage::disk('public')->putFileAs('/categories/', $request['image'], $name);
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
            Log::error('category data', $request);
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'update banner error ' . $e->getMessage()
            ];
        }
    }

    public function delete($id)
    {
        $banner = Category::find($id);

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
