<?php

namespace App\Http\Controllers\API;

use App\Article;
use App\Http\Resources\API_Articles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    /**
     * ArticleController constructor.
     *
     * middleware jwt.auth
     *
     */

    public function __construct()
    {

        $this->middleware('jwt.auth')->except(['index','show']);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all articles

        return API_Articles::collection(Article::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $Article = Article::create([
            "content"=>$request->get("content"),
            "title"=>$request->get("title"),
            "slug"=>strtolower($request->get('slug'))

        ]);

        return response()->json($Article);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Get an article by giving id

        $article = Article::findOrFail($id);

        return new API_Articles($article);

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
        //

        $Update = Article::where('id',$id)->update([
            "content"=>$request->get("content"),
            "title"=>$request->get("title"),
            "slug"=>strtolower($request->get('slug'))
        ]);

        return $this->show($id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Article::destroy($id);

        return response()->json(["message"=>"Article was deleted ... "]);

    }


}
