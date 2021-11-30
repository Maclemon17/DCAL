<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use App\Post;

class MoUController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        $recents = Post::latest()->take(3)->get();
        
        return view('mou.index', compact(['posts', 'recents']));
    }


    public function getSingle($id) {
        // fetch for the id in DB
        // $post = Post::find($id);
        $post = Post::where('id', '=', $id)->first();

        // pass the post object to the view
        return view('mou.single', compact('post'));
    }


    public function search() {
        $search_text = $_GET['search']; // name of the form field

        $post = Post::where('orgName', 'LIKE', '%'.$search_text.'%')->get();

        return view('mou.search', compact('post'));
    }

    public function download(Request $request, $file) {

        return response()->download(public_path('mou/'.$file));
    }
}
