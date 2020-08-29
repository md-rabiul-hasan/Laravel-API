<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function getAllArticle(){
        $allArticles = Article::all();
        return $allArticles;
    }

    public function getArticle($id){
        $article = Article::findOrFail($id);
        echo $article;
    }
}
