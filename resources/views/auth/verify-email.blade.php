@extends('layouts.newAuth')

@section('title', 'Verify Email')

@section('content')
<div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
    <!-- Header Section -->
    <div class="bg-red-600 p-8 text-center">
        <div class="inline-block p-4 bg-white/10 backdrop-blur-sm rounded-full mb-6">
            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-white mb-2">Verify Your Email</h1>
        <p class="text-white/90">Almost there! Please verify your email address</p>
    </div>

    <!-- Content Section -->
    <div class="p-8">
        <!-- Success Message -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-green-800">
                        A new verification link has been sent to your email address.
                    </span>
                </div>
            </div>
        @endif

        <div class="text-center space-y-6">
            <!-- Instruction -->
            <div class="bg-red-50 border border-blue-100 rounded-xl p-6">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
                <p class="text-gray-700">
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
                </p>
                <p class="mt-3 text-gray-600 text-sm">
                    If you didn't receive the email, we will gladly send you another.
                </p>
            </div>

            <!-- Buttons -->
            <div class="space-y-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                            class="w-full bg-red-600 text-white font-semibold py-3 px-4 rounded-xl hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200 transform hover:-translate-y-0.5 shadow-lg">
                        Resend Verification Email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full border-2 border-gray-300 text-gray-700 font-semibold py-3 px-4 rounded-xl hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200">
                        Log Out
                    </button>
                </form>
            </div>

            <!-- Need Help -->
            <div class="pt-6 border-t border-gray-200">
                <p class="text-sm text-gray-600">
                    Need help?
                    <a href="mailto:support@aletinspirationz.com" class="font-medium text-red-600 hover:text-red-500">
                        Contact Support
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection