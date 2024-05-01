<?php

namespace App\Services;

use App\Models\Information;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class InformationService
{
    /**
     * 
     */
    public function __construct(){}

    public function index()
    {
        return Information::find(ONE);
    }

    /**
     * @param $data
     * @return array
     */
    public function store($request)
    {
        DB::beginTransaction();
        try {
            $data = [
                'name' => $request['name'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'social_networks' => json_encode($request['social_networks']),
                'address' => json_encode($request['address']),
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ];

            $information = Information::updateOrCreate(
                ['id' => ONE],
                $data
            );
            DB::commit();

            return [
                'status' => true,
                'data' => $information
            ];
        } catch (\Exception $e) {
            Log::error("create information error " . $e->getFile() . ' ' . $e->getLine() . ' ' . $e->getMessage());
            Log::error('information data', $request);
            DB::rollBack();
            return [
                'status'    => false,
                'message'   => 'Create information error ' . $e->getMessage()
            ];
        }
    }
}
