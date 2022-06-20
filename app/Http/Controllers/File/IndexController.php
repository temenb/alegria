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
    const PUBLIC_PATH = 'public/';
    const BUSINESS_PATH = 'images/business';
    const USER_PATH = 'images/user';

    public function business(Business $business, BusinessRequest $request)
    {
        foreach ($request->file('files') as $file) {
            $filename = $file->store(self::PUBLIC_PATH . self::BUSINESS_PATH);
            $fileUrl = substr($filename, mb_strlen(self::PUBLIC_PATH));
            $mFile = new File(['filename' => $fileUrl]);
            $mFile->fileable()->associate($business);
            $mFile->save();
        }

        return redirect()->back();
    }

    public function userAvatar(User $user, UserAvatarRequest $request)
    {
        $file = $request->file('avatar');
        $filename = $file->store(self::PUBLIC_PATH . DIRECTORY_SEPARATOR . self::USER_PATH);
        $fileUrl = substr($filename, mb_strlen(self::PUBLIC_PATH));
        $mFile = new File(['filename' => $fileUrl, 'avatar' => true]);
        $mFile->fileable()->associate($user);
        $mFile->save();

        return redirect()->back();
    }
}
