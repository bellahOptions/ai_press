<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\QuoteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function index()
    {
        return view('landing-page');
    }

    public function openBlog()
    {
        return view('blog.index');
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:150',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        try {
            Mail::to('info@aletinspirationz.com')->send(new ContactMail(
                senderName:   $data['name'],
                senderEmail:  $data['email'],
                senderPhone:  $data['phone'] ?? '',
                subject:      $data['subject'],
                messageBody:  $data['message'],
            ));

            return back()->with('success', 'Your message has been sent! We\'ll get back to you within 24 hours.');
        } catch (\Exception $e) {
            return back()->with('error', 'Sorry, something went wrong sending your message. Please try again or email us directly at info@aletinspirationz.com.')->withInput();
        }
    }

    public function faq()
    {
        $faqs = \App\Services\SeoService::faqs();
        return view('faq', compact('faqs'));
    }

    public function quote()
    {
        return view('quote');
    }

    public function submitQuote(Request $request)
    {
        $data = $request->validate([
            'name'            => 'required|string|max:100',
            'email'           => 'required|email|max:150',
            'phone'           => 'nullable|string|max:30',
            'company'         => 'nullable|string|max:150',
            'service_type'    => 'required|string|max:150',
            'project_details' => 'required|string|max:5000',
            'quantity'        => 'nullable|string|max:100',
            'timeline'        => 'nullable|string|max:50',
            'budget'          => 'nullable|string|max:50',
        ]);

        try {
            Mail::to('info@aletinspirationz.com')->send(new QuoteMail(
                clientName:     $data['name'],
                clientEmail:    $data['email'],
                clientPhone:    $data['phone'] ?? '',
                company:        $data['company'] ?? '',
                serviceType:    $data['service_type'],
                projectDetails: $data['project_details'],
                quantity:       $data['quantity'] ?? '',
                timeline:       $data['timeline'] ?? '',
                budget:         $data['budget'] ?? '',
            ));

            return back()->with('success', 'Your quote request has been received! Our team will prepare a detailed estimate and contact you within 24 business hours.');
        } catch (\Exception $e) {
            return back()->with('error', 'Sorry, something went wrong submitting your request. Please try again or contact us at info@aletinspirationz.com.')->withInput();
        }
    }
}
