<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if (request('search')) {
        $posts = Post::where('name', 'like', '%' . request('search') . '%')
            ->orderBy('id', 'desc')->paginate(10);
        
        } else {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        }
        return view('/main', compact('posts','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin/item_create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $posts = new Post();
        $posts->name = $request->name;
        $posts->description = $request->description;
        $posts->price = $request->price;
        $posts->user_id = $request->user_id;
        $posts->category_id = $request->category_id;
        // Image Store
        $arr = array();
        foreach($request->file('images') as $image){
            $filename = time().'_'.$image->getClientOriginalName();
            array_push($arr,$filename);
            $image->storeAs('upload',$filename);
            $posts->image = serialize($arr);
        }
        //color to array 
        if($request->color != ''){
            $col = preg_split("/[|]+/", $request->color);
            $posts->color= serialize($col);
        }
        if($request->size != ''){       
            $siz = preg_split("/[|]+/", $request->size);
            $posts->size= serialize($siz);
        }    
        $posts->save();
        return redirect('/home')->with('status','Product Create Success'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('/show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('/admin/edit',compact('post','categories'));
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
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->category_id = $request->category_id;
        $post->save();
        return back()->with('status','Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::findOrFail($id);
        $post -> delete();
        return redirect('/home')->with ('status','Delete Post Success');
    }

    public function categoryshow($id)
    {
        $posts = Post::where('category_id', '=', "$id")->orderBy('id', 'desc')->paginate(10);
        return view('categoryshow', compact('posts'));

    }    

}
