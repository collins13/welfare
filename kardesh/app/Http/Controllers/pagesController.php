<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Category;
use App\Donate;
use App\Event;

class pagesController extends Controller
{

    public function index(Request $request)
    {
        $donates = Donate::orderBy('id', 'DESC')->paginate(3);
        $events = Event::orderBy('id', 'DESC')->paginate(3);
        return view('welcome', compact('donates', 'events'));
    }

    public function about(Request $request)
    {
     return view('pages.about');   
    }

    public function courses(Request $request)
    {
        return view('pages.courses');
    }

    public function donate(Request $request)
    {
        $plans = Plan::all();
        $categories = Category::orderBy('id', 'DESC')->get();
        $donates = Donate::paginate(9);
        return view('pages.donate', compact('plans', 'categories', 'donates'));
    }

    public function blog(Request $request)
    {
        return view('pages.blog');
    }

    public function gallery(Request $request)
    {
        return view('pages.gallery');
    }

    public function events(Request $request)
    {
        $events = Event::orderBy('id', 'DESC')->paginate(12);
        return view('pages.events', compact('events'));   
    }

    public function contact(Request $request)
    {
        return view('pages.contact');
    }

    public function event_detail(Request $request, $id)
    {
        $event = Event::where('id', $id)->first();
        $events = Event::orderBy('id', 'DESC')->paginate(3);
        return view('pages.event', compact('event', 'events'));
    }

}
