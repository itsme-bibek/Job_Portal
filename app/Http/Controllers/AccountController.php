<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\job_types;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;

class AccountController extends Controller
{
    // This method will show user registration page 
    public function registration()
    {
        return view('front.account.registration');
    }


    // This method will save user 

    public function processRegistration(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required'

        ];

        $Validator = Validator::make($request->all(), $rules);

        if ($Validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success', 'Registration Sucessfull');



            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $Validator->errors()
            ]);
        }
    }
    // This method will send us to login page 


    public function login()
    {
        return view('front.account.login');
    }


    // This method will help us to authenticate the user and admin from the login page 
    public function authenticate(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'

        ];

        $Validator = Validator::make($request->all(), $rules);

        if ($Validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { // To check the email and password from the database 
                return redirect()->route('account.profile');  // Returning to the profile page once the login is successfull


            } else {
                return redirect()->route('account.login')->with('error', 'Either Email/Password is Incorrect !!');
            }
        } else {
            return redirect()->route('account.login')->withInput($request->only('email'))->withErrors($Validator);
        }
    }


    public function profile()
    {
        $id = Auth::user()->id; //To get the user id 
        $user = User::findOrFail($id); //To get the user information from  id
        // dd($user);



        // Now passing the user to the page 

        return view('front.account.profile', [
            'user' => $user
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }

    public function updateProfile(Request $request)
    {
        $id = Auth::user()->id; //To get the user id 

        $rules = [
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email,' . $id . ',id',
            'designation' => 'required',
            'mobile' => 'required|max:10',
        ];


        $Validator = Validator::make($request->all(), $rules);

        if ($Validator->passes()) {

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->designation = $request->designation;
            $user->mobile = $request->mobile;
            $user->save();

            session()->flash('success', "The Profile is Updated Successfully");


            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $Validator->errors()
            ]);
        }
    }

    public function updateProfilePic(Request $request)
    {
        // dd($request->all());

        $id = Auth::user()->id;

        $Validator = Validator::make($request->all(), [
            'image' => 'required|image'
        ]);

        if ($Validator->passes()) {

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = $id . '-' . time() . '.' . $ext;

            $image->move(public_path('/profile_pic/'), $imageName);

            User::where('id', $id)->update(['image' => $imageName]);

            // create a small thumbnail 
            // create new image instance (800 x 600)
            $source_path = public_path('/profile_pic/'. $imageName);
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($source_path);

            // crop the best fitting 5:3 (600x360) ratio and resize to 600x360 pixel
            $image->cover(150, 150);
            $image->toPng()->save(public_path('/profile_pic/thumb/'. $imageName));


            // Deleting the old profile pic 
            File::delete(public_path('/profile_pic/thumb/'. Auth::user()->image));
            File::delete(public_path('/profile_pic/'. Auth::user()->image));



            session()->flash('success', "Profile Picture Uploaded");



            return response()->json([
                'status' => true,
                'errors' => []

            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $Validator->errors()
            ]);
        }
    }

    public function createJob(){

        $categories=Category::orderBy('name','ASC')->where('status',1)->get();
        $jobTypes=job_types::orderby('name','ASC')->where('status',1)->get();
        return view('front.account.job.create',[
            'categories' => $categories,
            'jobType' => $jobTypes
        ]);
    }

    public function saveJobs(Request $request){
        
        $validator=Validator::make($request->all(),[
            'title' => 'required|min:3|max:200',
            'category' => 'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            'location' => 'required|max:50',
            'description' => 'required',
            'experience' => 'required',
            'company_name' => 'required|min:3|max:50'


        ]);

        if($validator->passes()){
            $job = new Job();
            $job ->title = $request->title;
            $job ->category_id  = $request->category;
            $job ->job_types_id  = $request->jobType;
            $job ->vacancy = $request->vacancy;
            $job ->salary = $request->salary;
            $job ->location = $request->location;
            $job ->description = $request->description;
            $job ->benefit = $request->benefits;
            $job ->responsibility = $request->responsibility;
            $job ->qualification = $request->qualifications;
            $job ->experience = $request->experience;
            $job ->keywords = $request->keywords;
            $job ->company_name = $request->company_name;
            $job ->company_location = $request->company_location;
            $job ->company_website = $request->company_website;
            $job->save();

            session()->flash('success', 'Information Added Sucessfully');

            return response()->json([
                'status' => true,
                'errors'=> []
            ]);

        }
        else{
            return response()->json([
                'status' => false,
                'errors'=> $validator->errors()

            ]);
        }
    }

    public function myJob(){
        return view('front.account.job.myjob');
    }
}
