<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Promotion;

class PromotionService
{
    /**
     * 
     */
    public function __construct(){}

    public function index()
    {
        return Promotion::paginate(PAGE_LIMIT);
    }

    /**
     * @param $data
     * @return array
     */
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $name = $request['image']->getClientOriginalName();
            Storage::disk('public')->putFileAs('/promotions/', $request['image'], $name);
            $data = [
                'image' => $name,
                'image_position' => $request['image_position'],
                'position' => $request['position'],
                'content' => $request['content'],
                'active' => $request['active'],
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ];
            $promotion = Promotion::create($data);
            DB::commit();

            return [
                'status' => true,
                'data' => $promotion
            ];
        } catch (\Exception $e) {
            Log::error("create promotion error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            Log::error('promotion data', $request);
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'Create promotion error ' . $e->getMessage()
            ];
        }
    }

    public function detail($id)
    {
        $data = Promotion::find($id);
        if (!$data) {
            return [
                'status' => false
            ];
        }

        return [
            'status' => true,
            'data' => $data
        ];
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $promotion = Promotion::find($id);
            if (!empty($request['image'])) {
                $name = $request['image']->getClientOriginalName();
                Storage::disk('public')->putFileAs('/promotions/', $request['image'], $name);
            } else {
                $name = $promotion->image;
            }

            $promotion->image = $name;
            $promotion->image_position = $request['image_position'];
            $promotion->position = $request['position'];
            $promotion->content = $request['content'];
            $promotion->active = $request['active'];
            $promotion->updated_by = auth()->user()->id;
            $promotion->save();

            DB::commit();

            return [
                'status' => true,
                'data' => $promotion
            ];
        } catch (\Exception $e) {
            Log::error("update promotion error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            Log::error('promotion data', $request);
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'Create promotion error ' . $e->getMessage()
            ];
        }
    }

    public function delete($id)
    {
        $promotion = Promotion::find($id);

        DB::beginTransaction();
        try {
            $promotion->delete();
            DB::commit();

            return [
                'status' => true,
            ];
        } catch (\Exception $e) {
            Log::error("delete promotion error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'delete promotion error ' . $e->getMessage()
            ];
        }
    }
}
