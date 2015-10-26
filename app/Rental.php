<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    
    protected $table = 'rentals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'car_id', 'numDays', 'initMileage', 'finMileage', 'firstPayment', 'lastPayment', 'state'];
}
