<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostControllerr extends Controller
{
    public function create()
    {
        return view('product.reviews.create');
    }

    public function store(Request $request){
        $post = new Post();
        $post->author = $request->author;
        $post->title  = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()->route('product.reviews.list');

    }

    public function list()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('product.reviews.list',compact('posts'));
    }

    public function view($id){
        $post_detail = Post::with('ReviewData')->find($id);
        return view('product.reviews.view',compact('post_detail'));
    }

    public function reviewstore(Request $request){
        $review = new ReviewRating();
        $review->post_id = $request->post_id;
        $review->name    = $request->name;
        $review->email   = $request->email;
        $review->phone   = $request->phone;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }
}
