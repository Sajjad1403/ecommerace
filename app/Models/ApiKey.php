<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;
    
    protected $fillable = ['key','user_id','app_name','status','assign_to'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}