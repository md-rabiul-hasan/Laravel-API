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
}
