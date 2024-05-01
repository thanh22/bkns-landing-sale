<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Option;

class ProductService
{
    /**
     * 
     */
    public function __construct(){}

    public function index()
    {
        return Product::paginate(PAGE_LIMIT);
    }

    /**
     * @param $data
     * @return array
     */
    public function create($request)
    {
        DB::beginTransaction();
        try {
            $data = [
                'name' => $request['name'],
                'category_id' => $request['category_id'],
                'description' => $request['description'],
                'cost' => $request['cost'],
                'discount' => $request['discount'],
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ];

            $product = Product::create($data);

            $dataOptions = [];
            foreach ($request['option'] as $option) {
                $dataOptions[] = [
                    'product_id' => $product->id,
                    'name_option' => $option['name_option'],
                    'value_option' => $option['value_option'],
                    'old_value_option' => $option['old_value_option'],
                    'use_option' => $option['use_option'],
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ];
            }
            Option::insert($dataOptions);

            DB::commit();

            return [
                'status' => true,
                'data' => $product
            ];
        } catch (\Exception $e) {
            Log::error("create product error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            Log::error('product data', $request);
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'Create product error ' . $e->getMessage()
            ];
        }
    }

    public function detail($id)
    {
        $data = Product::find($id);
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
            $product = Product::find($id);
            $product->name = $request['name'];
            $product->category_id = $request['category_id'];
            $product->description = $request['description'];
            $product->cost = $request['cost'];
            $product->discount = $request['discount'];
            $product->updated_by = auth()->user()->id;
            $product->save();

            foreach ($request['option'] as $key => $value) {
                $option = Option::find($key);
                if ($option) {
                    $option->name_option = $value['name_option'];
                    $option->value_option = $value['value_option'];
                    $option->old_value_option = $value['old_value_option'];
                    $option->use_option = $value['use_option'];
                    $option->updated_by = auth()->user()->id;
                    $option->save();
                } else {
                    $value['product_id'] = $id;
                    $value['created_by'] = auth()->user()->id;
                    $value['updated_by'] = auth()->user()->id;
                    Option::create($value);
                }
                
            }
            // Option::whereIn('id', array_keys($request['option']))->update($dataOptions);

            DB::commit();

            return [
                'status' => true,
                'data' => $product
            ];
        } catch (\Exception $e) {
            Log::error("create product error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            Log::error('product data', $request);
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'Create product error ' . $e->getMessage()
            ];
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);

        DB::beginTransaction();
        try {
            $product->delete();
            DB::commit();

            return [
                'status' => true,
            ];
        } catch (\Exception $e) {
            Log::error("delete product error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'delete product error ' . $e->getMessage()
            ];
        }
    }
}
