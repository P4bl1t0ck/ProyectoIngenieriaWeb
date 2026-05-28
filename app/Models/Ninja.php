<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*Now ew can create tables, based on this class, for Ninjas, for ORM
and be capable of use OOP on each method that we made on this class
also*/ 

class Ninja extends Model
{
    protected $fillable = ['name','skill','bio']; //Is admin
    //Array of column names
    
    /** @use HasFactory<\Database\Factories\NinjaFactory> */
    use HasFactory;
}

