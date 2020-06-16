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
use App\Donate;
use App\Gallery;
use App\Setting;
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
        if ($request->hasFile('edit_image')) {
            $course->image = $fileNameToStore;
        }
      
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

    public function get_donation(Request $request)
    {
        $don = Donate::all();
        return response()->json(['status'=>1, 'don'=>$don]);
    }

    public function get_cat(Request $request)
    {
        $cat1 = Course::where('course_id', $request->id)->first();
        return response()->json(['status'=>1, 'cat1'=>$cat1]);
    }


    public function get_gallery(Request $request){
        $gallerys = Gallery::all();
        return view('admin.gallery', compact('gallerys'));
    }
    public function add_gallery(Request $request)
    {
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $fileNameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $file->storeAs('public/images', $fileNameToStore);
                
                    $gl = new Gallery();
                    $gl->image = $fileNameToStore;
                    $gl->save();
            }
            
        
        } else {
            $fileNameToStore = 'no_image.jpg';
        }

        return redirect()->back()->with('success', 'uploded successfully');

       
    }
    public function edit_gallery(Request $request)
    {
        $edit = Gallery::find((int)$request->id);
        return response()->json(['edit'=>$edit]);
    }

    public function update_gallery(Request $request)
    {
        if ($request->hasFile('edit_image')) {
            $fileNameWithExt = $request->file('edit_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('edit_image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('edit_image')->storeAs('public/images', $fileNameToStore);
        }
        $lunch = Gallery::find((int)$request->id);
        if ($request->hasFile('edit_image')) {
            $lunch->image = $fileNameToStore;
        }
        $lunch->save();
        return redirect()->back()->with('success', 'uploded successfully');
    }


    public function delete_gallery(Request $request, $id)
    {
        $user = Gallery::find($id);
        $user->delete($id);

        return response()->json(['status'=>1]);
    }

    public function setting(Request $request)
    {
        if ($request->hasFile('image1')) {
            $fileNameWithExt1 = $request->file('image1')->getClientOriginalName();
            $filename1 = pathinfo($fileNameWithExt1, PATHINFO_FILENAME);
            $extension1 = $request->file('image1')->getClientOriginalExtension();
            $fileNameToStore1 = $filename1 . '_' . time() . '.' . $extension1;
            $path1 = $request->file('image1')->storeAs('public/images', $fileNameToStore1);
        }
        if ($request->hasFile('image2')) {
            $fileNameWithExt2 = $request->file('image2')->getClientOriginalName();
            $filename2 = pathinfo($fileNameWithExt2, PATHINFO_FILENAME);
            $extension2 = $request->file('image2')->getClientOriginalExtension();
            $fileNameToStore2 = $filename2 . '_' . time() . '.' . $extension2;
            $path2 = $request->file('image2')->storeAs('public/images', $fileNameToStore2);
        }
        if ($request->hasFile('image3')) {
            $fileNameWithExt3 = $request->file('image3')->getClientOriginalName();
            $filename3 = pathinfo($fileNameWithExt3, PATHINFO_FILENAME);
            $extension3 = $request->file('image3')->getClientOriginalExtension();
            $fileNameToStore3 = $filename3 . '_' . time() . '.' . $extension3;
            $path3 = $request->file('image3')->storeAs('public/images', $fileNameToStore3);
        }
        if ($request->hasFile('image4')) {
            $fileNameWithExt4 = $request->file('image4')->getClientOriginalName();
            $filename4 = pathinfo($fileNameWithExt4, PATHINFO_FILENAME);
            $extension4 = $request->file('image4')->getClientOriginalExtension();
            $fileNameToStore4 = $filename4 . '_' . time() . '.' . $extension4;
            $path4 = $request->file('image4')->storeAs('public/images', $fileNameToStore4);
        }
        if ($request->hasFile('image5')) {
            $fileNameWithExt5 = $request->file('image5')->getClientOriginalName();
            $filename5 = pathinfo($fileNameWithExt5, PATHINFO_FILENAME);
            $extension5 = $request->file('image5')->getClientOriginalExtension();
            $fileNameToStore5 = $filename5 . '_' . time() . '.' . $extension5;
            $path5 = $request->file('image5')->storeAs('public/images', $fileNameToStore5);
        }
        if ($request->hasFile('image6')) {
            $fileNameWithExt6 = $request->file('image6')->getClientOriginalName();
            $filename6 = pathinfo($fileNameWithExt6, PATHINFO_FILENAME);
            $extension6 = $request->file('image6')->getClientOriginalExtension();
            $fileNameToStore6 = $filename6 . '_' . time() . '.' . $extension6;
            $path6 = $request->file('image6')->storeAs('public/images', $fileNameToStore6);
        }
        if ($request->hasFile('image7')) {
            $fileNameWithExt7 = $request->file('image7')->getClientOriginalName();
            $filename7 = pathinfo($fileNameWithExt7, PATHINFO_FILENAME);
            $extension7 = $request->file('image7')->getClientOriginalExtension();
            $fileNameToStore7 = $filename7 . '_' . time() . '.' . $extension7;
            $path7 = $request->file('image7')->storeAs('public/images', $fileNameToStore7);
        }
        if ($request->hasFile('image8')) {
            $fileNameWithExt8 = $request->file('image8')->getClientOriginalName();
            $filename8 = pathinfo($fileNameWithExt8, PATHINFO_FILENAME);
            $extension8 = $request->file('image8')->getClientOriginalExtension();
            $fileNameToStore8 = $filename8 . '_' . time() . '.' . $extension8;
            $path8 = $request->file('image8')->storeAs('public/images', $fileNameToStore8);
        }
        if ($request->hasFile('video')) {
            $fileNameWithExt9 = $request->file('video')->getClientOriginalName();
            $filename9 = pathinfo($fileNameWithExt9, PATHINFO_FILENAME);
            $extension9 = $request->file('video')->getClientOriginalExtension();
            $fileNameToStore9 = $filename9 . '_' . time() . '.' . $extension9;
            $path9 = $request->file('video')->storeAs('public/images', $fileNameToStore9);
        }

        $setting = Setting::find(1);
        if ($request->hasFile('image1')) {
            $setting->image1 = $fileNameToStore1;
        }

        if ($request->hasFile('image2')) {
            $setting->image2 = $fileNameToStore2;
        }
        if ($request->hasFile('image3')) {
            $setting->image3 = $fileNameToStore3;
        }

       
        if ($request->hasFile('image4')) {
            $setting->image4 = $fileNameToStore4;
        }

        if ($request->hasFile('image5')) {
            $setting->image5 = $fileNameToStore5;
        }

        if ($request->hasFile('image6')) {
            $setting->image6 = $fileNameToStore6;
        }

        if ($request->hasFile('image7')) {
            $setting->image7 = $fileNameToStore7;
        }

    
        if ($request->hasFile('image8')) {
            $setting->image8 = $fileNameToStore8;
        }

  
        if ($request->hasFile('video')) {
            $setting->video = $fileNameToStore9;
        }
     $setting->save();

     return redirect()->back()->with('success', 'uploded successfully');
    }

    public function get_etting(Request $request)
    {
        $settings = Setting::all();
        return view('admin.seting', compact('settings'));
    }
}
