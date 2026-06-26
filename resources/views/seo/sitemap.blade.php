<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    {{-- Core static pages --}}
    <url>
        <loc>{{ \App\Services\SeoService::SITE_URL }}/</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{ \App\Services\SeoService::SITE_URL }}/about</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.90</priority>
    </url>
    <url>
        <loc>{{ \App\Services\SeoService::SITE_URL }}/services</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.95</priority>
    </url>
    <url>
        <loc>{{ \App\Services\SeoService::SITE_URL }}/quote</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.90</priority>
    </url>
    <url>
        <loc>{{ \App\Services\SeoService::SITE_URL }}/contact</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>{{ \App\Services\SeoService::SITE_URL }}/faq</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ \App\Services\SeoService::SITE_URL }}/blog</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>

    {{-- Dynamic blog posts --}}
    @foreach($blogs as $post)
    <url>
        <loc>{{ \App\Services\SeoService::SITE_URL }}/blog/{{ $post->slug }}</loc>
        <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.70</priority>
    </url>
    @endforeach

</urlset>
