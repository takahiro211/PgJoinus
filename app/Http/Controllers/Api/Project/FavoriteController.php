<?php

namespace App\Http\Controllers\Api\Project;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    // お気に入り一覧を返却
    public function favoriteList()
    {
        // ユーザーID取得
        $userId = Auth::id();

        // お気に入り登録済みプロジェクト一覧を取得
        $ret = DB::table('favorites')
            ->select(
                'posts.id',
                'posts.title',
                'posts.description',
                'posts.detail',
                'posts.url',
                'posts.author',
                'posts.skill',
                'posts.free_tag',
                'posts.created_at',
                'posts.updated_at'
            )
            ->where('user_id', $userId)
            ->join('posts', 'favorites.post_id', '=', 'posts.id')
            ->get();

        // 返却
        return response()->json($ret, Response::HTTP_OK);
    }

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
