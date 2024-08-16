<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function jobType(){
        return $this->belongsTo(job_types::class);
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
