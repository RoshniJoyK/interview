<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addstaff extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getFromAttribute(){
        return date('Y-m', strtotime($this->attributes['from']));
    }

    public function getToAttribute(){
        return date('Y-m', strtotime($this->attributes['to']));
    }
    public function setFromAttribute($value){
        $this->attributes['from'] = date('Y-m-01', strtotime($value));
    }

    public function setToAttribute($value){
        $this->attributes['to'] = date('Y-m-01', strtotime($value));
    }
}
