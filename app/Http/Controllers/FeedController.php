<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;


class FeedController extends Controller
{
    public function index()
    {
        $feeds = Feed::paginate(5);
        return view('pages.feed.index',compact('feeds'));
    }

    public function show(Feed $feed)
    {
        Gate::authorize('update',$feed);
        // Log::debug("show feed",['feed'=>$feed]);
        // dd($feed);
        return view('pages.feed.show',compact('feed'));
    }

    public function create()
    {
        return view('pages.feed.create');
    }

    public function store(Request $request)
    {
        
        $validate_request = $request->validate([
            'title' => 'required | string | max:100',
            'description' => 'required | string | max:300',
        ]);

            $user = Auth::user();
            $validate_request['user_id'] = $user->id;
      // orm

        Feed::create($validate_request);
        return redirect()->route('feeds')->with('success', 'Feed Update Successfull');
    }
    

    public function update(Request $request, Feed $feed)
    {
        $validate_request = $request->validate([
            'title' => 'required | string | max:100',
            'description' => 'required | string | max:300',
        ]);

        // $feed->update($this->validateRequest($request));
        // return redirect()->route('feed'));
        $feed->update($validate_request);
        return redirect()->route('feeds' )->with('success', 'Feed Update Successfull');
    }

 
}
