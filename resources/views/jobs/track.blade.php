@extends('layouts.auth.theme')
@section('title', 'Track Job | ' . ' ' . Auth::user()->firstName)
@section('content')
    <main role="main">
        <div class="main-board flex flex-col items-center min-h-screen justify-center">
            <h1 class="text-4xl text-center font-bold text-gray-800 mb-4">Track Job Progress</h1>
            <p class="text-center text-gray-800">Enter Your Job ID  ro check progress</p>
            <div class="trackingForm">
                <form action="#" method="POST">
                    <input type="text" name="tracking_id" placeholder="Enter your tracking ID" class="w-full focus:ring-2 active:border-4  active:border-red-500  focus:ring-red-500 my-4 border-3 border-gray-200 rounded-xl p-4" />
                    <button type="submit" class="bg-red-600 hover:bg-red-700 p-3 rounded-lg text-white font-bold w-full">Track Job</button>
                </form>
            </div>
        </div>
    </main>
@endsection