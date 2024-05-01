<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotions\StorePromotionRequest;
use App\Http\Requests\Promotions\UpdatePromotionRequest;
use App\Services\PromotionService;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * @var PromotionService
     */
    protected $promotionService;

    /**
     * @param PromotionService $promotionService
     */
    public function __construct(
        PromotionService $promotionService
    ){
        $this->promotionService = $promotionService;
    }

    public function index()
    {
        $promotions = $this->promotionService->index();
        return view('admins.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admins.promotions.create');
    }

    public function store(StorePromotionRequest $request)
    {
        $response = $this->promotionService->store($request->all());
        if ($response['status']) {
            return redirect()->route('promotion-list')->with('success', 'Create promotion successfully!');
        }

        return redirect()->back()->with('error', 'Create promotion error!');
    }

    public function detail($id)
    {
        $promotion = $this->promotionService->detail($id);
        if (!$promotion['status']) {
            $item = 'Promotion';
            return view('admins.404', compact('item'));
        }
        $promotion = $promotion['data'];
        return view('admins.promotions.update', compact('promotion'));
    }

    public function update(UpdatePromotionRequest $request, $id)
    {
        $response = $this->promotionService->update($request->all(), $id);
        if ($response['status']) {
            return redirect()->route('promotion-list')->with('success', 'Update product successfully!');
        }

        return redirect()->back()->with('error', 'Update product error!');
    }

    public function delete($id)
    {
        $response = $this->promotionService->delete($id);
        if ($response['status']) {
            return redirect()->back()->with('success', 'delete product successfully!');
        }

        return redirect()->back()->with('error', 'delete product error!');
    }
}
