<?php

namespace App\Http\Controllers\Api\Project;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectPostController extends Controller
{
    public function gestPosts()
    {
        // 未ログインゲスト向け新着プロジェクト一覧を取得
        $ret = DB::table('posts')
            ->where('created_at', '!=', null)
            ->orderBy('created_at', 'desc')
            ->limit(5)->get();

        // 返却
        return response()->json($ret, Response::HTTP_OK);
    }

    public function myPosts()
    {
        // ユーザーID取得
        $userId = Auth::id();

        // お気に入り登録済みプロジェクト一覧を取得
        $ret = DB::table('posts')
            ->where('author', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // 返却
        return response()->json($ret, Response::HTTP_OK);
    }

    public function userPosts(Request $request)
    {

        // ユーザーID取得
        if ($request->userId == Auth::id()) {
            return response()->json(['myPosts' => true], Response::HTTP_OK);
        }

        // お気に入り登録済みプロジェクト一覧を取得
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
                'users.name'
            )
            ->where('author', $request->userId)
            ->join('users', 'posts.author', '=', 'users.id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // フォロー中のユーザーかどうかを判定
        $isFollowing = DB::table('followers')
            ->where('follower_user_id', '=', Auth::id())
            ->where('target_user_id', '=', $request->userId)
            ->exists();

        // 返却
        return response()->json([$ret, ['is_following' => $isFollowing]], Response::HTTP_OK);
    }

    public function post(Request $request)
    {
        // ユーザーID取得
        $userId = Auth::id();

        // skillとfree_tagを配列に格納
        if ($request->postData['skill'] == "" || $request->postData['free_tag'] == "") {
            $skill = json_encode(["未選択"]);
            $freeTag = json_encode(["未選択"]);
        } else {
            $skill = json_encode(explode(",", $request->postData['skill']));
            $freeTag = json_encode(explode(",", $request->postData['free_tag']));
        }

        // posts
        $insertId = DB::table('posts')->insertGetId([
            'title' => $request->postData['title'],
            'description' => $request->postData['description'],
            'detail' => $request->postData['detail'],
            'url' => $request->postData['url'],
            'author' => $userId,
            'skill' => $skill,
            'free_tag' => $freeTag,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        // 返却
        return response()->json(['insertId', $insertId], Response::HTTP_OK);
    }
}
