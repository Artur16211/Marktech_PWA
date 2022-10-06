<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reviewstore extends Controller
{
    public function reviewstore(Request $request){
        $review = new ReviewRating();
        $review->booking_id = $request->booking_id;
        $review->comments= $request->comment;
        $review->star_rating = $request->rating;
        $review->user_id = Auth::user()->id;
        $review->service_id = $request->service_id;
        $review->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }
}
