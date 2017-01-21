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

    public function getSearch(Request $request) {
        $word = $request->input('word');


        return view('blog.index');
    }

    public function getArticle($id, $slug) {
        $article = DB::table('articles')->where('id', $id)->first();

        if ($article) {
            $comments = app('db')->select("SELECT * FROM comments WHERE article_id = $id ORDER BY id DESC");

           return view('blog.article', compact('article', 'comments'));
        }

        
    }

    public function postComment($id, Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'content' => 'required'
        ]);
        
        DB::table('comments')->insert([
            'article_id' => $id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'content' => $request->input('content'),
            'ip' => sha1($request->ip()),
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Votre commentaire a bien été envoyé');
    }

    public function postNewsletters(Request $request) {
        $email = $request->input('email');

        dd($email);
    }

    public function getProjets() {
    	return view('blog.projets');
    }

    public function getSupport() {
        return view('blog.support');
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

    public function getTest() {
        return view('blog.home');
    }
}
