<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminController extends Controller {
    
    public function getIndex() {
        $articles_count = DB::table('articles')->count();
        $comments_count = DB::table('comments')->count();
        $messages_count = DB::table('messages')->count();

        $last_articles = DB::table('articles')->limit(4)->get();
        $last_comments = DB::table('comments')->limit(4)->get();
        $last_messages = DB::table('messages')->limit(4)->get();

    	return view('admin.index', compact('articles_count', 'comments_count', 'messages_count', 'last_articles', 'last_comments', 'last_messages'));
    }
}
