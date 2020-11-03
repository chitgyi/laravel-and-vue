<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\CustomResponse;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModelCollection;

class ArticleController extends Controller
{

    public function allArticles(Request $request)
    {
        $articles =  Article::with('user')->paginate(10);
        $result = new ModelCollection($articles);
        return CustomResponse::collection($result);
    }

    public function myArticles(Request $request)
    {
        $uid = $request->get('user')->id;
        $articles =  Article::where('userID', "=", $uid)->with('user')->paginate(10);
        $result = new ModelCollection($articles);
        return CustomResponse::collection($result);
    }

    public function add(Request $request)
    {
        $uid = $request->get('user')->id;
        $article = Article::create([
            'userID' => $uid,
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'imgUrl' => $request->get('imgUrl')
        ]);
        return CustomResponse::created('Created Article', $article);
    }
}
