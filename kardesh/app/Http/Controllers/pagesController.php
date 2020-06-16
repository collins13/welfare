<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Category;
use App\Donate;
use App\Event;
use App\Course;
use App\Blog;
use App\Gallery;
use App\Joiner;
use App\Volunteer;
use App\Setting;
use App\Mail\VolunteerEmail;
use Illuminate\Support\Facades\Mail;
use DB;
use Session;

class pagesController extends Controller
{

    public function index(Request $request)
    {
        $donates = Donate::orderBy('d_id', 'DESC')->paginate(3);
        $dots = Donate::orderBy('created_at', 'DESC')->get();
        $events = Event::orderBy('id', 'DESC')->paginate(3);
        $blogs = Blog::orderBy('id', 'DESC')->paginate(3);
        $image1 = Setting::find(1);
        $gallaries = Gallery::paginate(8);
        $courses =  Course::leftJoin('donates', function($join){
            $join->on('donates.cat_id', '=', 'courses.course_id');
        })->get();
        // dd($courses);
        // foreach ($courses as $key => $value) {
        //     if($value->unique('cat_id')){
        //         dd($value);
        //     }
        // }
        return view('welcome', compact('donates', 'events', 'courses', 'dots', 'blogs', 'gallaries', 'image1'));
    }

    public function about(Request $request)
    {
        $image2 = Setting::find(1);
     return view('pages.about', compact('image2'));   
    }

    public function courses(Request $request)
    {
        $courses =  Course::leftJoin('donates', function($join){
            $join->on('donates.cat_id', '=', 'courses.course_id');
        })->paginate(12);
        return view('pages.courses', compact('courses'));
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
        $blogs = Blog::orderBy('id', 'DESC')->paginate(12);
        return view('pages.blog',compact('blogs'));
    }

    public function gallery(Request $request)
    {
        $gallaries = Gallery::paginate(12);
        return view('pages.gallery', compact('gallaries'));
    }

    public function events(Request $request)
    {
        $events = Event::orderBy('id', 'DESC')->paginate(16);
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

    public function course_details(Request $request, $id)
    {
        $course = Course::where('id', $id)->first();
        $courses = Course::orderBy('id', 'DESC')->paginate(3);
        return view('pages.course_detail', compact('course', 'courses'));
    }

    public function get_d(Request $request)
    {
        $d = Donate::where('cat_id', (int)$request->id)->first();
  
        return response()->json(['d'=>$d]);
    }
    public function blog_details(Request $request, $id)
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(12);
        $blog = Blog::where('id', $id)->first();
  
        return view('pages.blog_details', compact('blogs', 'blog'));
    }

    public function join(Request $request)
    {
        $join =  new Joiner();
        $join->name = $request->name;
        $join->email = $request->email;
        $join->phone =  $request->phone;
        $join->save();

        return redirect()->back()->with('success', 'Dear '.$request->name.' '.'thank you for joining the event' );
    }
    public function volunter(Request $request)
    {
        DB::beginTransaction();
        $details =[
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ];
        try {
            $join =  new Volunteer();
            $join->name = $request->name;
            $join->email = $request->email;
            $join->message =  $request->message;
            $join->save();

            \Mail::to('rashidcollins16@gmail.com')->send(new VolunteerEmail($details));

            DB::commit();
    
            Session::flash("success", "Request sent successfully");
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
      
    }
}
