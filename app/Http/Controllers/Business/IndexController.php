<?php

namespace App\Http\Controllers\Business;

use App\Models\Business;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    CONST BUSINESSES_PER_PAGE = 10;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('business.create2');
        return view('business.create');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $businesses = Business::with('user')->paginate(self::BUSINESSES_PER_PAGE);

        return view('business.index', ['businesses' => $businesses]);
    }

    /**
     * @param Business $business
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Business $business)
    {
        return view('business.show', ['business' => $business]);
    }
}
