<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
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
        $customers = Customer::with('user')->paginate(self::CUSTOMERS_PER_PAGE);

        return view('customer.index', ['customers' => $customers]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customer.show', ['customer' => $customer]);
    }
}
