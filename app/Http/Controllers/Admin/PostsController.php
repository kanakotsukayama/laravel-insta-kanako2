<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


class PostsController extends Controller
{
    private $post;

    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index(Request $request){
        if($request->search){
            $all_posts = $this->post->where('description','like','%'.$request->search. '%')->latest()->withTrashed()->paginate(5);
        }else
        {
        // $all_posts = $this->post->orderBy('latest')->paginate(5);
        $all_posts = $this->post->latest()->withTrashed()->paginate(5);

        }
        return view('admin.posts.index')->with('all_posts',$all_posts)->with('search',$request->search);
   
}

    public function deactivate($id){
        $this->post->destroy($id);

        return redirect()->back();
    }

    public function activate($id){
        $this->post->onlyTrashed()->findOrFail($id)->restore();

        return redirect()->back();
    }
}
