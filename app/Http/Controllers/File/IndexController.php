<?php

namespace App\Http\Controllers\File;

use App\Http\Requests\File\BusinessRequest;
use App\Http\Requests\File\UserAvatarRequest;
use App\Models\Business;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;

class IndexController extends Controller
{
    public function business(Business $business, BusinessRequest $request)
    {
        foreach ($request->file('files') as $file) {
            $filename = $file->store('business/images');
            $mFile = new File(['filename' => $filename]);
            $mFile->fileable()->associate($business);
            $mFile->save();
        }

        return redirect()->back();
    }

    public function userAvatar(User $user, UserAvatarRequest $request)
    {
        $file = $request->file('avatar');
        $filename = $file->store('business/images');
        $mFile = new File(['filename' => $filename, 'avatar' => true]);
        $mFile->fileable()->associate($user);
        $mFile->save();

        return redirect()->back();
    }
}
