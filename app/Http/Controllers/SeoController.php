<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\SeoService;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $blogs = [];
        if (class_exists(Blog::class)) {
            try {
                $blogs = Blog::published()
                    ->select('slug', 'updated_at')
                    ->latest('updated_at')
                    ->get();
            } catch (\Throwable) {
                $blogs = [];
            }
        }

        $content = view('seo.sitemap', compact('blogs'))->render();

        return response($content, 200, [
            'Content-Type' => 'application/xml',
            'Cache-Control' => 'public, max-age=3600',
        ]);
    }

    public function robots(): Response
    {
        $content = view('seo.robots')->render();

        return response($content, 200, [
            'Content-Type' => 'text/plain',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    public function llms(): Response
    {
        $facts    = SeoService::companyFacts();
        $services = SeoService::services();
        $faqs     = SeoService::faqs();
        $content  = view('seo.llms-txt', compact('facts', 'services', 'faqs'))->render();

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    public function aiTxt(): Response
    {
        $facts    = SeoService::companyFacts();
        $services = SeoService::services();
        $content  = view('seo.ai-txt', compact('facts', 'services'))->render();

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
