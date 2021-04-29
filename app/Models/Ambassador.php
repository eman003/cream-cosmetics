<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ambassador extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'image', 'status_id', 'creator_id'];
}
