<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homerooms(){
        return $this->hasMany(homerooms::class,'periode_id','id');
    }
}
