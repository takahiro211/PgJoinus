<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    // フォロー中ユーザー取得
    public function following()
    {
        // 自分のユーザーID取得
        $userId = Auth::id();
        $ret = DB::table('followers')
            ->select(
                'users.id',
                'users.name',
                'followers.created_at',
            )
            ->where('followers.follower_user_id', $userId)
            ->join('users', 'followers.target_user_id', '=', 'users.id')
            ->orderBy('followers.created_at', 'desc')
            ->paginate(10);

        // 返却
        return response()->json($ret, Response::HTTP_OK);
    }

    // フォロワー取得
    public function follower()
    {
        // 自分のユーザーID取得
        $userId = Auth::id();
        $ret = DB::table('followers')
            ->select(
                'users.id',
                'users.name',
                'followers.created_at',
            )
            ->where('followers.target_user_id', $userId)
            ->join('users', 'followers.follower_user_id', '=', 'users.id')
            ->orderBy('followers.created_at', 'desc')
            ->paginate(10);

        // 返却
        return response()->json($ret, Response::HTTP_OK);
    }

    // フォロー処理
    public function follow(Request $request)
    {
        // ユーザーID取得
        $userId = Auth::id();

        // 既にお気に入り登録済みかチェック
        $isExists = DB::table('followers')
            ->where('target_user_id', $request->userId)
            ->where('follower_user_id', $userId)
            ->exists();

        // 存在しない場合のみ追加
        if (!$isExists) {
            // favoriteテーブルにレコードを追加
            DB::table('followers')->insert([
                'target_user_id' => $request->userId,
                'follower_user_id' => $userId,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }

        // 返却
        return $isExists ?
            response()->json(['follow' => false], Response::HTTP_BAD_REQUEST)
            : response()->json(['follow' => true], Response::HTTP_OK);
    }

    public function remove(Request $request)
    {
        // ユーザーID取得
        $userId = Auth::id();

        // favoriteテーブルのレコードを物理削除
        DB::table('followers')
            ->where('target_user_id', $request->userId)
            ->where('follower_user_id', $userId)
            ->delete();

        // 返却
        return response()->json(['remove' => true], Response::HTTP_OK);
    }
}
