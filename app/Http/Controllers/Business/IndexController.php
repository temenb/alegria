<?php

namespace App\Http\Controllers\Business;

use App\Models\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    CONST CUSTOMERS_PER_PAGE = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Business::with('user')->paginate(self::CUSTOMERS_PER_PAGE);

        return view('business.index', ['businesses' => $businesses]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('business.show', ['business' => $business]);
    }
}
