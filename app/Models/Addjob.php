<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addjob extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'description', 'responsibilities', 'requirements', 'year', 'month', 'salary', 'deadline', 'company', 'status'];
    protected $guarded  = [];
}
