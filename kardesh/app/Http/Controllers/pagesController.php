<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
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
        return view('pages.donate');
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
        return view('pages.events');   
    }

    public function contact(Request $request)
    {
        return view('pages.contact');
    }

}
