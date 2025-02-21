<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\job_types;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;
use function PHPUnit\Framework\isEmpty;

class JobsController extends Controller
{
    // This method will show page 
    public function index(Request $request) {

        $categories=Category::where('status',1)->get();
        $jobs=job_types::where('status',1)->get();
        $mainjobs=Job::where('status',1);

        // searching with keywords 

        if(!empty($request->keyword)){
            $mainjobs = $mainjobs->where(function ($query) use($request){
                $query->orWhere('title','like','%'.$request->keyword.'%');
                $query->orWhere('keywords','like','%'.$request->keyword.'%');

            });

        }

        // search using location 
        if(!empty($request->location)){
           $mainjobs=$mainjobs->where('location',$request->location);
        }

        // search by category 
        if(!empty($request->category)){
            $mainjobs = $mainjobs->where('category_id',$request->category);
        }

        // search using jobtype 
        $jobTypeArray=[];
        if(!empty($request->job_type)){
            $jobTypeArray=explode(',',$request->job_type);
            $mainjobs = $mainjobs->whereIn('job_types_id', $jobTypeArray);
        }

        // search using experience 
        if(!empty($request->experience)){
            $mainjobs=$mainjobs->where('experience',$request->experience);
        }

        $mainjobs= $mainjobs->with(['Category','jobType']);

        if($request->sort == 0){
            $mainjobs = $mainjobs->orderBy('created_at','ASC');

        }else
        {
         $mainjobs = $mainjobs->orderBy('created_at','DESC');

        }

       

        $mainjobs = $mainjobs->paginate(9);


        return view ('front.jobs',[
            'categories'=> $categories,
            'jobs'=>$jobs,
            'mainjobs'=> $mainjobs,
            'jobTypeArray' => $jobTypeArray
        ]);

    }


    public function details($id){
        
        $job =Job::where(['id'=> $id,
        'status' => 1
        
    ])->with(['jobType','Category'])->first();

    if($job == null){
        abort(404);
    }
  

    return view('front.jobDetails',[
        'job' => $job
    ]);

    }

}
