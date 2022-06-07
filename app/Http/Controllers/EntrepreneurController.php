<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneur;
use Illuminate\Http\Request;

class EntrepreneurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrepreneurs = Entrepreneur::all();
        var_export($entrepreneurs->toArray());
        die;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Entrepreneur $entrepreneur)
    {
        var_export($entrepreneur->toArray());
        die;
    }
}
