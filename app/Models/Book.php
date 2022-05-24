<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table ="books";
    public $primarykey= 'id';
    public $timestamps =  true;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
