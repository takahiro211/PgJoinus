<?php

namespace App\Http\Controllers\Api\Project;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
    {
        // ユーザーID取得
        $userId = Auth::id();

        // 既にお気に入り登録済みかチェック
        $isExists = DB::table('favorites')
            ->where('post_id', $request->postId)
            ->where('user_id', $userId)
            ->exists();

        // 存在しない場合のみ追加
        if (!$isExists) {
            // favoriteテーブルにレコードを追加
            DB::table('favorites')->insert([
                'post_id' => $request->postId,
                'user_id' => $userId
            ]);
        }

        // 返却
        return $isExists ?
            response()->json(['favorite' => false], Response::HTTP_BAD_REQUEST)
            : response()->json(['favorite' => true], Response::HTTP_OK);
    }

    public function remove(Request $request)
    {
        // ユーザーID取得
        $userId = Auth::id();

        // favoriteテーブルのレコードを物理削除
        DB::table('favorites')
            ->where('post_id', $request->postId)
            ->where('user_id', $userId)
            ->delete();

        // 返却
        return response()->json(['favorite_remove' => true], Response::HTTP_OK);
    }
}
