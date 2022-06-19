<?php

namespace App\Http\Controllers\File;

use App\Http\Requests\File\BusinessRequest;
use App\Models\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function business($business, BusinessRequest $request)
    {
        return redirect()->route('businesses.index');
    }
}
