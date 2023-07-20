<?php

namespace App\Http\Controllers;

use App\Models\ItemHistory;
use App\Repositories\ItemRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ItemController extends Controller
{
    public function __construct(private readonly ItemRepositoryInterface $itemRepository)
    {

    }

    public function view(Request $request, string $id)
    {
        $detail = $this->itemRepository->getItem($id);

        if ($detail === null) {
            throw new NotFoundHttpException('Item not found');
        }

        return view('detail', [
            'item' => $detail['item'],
            'company' => $detail['company'],
        ]);
    }

    public function purchaseView(Request $request, string $id)
    {
        $detail = $this->itemRepository->getItem($id);

        if ($detail === null) {
            throw new NotFoundHttpException('Item not found');
        }

        $quantity = $request->get('quantity', 1);

        return view('checkout', [
            'quantity' => $quantity,
            'item' => $detail['item']
        ]);
    }

    public function purchase(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|uuid',
            'quantity' => 'required|integer|gt:0'
        ]);

        $detail = $this->itemRepository->getItem($validated['id']);

        if ($detail === null) {
            throw new NotFoundHttpException('Item not found');
        }

        if ($detail['item']->resource['stok'] < $validated['quantity']) {
            throw ValidationException::withMessages([
                'quantity' => ['Invalid quantity'],
            ]);
        }

        $this->itemRepository->subtractStock($validated['id'], $validated['quantity']);

        ItemHistory::create([
            'item_name' => $detail['item']->resource['nama'],
            'price' => $detail['item']->resource['harga'],
            'quantity' => $validated['quantity'],
            'item_company_name' => $detail['company']->resource['nama'],
            'item_id' => $detail['item']->resource['id'],
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('history');
    }
}
