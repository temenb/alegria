<?php

namespace App\Http\Controllers\Business;

use App\Http\Requests\Business\StoreRequest;
use App\Models\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    CONST BUSINESSES_PER_PAGE = 10;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(StoreRequest $request)
    {
        $business = new Business($request->all());
        $business->user()->associate(Auth::user());
        $business->save();

        return redirect()->route('businesses.index');
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
