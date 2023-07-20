<?php

namespace App\Http\Controllers;

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

        return $detail;
    }

    public function purchaseView(Request $request, string $id)
    {
        $detail = $this->itemRepository->getItem($id);

        if ($detail === null) {
            throw new NotFoundHttpException('Item not found');
        }

        $quantity = $request->get('quantity', 1);
    }

    public function purchase(Request $request)
    {
        $validated = $request->validate([
            'itemId' => 'required|uuid',
            'quantity' => 'required|integer|gt:0'
        ]);

        $detail = $this->itemRepository->getItem($validated['itemId']);

        if ($detail === null) {
            throw new NotFoundHttpException('Item not found');
        }

        if ($detail->item->quantity < $validated['quantity']) {
            throw ValidationException::withMessages([
                'quantity' => ['Invalid quantity'],
            ]);
        }

        $this->itemRepository->subtractStock($validated['itemId'], $validated['quantity']);

        //
    }
}
