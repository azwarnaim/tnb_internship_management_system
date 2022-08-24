<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyInternships extends Model
{
    protected $table = 'applyinternship';
    protected $fillable = ['image','name','age','education','courses','contactno','email','objective','supervisor','department','start','end','file','status'];

}
