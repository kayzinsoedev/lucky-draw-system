<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WinningNumber extends Model
{
    use SoftDeletes;
    protected $table = 'winning_numbers';
    protected $fillable = ['user_id', 'user_winning_number'];
}
