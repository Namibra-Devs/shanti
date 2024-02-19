<?php

namespace App\Http\Controllers\User;

use App\EventDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $events = EventDetail::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();

        return view('user.events',compact('events'));

    }

    public function eventdetails($id)
    {

        $data = EventDetail::findOrFail($id);

        return view('user.event_details',compact('data'));

    }
}
