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
    public function post(Request $request)
    {
        // ユーザーID取得
        $userId = Auth::id();

        // skillとfree_tagを配列に格納
        $skill = explode(",", $request->postData['skill']);
        $freeTag = explode(",", $request->postData['free_tag']);

        // posts
        $insertId = DB::table('posts')->insertGetId([
            'title' => $request->postData['title'],
            'description' => $request->postData['description'],
            'detail' => $request->postData['detail'],
            'url' => $request->postData['url'],
            'author' => $userId,
            'skill' => json_encode($skill),
            'free_tag' => json_encode($freeTag),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        // 返却
        return response()->json(['insertId', $insertId], Response::HTTP_OK);
    }
}
