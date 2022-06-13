<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Service::where('name', 'ILIKE', '%'. $query. '%')->get();
        return response()->json($filterResult);
    }


}
