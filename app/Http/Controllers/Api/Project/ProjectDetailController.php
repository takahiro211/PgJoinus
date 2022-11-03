<?php

namespace App\Http\Controllers\Api\Project;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectDetailController extends Controller
{
    public function getDetail(Request $request)
    {
        // 投稿データを取得
        $ret = DB::table('posts')
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
                'users.name',
                'comments.comment',
                'comments.user_id',
                'comments.created_at as comment_date'
            )
            ->join('users', 'users.id', '=', 'posts.author')
            ->leftjoin('comments', 'posts.id', '=', 'comments.post_id')
            ->where('posts.id', '=', $request->postId)
            ->get();

        // お気に入り登録しているかどうかを判定
        $isFavorite = DB::table('favorites')
            ->where('user_id', '=', Auth::id())
            ->where('post_id', '=', $request->postId)
            ->exists();

        // 自分が投稿者かどうかを判定
        $isAuthor = $ret[0]->author == Auth::id();

        // 返却
        return response()->json([$ret, ['is_author' => $isAuthor], ['is_favorite' => $isFavorite]], Response::HTTP_OK);
    }
}
