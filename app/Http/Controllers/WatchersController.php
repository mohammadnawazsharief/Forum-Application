<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Watcher;
use Auth;
use Session; 

class WatchersController extends Controller
{
    public function watch($id)
    {
    	$watcher = Watcher::find($id);
    	 Watcher::create([
    		'discussion_id'=> $id,
    		'user_id'=> Auth::id()
    	]);
    	Session::flash('success','You are watching this Discussion');
    	return redirect()->back();
    }
    public function unwatch($id)
    {
    	$watcher = Watcher::where('discussion_id',$id)->where('user_id',Auth::id());
    	$watcher->delete();
    	Session::flash('success','You are no longer watching this Discussion');
    	return redirect()->back();
    }
}
