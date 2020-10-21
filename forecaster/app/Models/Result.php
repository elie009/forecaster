<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    
    
    protected $table = "results";
    public $timestamps  = true;
    
    protected $fillable = [
        'temp', 'city','country','src'
    ];
}
