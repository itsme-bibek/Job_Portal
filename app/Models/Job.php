<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function jobType(){
        return $this->belongsTo(job_types::class, 'job_types_id');
    }

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
