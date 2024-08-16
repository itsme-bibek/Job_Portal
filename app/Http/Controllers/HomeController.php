<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $category=Category::where('status',1)->orderBy('name', 'ASC')->take(8)->get();
        $featuresJobs=Job::where('status', 1)->orderBy('created_at', 'DESC')->where('isFeatured', 1)->take(6)->get();
        $latestJobs=Job::where('status', 1)->orderBy('created_at', 'DESC')->take(6)->get();

        return view('front.home',[
            'category' => $category,
            'featured' => $featuresJobs,
            'latestJobs' =>  $latestJobs
        ]);
    }
}
