<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\InformationService;
use Illuminate\Http\Request;
use stdClass;

class InformationController extends Controller
{
    /**
     * @var InformationService
     */
    protected $informationService;

    /**
     * @param InformationService $informationService
     */
    public function __construct(
        InformationService $informationService
    ){
        $this->informationService = $informationService;
    }

    public function index()
    {
        $information = $this->informationService->index();
        $address = $information ? (array) json_decode($information->address) : [];
        $socialNetworks =  $information ? json_decode($information->social_networks) : [];

        return view('admins.information.index', compact('information', 'address', 'socialNetworks'));
    }

    public function store(Request $request)
    {
        $response = $this->informationService->store($request->all());
        if ($response['status']) {
            return redirect()->back()->with('success', 'Update information successfully!');
        }

        return redirect()->back()->with('error', 'Update information error!');
    }
}
