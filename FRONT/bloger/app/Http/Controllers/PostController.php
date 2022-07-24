<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::with(["user","comment"])->get();
        // return Post::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $post = Post::create($request->all());
        // $path = public_path('images');
        // if ( ! file_exists($path) ) {
        //     mkdir($path, 0777, true);
        // }
        // $file = $request->file('image');
        // $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
        // $item->image = $fileName;
        // $item->save();
        // $file->move($path, $fileName);
        $post = new Post();
        $post->title = $request ->title;
        $post->description = $request ->description;
        $post->user_id = $request ->user_id;
        $post->image = $request ->file("image")->store("public/images");

        $post->save();
        return response()->json(["sms"=>"Ok"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return response()->json(["sms"=>"Ok updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Post::destroy($id);
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return Post::where('title', 'like', "%".$title.'%')->get();
        
    }
}
