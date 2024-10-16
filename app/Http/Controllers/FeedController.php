<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class FeedController extends Controller
{
    public function index(Feed $feed)
    {
        return view('pages.feed.index');
    }

    public function show(Feed $feed)
    {
        
        Log::debug("show feed",['feed'=>$feed]);
        // dd($feed);
        return view('pages.feed.show',compact('feed'));
    }
    public function create()
    {
        return view('pages.feed.create');
    }

    public function update(Request $request, Feed $feed)
    {
        $validate_request = $request->validate([
            'title' => 'required | string | max:100',
            'description' => 'required | string | max:300',
        ]);

        // $feed->update($this->validateRequest($request));
        // return redirect()->route('feed')->with('success', 'Feed Update Successfull');
        $feed->update($validate_request);
        return redirect()->route('feeds');
    }

 
}
