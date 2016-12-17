<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller {
    
    public function __construct() {

    }

    public function getIndex() {
    	$articles = DB::table('articles')->orderBy('id', 'desc')->paginate(4);

    	return view('blog.index', compact('articles'));
    }

    public function getArticle($id, $slug) {
        $article = DB::table('articles')->where('id', $id)->first();

        $comments = app('db')->select("SELECT * FROM comments WHERE article_id = $id ORDER BY id DESC");
     //   $botblocker = new Botblocker;
        return view('blog.article', compact('article', 'comments'));
    }

    public function getProjets() {
    	return view('blog.projets');
    }

    public function getApropos() {
        return view('blog.a-propos');
    }

    public function getContact() {
    	return view('blog.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | email',
            'message' => 'required'
        ]);

        DB::table('messages')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'ip' => $request->ip(),
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Votre message a été envoyé');
    }
}
