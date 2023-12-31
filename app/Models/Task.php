<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }

    // this will automatically insert updated_by and created_by in db
    public static function boot()
    {
       parent::boot();
       static::creating(function($model)
       {
           $model->created_by = auth()->id();
           $model->updated_by = auth()->id();
       });
       static::updating(function($model)
       {
           $model->updated_by = auth()->id();
       });
   }
}
