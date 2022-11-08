<?php

namespace App\Http\Controllers\Api\Project;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use DateTime;
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
        // ※新しくお気に入り登録した順(降順)
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
            ->orderBy('favorites.created_at', 'desc')
            ->paginate(10);

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
                'user_id' => $userId,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
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

    // お気に入りの多い順ランキングを取得
    public function rank()
    {
        // お気に入り登録の多い順にプロジェクト一覧を取得
        // ※新しくお気に入り登録された順(降順)
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
                'posts.updated_at',
                'favorites.post_id',
                DB::raw('count(*) as total')
            )
            ->join('posts', 'favorites.post_id', '=', 'posts.id')
            ->groupBy('favorites.post_id')
            ->orderBy('total', 'desc')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(10);

        // 返却
        return response()->json($ret, Response::HTTP_OK);
    }
}
