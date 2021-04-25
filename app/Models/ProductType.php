<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function products()
    {

    }
}
