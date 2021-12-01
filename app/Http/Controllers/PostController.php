<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 1;
        // $posts = Post::orderBy('id', 'desc')->paginate('4');
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact(['posts', 'count',]))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data
        $request->validate([
            'docNum' => 'required|alpha_dash|min:5|max:255|unique:posts,docNum',
            'orgName' => 'required',
            'signDate' => 'required',
            'ExpDate' => 'required',
            'keywords' => 'required',
            'file'=> 'required',
        ]);

        // Store in db
        $post = new Post();

        $post->docNum = $request->docNum;
        $post->orgName = $request->orgName;
        $post->signDate  = $request->signDate;
        $post->ExpDate  = $request->ExpDate;
        $post->keywords  = $request->keywords;
        
        if($request->hasfile('file')) {
            $file = $request->file('file');
            // $docname = $file->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('mou', $filename);
            $post->file  = $filename;
        } else {
            return $request;
            $post->file = '';
        }
        $post->save();
        // Post::create($request->all()); 
       
        return redirect()->route('posts.index')->with('success', 'Mou added succcefully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the post with id
        // $post = Post::find($id);
    
        
        // return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post
        $post = Post::find($id);

        // return view with the post data
        return view('posts.edit')->withPost($post);
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
        $post = Post::find($id);

        // Revalidate data 
        if ($request->input('docNum') == $post->docNum) { //check if the document munber has changed
            $this->validate($request, [
                'orgName' => 'required',
                'signDate' => 'required',
                'ExpDate' => 'required',
                'keywords' => 'required',
            ]);
        } else {
            $this->validate($request, [
                'docNum' => 'required|alpha_dash|min:5|max:255|unique:posts,docNum',
                'orgName' => 'required',
                'signDate' => 'required',
                'ExpDate' => 'required',
                'keywords' => 'required',
            ]);
        }

        $post->docNum = $request->docNum;
        $post->orgName = $request->orgName;
        $post->signDate  = $request->signDate;
        $post->ExpDate  = $request->ExpDate;
        $post->keywords  = $request->keywords;

        // 
        if($request->hasfile('file') /* && $post->file !== $request->file(file)->getOriginalClientName() */)  {
            $file = $request->file('file');
            // $docname = $file->getClientOriginalName();
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('mou', $filename);
            $post->file  = $filename;
        } 
        $post->save();
    
        return redirect()->route('posts.index', $post->id)->with('success', 'Changes Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->back()->with('success', 'Mou Deleted');
    }
}
