<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrizeType extends Model
{
    use SoftDeletes;
    protected $table = 'prize_types';
    protected $fillable = ['name'];

}
