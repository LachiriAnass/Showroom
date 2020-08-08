<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PaintingVote;
use App\Painting;
use App\User;

class PaintingVoteController extends Controller
{
    public function manageUpvote($user_id, $painting_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }

        $painting = Painting::findOrFail($painting_id);

        $paintingvote = PaintingVote::where('user_id', '=', $user_id)->where('painting_id', '=', $painting_id)->first();

        if($paintingvote){
            if($paintingvote->vote_type){
                $paintingvote->delete();
                $painting->votes_average -= 1;
                $painting->save();
                return back();
            }else{
                $paintingvote->vote_type = true;
                $paintingvote->save();
                $painting->votes_average += 2;
                $painting->save();
                return back();
            }
        }

        $paintingupvote = new PaintingVote();
        $paintingupvote->vote_type = true;
        $paintingupvote->user_id = $user_id;
        $paintingupvote->painting_id = $painting_id;
        $paintingupvote->save();
        $painting->votes_average += 1;
        $painting->save();
        return back();

    }


    public function manageDownvote($user_id, $painting_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }


        $painting = Painting::findOrFail($painting_id);

        $paintingvote = PaintingVote::where('user_id', '=', $user_id)->where('painting_id', '=', $painting_id)->first();

        if($paintingvote){
            if(!$paintingvote->vote_type){
                $paintingvote->delete();
                $painting->votes_average += 1;
                $painting->save();
                return back();
            }else{
                $paintingvote->vote_type = false;
                $paintingvote->save();
                $painting->votes_average -= 2;
                $painting->save();
                return back();
            }
        }

        $paintingupvote = new PaintingVote();
        $paintingupvote->vote_type = false;
        $paintingupvote->user_id = $user_id;
        $paintingupvote->painting_id = $painting_id;
        $paintingupvote->save();
        $painting->votes_average -= 1;
        $painting->save();
        return back();

    }


    // API FUNCTIONS

    public function api_manageUpvote($user_id, $painting_id, Request $request)
    {
        $this->validate($request, [
            'login_token' => 'required'
        ]);

        $user = User::findOrFail($user_id);

        if($user->login_token != request('login_token')){
            return response()->json(['status' => 'bad', 'error' => 'User not verified. Bad Token.']);
        }

        $painting = Painting::findOrFail($painting_id);

        $paintingvote = PaintingVote::where('user_id', '=', $user_id)->where('painting_id', '=', $painting_id)->first();

        if($paintingvote){
            if($paintingvote->vote_type){
                $paintingvote->delete();
                $painting->votes_average -= 1;
                $painting->save();
                return response()->json(['status' => 'good', 'painting' => $painting]);
            }else{
                $paintingvote->vote_type = true;
                $paintingvote->save();
                $painting->votes_average += 2;
                $painting->save();
                return response()->json(['status' => 'good', 'painting' => $painting]);
            }
        }

        $paintingupvote = new PaintingVote();
        $paintingupvote->vote_type = true;
        $paintingupvote->user_id = $user_id;
        $paintingupvote->painting_id = $painting_id;
        $paintingupvote->save();
        $painting->votes_average += 1;
        $painting->save();


        return response()->json(['status' => 'good', 'painting' => $painting]);

    }


    public function api_manageDownvote($user_id, $painting_id, Request $request)
    {
        $this->validate($request, [
            'login_token' => 'required'
        ]);

        $user = User::findOrFail($user_id);

        if($user->login_token != request('login_token')){
            return response()->json(['status' => 'bad', 'error' => 'User not verified. Bad Token.']);
        }


        $painting = Painting::findOrFail($painting_id);

        $paintingvote = PaintingVote::where('user_id', '=', $user_id)->where('painting_id', '=', $painting_id)->first();

        if($paintingvote){
            if(!$paintingvote->vote_type){
                $paintingvote->delete();
                $painting->votes_average += 1;
                $painting->save();
                return response()->json(['status' => 'good', 'painting' => $painting]);
            }else{
                $paintingvote->vote_type = false;
                $paintingvote->save();
                $painting->votes_average -= 2;
                $painting->save();
                return response()->json(['status' => 'good', 'painting' => $painting]);
            }
        }

        $paintingupvote = new PaintingVote();
        $paintingupvote->vote_type = false;
        $paintingupvote->user_id = $user_id;
        $paintingupvote->painting_id = $painting_id;
        $paintingupvote->save();
        $painting->votes_average -= 1;
        $painting->save();
        return response()->json(['status' => 'good', 'painting' => $painting]);

    }
}
