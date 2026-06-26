<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Machine extends Model
{
    protected $fillable = ['name', 'type', 'status', 'notes'];

    public function bookings(): HasMany
    {
        return $this->hasMany(MachineBooking::class);
    }

    public function productionTickets(): HasMany
    {
        return $this->hasMany(ProductionTicket::class);
    }
}
