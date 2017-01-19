<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Article;
use DOMDocument;
use Image;
use Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = DB::table('articles')->get();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'image',
            'overview' => 'required',
            'content' => 'required'
        ]);

        $article = new Article;
        $article->title = $request->input('title');
        $article->image = '';
        $article->slug = str_slug($request->input('title', '-'));
        $article->overview = $request->input('overview');
        $article->content = '';
        $article->save();
        
        $doc = new DOMDocument();
        $doc->loadHTML($request->input('content'));

        foreach ($doc->getElementsByTagName('img') as $image) {
            $src = $image->getAttribute('src');
            $img = Image::make($src);
            $img->encode('jpg');   
            
            $alt = $image->getAttribute('alt');
            if (empty($alt)) {
                $alt = sha1($src);
            }
            $image->setAttribute('src', "/api/source/articles/$article->id/$alt.jpg");
            $image->setAttribute('class', 'img-responsive');

            Storage::put("articles/$article->id/$alt.jpg", $img->stream());
        }
        function get_inner_html( $node ) {
            $innerHTML= '';
            $children = $node->childNodes;
            foreach ($children as $child) {
                $innerHTML .= $child->ownerDocument->saveXML( $child );
            }
            return $innerHTML;
        } 
        $article->content = get_inner_html($doc->getElementsByTagName('body')->item(0));
        
        if ($request->hasFile('image')) {
            $name_file = $request->file('image')->getClientOriginalName();
            $path = "articles/$article->id";
            $request->file('image')->storeAs($path, $name_file);
            $article->image = "/api/source/$path/$name_file";
        }
        
        $article->save();
        
        return redirect('/admin/articles')->with('message_success', "L'article a bien été ajouté");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $article->update([
            'title' => $request->input('title'),
            'slug' => str_slug($request->input('title')),
            'overview' => $request->input('overview'),
        ]);

        $doc = new DOMDocument();
        $doc->loadHTML($request->input('content'));
        foreach ($doc->getElementsByTagName('img') as $image) {
            $src = $image->getAttribute('src');
            $pattern = 'source/articles';
            if (! str_contains($src, $pattern)) {
                $img = Image::make($src);
                $img->encode('jpg');

                $alt = $image->getAttribute('alt');
                if (empty($alt)) {
                    $alt = sha1($src);
                }
                $image->setAttribute('src', "/api/source/articles/$article->id/$alt.jpg");

                Storage::put("articles/$article->id/$alt.jpg", $img->stream());
            }
        }

        function get_inner_html( $node ) {
            $innerHTML= '';
            $children = $node->childNodes;
            foreach ($children as $child) {
                $innerHTML .= $child->ownerDocument->saveXML( $child );
            }
            return $innerHTML;
        }
        $article->content = get_inner_html($doc->getElementsByTagName('body')->item(0));


        if ($request->hasFile('image')) {
            $name_file = $request->file('image')->getClientOriginalName();
            $path = "articles/$article->id";
            $request->file('image')->storeAs($path, $name_file);

            $article->update([
                'image' => "/api/source/$path/$name_file"
            ]);
        }

        $article->save();

        return redirect()->route('admin.articles.index')->with('message', "L'article a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('articles')->where('id', $id)->delete();
        Storage::deleteDirectory("articles/$id");

        return redirect()->back()->with('message_success', "L'article a bien été supprimé");
    }
}
