<?php

namespace App\Http\Controllers;

use App\Repositories\ItemRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class HomeController extends Controller
{
    public function __construct(private ItemRepositoryInterface $itemRepository)
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $items = $this->itemRepository->getAllItem();

        if ($items === null) {
            throw new InternalErrorException('Cannot fetch items');
        }

        $page = $request->get('page', 1);
        $perPage = 10;

        $paginator = new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page
        );

        return view('home');
    }
}
