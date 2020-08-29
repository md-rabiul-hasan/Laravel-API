<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller {
    public function getAllArticle() {
        $allArticles = Article::all();
        return $allArticles;
    }

    public function getArticle($id) {
        $article = Article::findOrFail($id);
        return $article;
    }

    public function saveArticle(Request $request) {
        $title   = $request->title;
        $content = $request->content;
        $user    = $request->user();

        $article          = new Article();
        $article->user_id = $user->id;
        $article->title   = $title;
        $article->content = $content;
        $article->save();
        return $article;
    }

    public function updateArticle(Request $request, $article_id) {
        $article = Article::findOrFail($article_id);
        $user    = $request->user();
        if ($article->user_id != $user->id) {
            return response()->json([
                "error" => "You doesn't author this post",
            ]);
        } else {
            $article->title   = $request->title;
            $article->content = $request->content;
            $article->save();
            return response()->json([
                "status"  => 200,
                "success" => "Article modification successfully",
            ]);
        }
    }

    public function deleteArticle(Request $request, $article_id) {
        $article = Article::findOrFail($article_id);
        $user    = $request->user();
        if ($article->user_id != $user->id) {
            return response()->json([
                "error" => "You doesn't author this post",
            ]);
        } else {
            $article->delete();
            return response()->json([
                "status"  => 200,
                "success" => "Article delete successfully",
            ]);
        }
    }

}
