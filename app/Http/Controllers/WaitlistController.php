<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waitlist;

class WaitlistController extends Controller
{
   public function joinWaitlist(Request $request)
{
    $request->validate([
        'fullName' => ['required', 'string', 'max:255'],
        'email'    => ['required', 'string', 'email', 'lowercase'],
        'phone'    => ['nullable', 'string', 'max:20'],
    ]);

    Waitlist::create([
        'fullName' => $request->fullName,
        'email'    => $request->email,
        'phone'    => $request->phone,
    ]);

    return redirect()
        ->route('waitlist.success')
        ->with('success', 'Thanks for joining the waitlist!');
}


    public function successPage() {
        return view('waitlist-success');
    }
}
