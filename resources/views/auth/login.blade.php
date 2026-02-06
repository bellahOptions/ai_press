@extends('layouts.newAuth')
@section('title', 'Welcome Back!')
@section('content')
    <main role="main" class="min-h-screen flex flex-col justify-center items-center">
        <div class="heading ">            
            <!--Logo-->
            <img src="{{ asset('logo.svg') }}"/>
            <h1 class="text-center text-gray-700 text-3xl my-5">
                Welcome Back!
            </h1>
        </div>
          <div class="mb-6">
    <label for="success" class="block mb-2.5 text-sm font-medium text-fg-success-strong">Your name</label>
    <input type="text" id="success" class="bg-success-soft border border-success-subtle text-fg-success-strong text-sm rounded-base focus:ring-success focus:border-success block w-full px-3 py-2.5 shadow-xs placeholder:text-fg-success-strong" placeholder="Success input">
    <p class="mt-2.5 text-sm text-fg-success-strong"><span class="font-medium">Well done!</span> Some success message.</p>
  </div>
  <div class="mb-6">
    <label for="danger" class="block mb-2.5 text-sm font-medium text-fg-danger-strong">Your name</label>
    <input type="text" id="danger" class="bg-danger-soft border border-danger-subtle text-fg-danger-strong text-sm rounded-base focus:ring-danger focus:border-danger block w-full px-3 py-2.5 shadow-xs placeholder:text-fg-danger-strong" placeholder="Error input">
    <p class="mt-2.5 text-sm text-fg-danger-strong"><span class="font-medium">Oh, snapp!</span> Some error message.</p>
  </div>
        <form class="max-w-sm mx-auto" method="post" action="">
            @csrf
            <div class="mb-5">
                <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Your email</label>
                <input type="email" id="email"
                    class="bg-gray-100 border border-gray-300 text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                    placeholder="name@flowbite.com" required />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Your password</label>
                <input type="password" id="password"
                    class="bg-gray-100 border border-gray-300 text-sm rounded-lg focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                    placeholder="••••••••" required />
            </div>
             <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
            <button type="submit"
                class="text-white bg-blue-600 my-4 box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-lg w-full text-sm px-4 py-2.5 focus:outline-none">Submit</button>

                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <p>Don't have an account? <a href="{{ route('register') }}" class="text-blue-600">Register here</a></p>
        </form>

    </main>
@endsection

