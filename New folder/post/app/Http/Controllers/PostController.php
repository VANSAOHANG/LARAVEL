<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //1
           return  Post::all();
        //2
        //    return  Post::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1
        $post = new Post();
        $post -> title = $request -> title;
        $post -> description = $request -> description;
        $post->save();
        return response()->json(['message' => 'Ok!']);

        //2
        // $post = Post::create($request->all());
        // $post->save();
        // return response()->json(['message' => 'Ok!']);

        //3
        // $post = Post::create([
        //     'title' => $request->input('title'),
        //     'description' => $request->input('description'),
        // ]);
        // return response()->json(['message' => 'Creted !']);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //1
        return Post::findOrFail($id);
        //2
        // return Post::where('id', '=', $id)->get();
    }
    // public function show(Post $post)
    // {
    //     return $post;
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,)
    {
        //1
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return response()->json(['message' => 'updated!']);

        //2
        // $validatedData = $request->validate([
        //     'title' => 'required',
        //     'description' => 'required'
        // ]);
        // Post::whereId($id)->update($validatedData);
        // return response()->json(['message' => 'Updated !']);

        //3
        // Post::findOrFail($id)->update([
        //     'title' => $request->title,
        //     'description' => $request->description
        // ]);
        // return response()->json(['message' => 'update successfully!']);

        //4
        // $post = Post::findOrFail($id);
        // $post->update($request->all());
        // return response()->json(['message' => 'updated !']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //1
        return Post::destroy($id);

        //2
        // $post  = Post::findOrFail($id);
        // $post->delete();

        //3
        // Post::where('id',$id)->delete();
        
    }
}
