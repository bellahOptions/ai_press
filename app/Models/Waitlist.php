<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waitlist extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'waitlist';

    protected $fillable = [
        'fullName',
        'phone',
        'email',
    ];
}
