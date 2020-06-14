<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Course;
use App\Contact;
use App\Category;
use App\Event;
use App\User;
use Carbon\Carbon;
use App\Plan;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserEmail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Session;
class AdminController extends Controller
{
    public function get_course(Request $request)
    {
        $cats = Category::all();
        $courses = Course::all();
        return view('admin.course', compact('cats','courses'));
    }

    public function add_cat(Request $request)
    {
        // $cat = new Category();
        foreach ($request->name as $key => $value) {
            Category::insert([
                'title'=>$value,
                'created_at'=>date("Y-m-d")
            ]);
        }

        session()->flash("success", "category added successfuly");
        return redirect()->back();
    }
    public function edit_cat(Request $request){
        $edit_cat = Category::find((int)$request->id);
        return response()->json(['edit_cat'=>$edit_cat]);
    }

    public function update_cat(Request $request){
        Category::where('id', $request->id)->update(['title'=>$request->name]);
        session()->flash("success", "category updated successfuly");
        return redirect()->back();
    }

    public function delete_cat(Request $request, $id)
    {
        $cat = Category::find($id);
        $cat->delete($id);
        return response()->json();
    }

    // course
    public function add_course(Request $request)
    {
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_image.jpg';
        }

        try {
            $course = new Course();
            $course->course_id =  $request->cat;
            $course->image =  $fileNameToStore;
            $course->Amount =  $request->amount;
            $course->description =  $request->desc;
            $course->save();

            session()->flash("success", "course added successfuly");
            return redirect()->back();
            

        } catch (\Exception $e) {
            session()->flash("error", "an errror occured");
            return redirect()->back();
        }
    }

    public function edit_course(Request $request){
        $edit_cat = Course::find((int)$request->id);
        return response()->json(['edit_cat'=>$edit_cat]);
    }

    public function update_course(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('edit_image')) {
            $fileNameWithExt = $request->file('edit_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('edit_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('edit_image')->storeAs('public/images', $fileNameToStore);
        }

        $course = Course::find($request->id);
        $course->course_id = $request->editcat;
        $course->Amount = $request->editamount;
        $course->image = $fileNameToStore;
        $course->description = $request->editdesc;
        

        try {
            $course->save();
            session()->flash("success", "course updated successfuly");
            return redirect()->back();
            
        } catch (\Exception $e) {
   
            session()->flash("error", "an errror occured");
            return redirect()->back();
        }
    }

    public function delete_course(Request $request, $id)
    {
        $cat = Course::find($id);
        $cat->delete($id);
        return response()->json();
    }

    // blog

    public function get_blog(Request $request)
    {
        $blogs = Blog::all();
        return view('admin.blogs', compact('blogs'));
    }

    public function add_blog(Request $request)
    {
        
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_image.jpg';
        }

        try {
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->image = $fileNameToStore;
            $blog->created_by = "admin";
            $blog->created_at = Carbon::now();
            $blog->description = $request->desc;
            $blog->save();
            session()->flash("success", "blog added successfuly");
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash("error", "an errror occured");
            return redirect()->back();
        }
    }

    public function edit_blog(Request $request)
    {
        $edit_cat = Blog::find((int)$request->id);
        return response()->json(['edit_cat'=>$edit_cat]);
    }

    public function update_blog(Request $request)
    {
         // dd($request->all());
         if ($request->hasFile('edit_image')) {
            $fileNameWithExt = $request->file('edit_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('edit_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('edit_image')->storeAs('public/images', $fileNameToStore);
        }

        try {
            $blog =  Blog::find($request->id);
            $blog->title = $request->edittitle;
            $blog->image = $fileNameToStore;
            $blog->created_by = "admin";
            $blog->created_at = Carbon::now();
            $blog->description = $request->editdesc;
            $blog->save();
            session()->flash("success", "blog updated successfuly");
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash("error", "an errror occured");
            return redirect()->back();
        }
    }
    public function delete_blog(Request $request, $id)
    {
        $cat = Blog::find($id);
        $cat->delete($id);
        return response()->json();
    }

    // end blog

    // plans
    public function plans(Request $request)
    {
        $plans = Plan::all();
        return view('admin.plans', compact('plans'));
    }
    public function new_plan(Request $request)
    {
        $plan = new Plan();
        $plan->name = $request->name;
        $plan->amount = $request->amount;
        $plan->save();
        session()->flash("success", "plan created successfully");
        return redirect()->back();
    }

    public function edit_plan(Request $request)
    {
        $edit = Plan::where('id', $request->id)->first();

        return response()->json(['edit'=>$edit]);
    }

    public function update_plan(Request $request){

        $id = (int)$request->id;

        $update = Plan::where('id', $id)->update([
            'name'=>$request->editname,
            'amount'=>$request->editamount
        ]);

        session()->flash("success", "plans updated successfully");
        return redirect()->back();
    }
    public function delete_plan(Request $request, $id)
    {
        $cat = Plan::find($id);
        $cat->delete($id);
        return response()->json(['status'=>1]);
    }

    // events

    public function get_event(Request $request)
    {
        $events = Event::all();
        return view('admin.events', compact('events'));
    }

    public function add_event(Request $request)
    {
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_image.jpg';
        }

        $event = new Event();
        $event->agenda = $request->agenda;
        $event->image = $fileNameToStore;
        $event->venue = $request->venue;
        $event->created_at = Carbon::parse($request->date);
        $event->time = $request->time;
        $event->created_by = 'admin';
        $event->description = $request->desc;

        try {
            $event->save();
            session()->flash("success", "event added successfuly");
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash("error", "an errror occured");
            return redirect()->back();
        }
    }

    public function edit_event(Request $request)
    {
        $edit = Event::where('id', $request->id)->first();
        return response()->json(['edit'=>$edit]);
    }

    public function update_event(Request $request)
    {
        if ($request->hasFile('edit_image')) {
            $fileNameWithExt = $request->file('edit_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('edit_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('edit_image')->storeAs('public/images', $fileNameToStore);
        }

        $event = Event::find((int)$request->id);
        $event->agenda = $request->editagenda;
        $event->image = $fileNameToStore;
        $event->venue = $request->editvenue;
        $event->created_at = Carbon::parse($request->editdate);
        $event->time = $request->edittime;
        $event->created_by = 'admin';
        $event->description = $request->editdesc;

        try {
            $event->save();
            session()->flash("success", "event updated successfuly");
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash("error", "an errror occured");
            return redirect()->back();
        }

    }

    public function delete_event(Request $request, $id)
    {
        $cat = Event::find($id);
        $cat->delete($id);
        return response()->json(['status'=>1]);
    }

    public function user(Request $request)
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function new_user(Request $request)
    {
        DB::beginTransaction();
        try {
            $digits = 4;
            $pass = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $password = Hash::make($pass);
            // dd($password);

            $info = [
                'name'=>$request->name,
                'password'=>$pass,
                'email'=>$request->email
            ];
            \Mail::to($info['email'])->send(new UserEmail($info));

            $user = User::create(['name'=>$request->name, 'email'=>$request->email, 'password'=>$password]);

            DB::commit();
    
            Session::flash("success", "user created successfuly");
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
        }
    }

    public function delete_user(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete($id);

        return response()->json(['status'=>1]);
    }
    public function addcontact(Request $request)
    {
       
        $contact=[
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ];
        Mail::to('rashidcollins16@gmail.com')->send(new ContactMail($contact));
        session()->flash('success','dear '.$request->name.'we have received your message');
        return redirect()->back();
    }

    public function get_details(Request $request)
    {
        $details =  Plan::where('id', ((int)$request->id))->first();
        return response()->json(['details'=>$details]);
    }
}
