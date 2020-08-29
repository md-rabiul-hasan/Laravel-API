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
}
