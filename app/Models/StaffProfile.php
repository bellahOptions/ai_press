<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StaffProfile extends Model
{
    protected $fillable = [
        'user_id', 'department', 'employee_id', 'hire_date',
        'emergency_contact', 'emergency_phone', 'notes',
    ];

    protected $casts = ['hire_date' => 'date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
