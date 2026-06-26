@extends('layouts.theme')

@section('title', 'Get a Quote — Alet Inspirationz Prints Limited')

@section('content')

{{-- Hero --}}
<section class="relative bg-gray-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10"
         style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="absolute inset-0 bg-gradient-to-br from-red-900/60 via-gray-900/80 to-gray-900"></div>
    <div class="relative max-w-6xl mx-auto px-4 py-24 text-center">
        <span class="inline-block bg-red-600/20 border border-red-500/40 text-red-300 text-xs font-semibold uppercase tracking-widest px-4 py-1.5 rounded-full mb-6">Free Estimate</span>
        <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-5">
            Get a <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-red-600">Free Quote</span>
        </h1>
        <p class="text-lg text-gray-300 max-w-xl mx-auto">Fill out the form below and our team will get back to you with a detailed, no-obligation quote within 24 hours.</p>
    </div>
</section>

{{-- Flash Messages --}}
@if(session('success'))
<div class="max-w-4xl mx-auto px-4 mt-8">
    <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl px-5 py-4 flex items-center gap-3">
        <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        {{ session('success') }}
    </div>
</div>
@endif

@if(session('error'))
<div class="max-w-4xl mx-auto px-4 mt-8">
    <div class="bg-red-50 border border-red-200 text-red-800 rounded-xl px-5 py-4 flex items-center gap-3">
        <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        {{ session('error') }}
    </div>
</div>
@endif

{{-- Form Section --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 md:p-12">
            <form action="{{ route('quote.send') }}" method="POST" class="space-y-8">
                @csrf

                {{-- Client Details --}}
                <div>
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="w-8 h-8 bg-gradient-to-br from-red-600 to-red-800 rounded-lg flex items-center justify-center text-white font-bold text-sm">1</div>
                        <h2 class="text-lg font-extrabold text-gray-900">Your Details</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required value="{{ old('name') }}"
                                   placeholder="John Doe"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition @error('name') border-red-400 @enderror">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Company / Organization</label>
                            <input type="text" name="company" value="{{ old('company') }}"
                                   placeholder="Your Company Ltd"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" required value="{{ old('email') }}"
                                   placeholder="john@company.com"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition @error('email') border-red-400 @enderror">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Phone Number</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}"
                                   placeholder="+234 800 000 0000"
                                   class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                        </div>
                    </div>
                </div>

                {{-- Project Details --}}
                <div>
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="w-8 h-8 bg-gradient-to-br from-red-600 to-red-800 rounded-lg flex items-center justify-center text-white font-bold text-sm">2</div>
                        <h2 class="text-lg font-extrabold text-gray-900">Project Details</h2>
                    </div>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Service Required <span class="text-red-500">*</span></label>
                            <select name="service_type" required
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition bg-white @error('service_type') border-red-400 @enderror">
                                <option value="">Select a service...</option>
                                <option value="Ideas Conceptualization & Graphic Design" {{ old('service_type') == 'Ideas Conceptualization & Graphic Design' ? 'selected' : '' }}>Ideas Conceptualization &amp; Graphic Design</option>
                                <option value="Corporate Identity & Brand Consultancy" {{ old('service_type') == 'Corporate Identity & Brand Consultancy' ? 'selected' : '' }}>Corporate Identity &amp; Brand Consultancy</option>
                                <option value="Packaging Design and Production" {{ old('service_type') == 'Packaging Design and Production' ? 'selected' : '' }}>Packaging Design and Production</option>
                                <option value="Digital, Offset & Large Format Printing" {{ old('service_type') == 'Digital, Offset & Large Format Printing' ? 'selected' : '' }}>Digital, Offset &amp; Large Format Printing</option>
                                <option value="Printing & Publishing" {{ old('service_type') == 'Printing & Publishing' ? 'selected' : '' }}>Printing &amp; Publishing</option>
                                <option value="Web Graphics & Designs" {{ old('service_type') == 'Web Graphics & Designs' ? 'selected' : '' }}>Web Graphics &amp; Designs</option>
                                <option value="Signages & Monogramming" {{ old('service_type') == 'Signages & Monogramming' ? 'selected' : '' }}>Signages &amp; Monogramming</option>
                                <option value="Schools' Writing Materials & Yearbooks" {{ old('service_type') == "Schools' Writing Materials & Yearbooks" ? 'selected' : '' }}>Schools' Writing Materials &amp; Yearbooks</option>
                                <option value="Corporate Gifts & Awards" {{ old('service_type') == 'Corporate Gifts & Awards' ? 'selected' : '' }}>Corporate Gifts &amp; Awards</option>
                                <option value="Printing Consumables Supply" {{ old('service_type') == 'Printing Consumables Supply' ? 'selected' : '' }}>Printing Consumables Supply</option>
                                <option value="Training & Consultancy" {{ old('service_type') == 'Training & Consultancy' ? 'selected' : '' }}>Training &amp; Consultancy</option>
                                <option value="Multiple Services" {{ old('service_type') == 'Multiple Services' ? 'selected' : '' }}>Multiple Services</option>
                            </select>
                            @error('service_type')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Project Description <span class="text-red-500">*</span></label>
                            <textarea name="project_details" required rows="5"
                                      placeholder="Describe your project in as much detail as possible — materials, sizes, colours, special requirements, reference examples, etc."
                                      class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition resize-none @error('project_details') border-red-400 @enderror">{{ old('project_details') }}</textarea>
                            @error('project_details')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Quantity / Volume</label>
                                <input type="text" name="quantity" value="{{ old('quantity') }}"
                                       placeholder="e.g. 500 copies"
                                       class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Desired Timeline</label>
                                <select name="timeline"
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition bg-white">
                                    <option value="">Select timeline...</option>
                                    <option value="ASAP (Rush)" {{ old('timeline') == 'ASAP (Rush)' ? 'selected' : '' }}>ASAP (Rush)</option>
                                    <option value="Within 3 days" {{ old('timeline') == 'Within 3 days' ? 'selected' : '' }}>Within 3 days</option>
                                    <option value="Within 1 week" {{ old('timeline') == 'Within 1 week' ? 'selected' : '' }}>Within 1 week</option>
                                    <option value="Within 2 weeks" {{ old('timeline') == 'Within 2 weeks' ? 'selected' : '' }}>Within 2 weeks</option>
                                    <option value="Within 1 month" {{ old('timeline') == 'Within 1 month' ? 'selected' : '' }}>Within 1 month</option>
                                    <option value="Flexible" {{ old('timeline') == 'Flexible' ? 'selected' : '' }}>Flexible</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Approximate Budget</label>
                                <select name="budget"
                                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition bg-white">
                                    <option value="">Select range...</option>
                                    <option value="Under ₦50,000" {{ old('budget') == 'Under ₦50,000' ? 'selected' : '' }}>Under ₦50,000</option>
                                    <option value="₦50,000 – ₦150,000" {{ old('budget') == '₦50,000 – ₦150,000' ? 'selected' : '' }}>₦50,000 – ₦150,000</option>
                                    <option value="₦150,000 – ₦500,000" {{ old('budget') == '₦150,000 – ₦500,000' ? 'selected' : '' }}>₦150,000 – ₦500,000</option>
                                    <option value="₦500,000 – ₦1,000,000" {{ old('budget') == '₦500,000 – ₦1,000,000' ? 'selected' : '' }}>₦500,000 – ₦1,000,000</option>
                                    <option value="Over ₦1,000,000" {{ old('budget') == 'Over ₦1,000,000' ? 'selected' : '' }}>Over ₦1,000,000</option>
                                    <option value="To be discussed" {{ old('budget') == 'To be discussed' ? 'selected' : '' }}>To be discussed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 to-red-700 text-white font-bold py-4 rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-red-200 flex items-center justify-center gap-2 text-base">
                    Submit Quote Request
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </button>
            </form>
        </div>

        {{-- What Happens Next --}}
        <div class="mt-10 bg-gray-900 rounded-2xl p-8">
            <h3 class="text-white font-bold text-lg mb-6 text-center">What Happens Next?</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach([['We Review','Our team reviews your request in detail within a few hours of submission.','M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],['We Quote','A detailed, itemized quote is prepared and sent to your email within 24 business hours.','M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 11h.01M12 11h.01M15 11h.01M12 7h.01M15 7h.01M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z'],['We Deliver','Once approved, production begins and we keep you updated until delivery.','M5 13l4 4L19 7']] as $i => $step)
                <div class="text-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-600 to-red-800 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $step[2] }}"/>
                        </svg>
                    </div>
                    <h4 class="text-white font-semibold text-sm mb-2">{{ $step[0] }}</h4>
                    <p class="text-gray-400 text-xs leading-relaxed">{{ $step[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
