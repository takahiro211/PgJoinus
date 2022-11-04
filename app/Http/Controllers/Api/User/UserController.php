<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ユーザー名変更
    public function nameEdit(Request $request)
    {
        // ユーザーID取得
        $userId = Auth::id();

        // ユーザー名を変更する
        $userInfo = User::find($userId);
        $userInfo->name = $request->name;
        $userInfo->save();

        // 返却
        return response()->json(['update', true], Response::HTTP_OK);
    }
}
