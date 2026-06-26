@extends('layouts.ops')
@section('page-title', 'Staff Management')
@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-10 text-center max-w-lg mx-auto mt-10">
    <div class="w-16 h-16 bg-red-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
    </div>
    <h3 class="text-gray-900 font-bold text-lg mb-2">Staff Management</h3>
    <p class="text-gray-500 text-sm mb-5">Manage staff accounts, roles, and profiles. Staff user management is available in the Admin panel.</p>
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 bg-red-600 text-white font-semibold text-sm px-5 py-2.5 rounded-xl hover:bg-red-700 transition-colors">Go to Admin Panel</a>
</div>
@endsection
