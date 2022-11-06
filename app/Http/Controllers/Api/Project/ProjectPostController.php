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
