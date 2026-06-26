@props(['dynamic' => []])
@php
    use App\Services\SeoService;

    $routeName   = Route::currentRouteName() ?? 'landingPage';
    $seo         = SeoService::forRoute($routeName, $dynamic);
    $facts       = SeoService::companyFacts();
    $title       = $seo['title'];
    $description = $seo['description'];
    $keywords    = $seo['keywords'];
    $canonical   = $seo['canonical'];
    $ogType      = $seo['og_type']   ?? 'website';
    $ogImage     = $seo['og_image']  ?? SeoService::OG_IMAGE;
    $robots      = $seo['robots']    ?? 'index, follow';
    $schemaTypes = $seo['schema_types'] ?? ['WebPage'];
    $breadcrumbs = SeoService::breadcrumbs($routeName, $dynamic['breadcrumb_label'] ?? null);

    // ── Build every JSON-LD schema as a PHP array so Blade never sees @type/@id ──

    $websiteSchema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'WebSite',
        'name'            => SeoService::SITE_NAME,
        'alternateName'   => 'Alet Inspirationz',
        'url'             => SeoService::SITE_URL,
        'description'     => $description,
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => [
                '@type'       => 'EntryPoint',
                'urlTemplate' => SeoService::SITE_URL . '/blog?q={search_term_string}',
            ],
            'query-input' => 'required name=search_term_string',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name'  => SeoService::SITE_NAME,
            'url'   => SeoService::SITE_URL,
        ],
    ];

    $orgSchema = [
        '@context'      => 'https://schema.org',
        '@type'         => 'Organization',
        '@id'           => SeoService::SITE_URL . '/#organization',
        'name'          => $facts['name'],
        'alternateName' => $facts['alternateName'],
        'legalName'     => 'Alet Inspirationz Prints Limited',
        'url'           => $facts['url'],
        'logo'          => [
            '@type'  => 'ImageObject',
            'url'    => $facts['logo'],
            'width'  => 400,
            'height' => 100,
        ],
        'image'          => $facts['image'],
        'description'    => $facts['description'],
        'foundingDate'   => $facts['founded'],
        'foundingLocation' => ['@type' => 'Place', 'name' => 'Lagos, Nigeria'],
        'leiCode'        => 'RC' . $facts['registrationNo'],
        'email'          => $facts['email'],
        'telephone'      => $facts['phone'],
        'address'        => [
            '@type'          => 'PostalAddress',
            'addressLocality'  => 'Lagos',
            'addressRegion'    => 'Lagos State',
            'addressCountry'   => 'NG',
        ],
        'contactPoint' => [
            [
                '@type'             => 'ContactPoint',
                'telephone'         => $facts['phone'],
                'contactType'       => 'customer service',
                'email'             => $facts['email'],
                'availableLanguage' => 'English',
                'areaServed'        => 'NG',
            ],
            [
                '@type'       => 'ContactPoint',
                'telephone'   => $facts['phone'],
                'contactType' => 'sales',
                'areaServed'  => 'NG',
            ],
        ],
        'sameAs' => $facts['sameAs'],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name'  => 'Print & Creative Services',
            'itemListElement' => array_map(fn($svc) => [
                '@type'        => 'Offer',
                'itemOffered'  => [
                    '@type'       => 'Service',
                    'name'        => $svc['name'],
                    'description' => $svc['description'],
                    'url'         => $svc['url'],
                    'provider'    => ['@id' => SeoService::SITE_URL . '/#organization'],
                ],
            ], $facts['services']),
        ],
        'memberOf' => [
            '@type' => 'Organization',
            'name'  => 'Alet Inspirationz Group',
            'url'   => SeoService::SITE_URL,
        ],
    ];

    $localBusinessSchema = [
        '@context'          => 'https://schema.org',
        '@type'             => ['LocalBusiness', 'ProfessionalService'],
        '@id'               => SeoService::SITE_URL . '/#localbusiness',
        'name'              => SeoService::SITE_NAME,
        'image'             => SeoService::OG_IMAGE,
        'url'               => SeoService::SITE_URL,
        'telephone'         => SeoService::PHONE,
        'email'             => SeoService::EMAIL,
        'priceRange'        => $facts['priceRange'],
        'currenciesAccepted'=> 'NGN',
        'paymentAccepted'   => $facts['paymentAccepted'],
        'openingHours'      => $facts['openingHours'],
        'address'           => [
            '@type'          => 'PostalAddress',
            'streetAddress'  => 'Lagos',
            'addressLocality'  => 'Lagos',
            'addressRegion'    => 'Lagos State',
            'addressCountry'   => 'NG',
        ],
        'geo' => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => (float) SeoService::LATITUDE,
            'longitude' => (float) SeoService::LONGITUDE,
        ],
        'areaServed' => [
            ['@type' => 'City',    'name' => 'Lagos'],
            ['@type' => 'City',    'name' => 'Abuja'],
            ['@type' => 'City',    'name' => 'Port Harcourt'],
            ['@type' => 'Country', 'name' => 'Nigeria'],
        ],
        'hasMap'    => 'https://www.google.com/maps/search/Alet+Inspirationz+Prints+Lagos',
        'knowsAbout'=> ['Printing', 'Graphic Design', 'Brand Identity', 'Packaging', 'Signage', 'Publishing', 'Corporate Gifts'],
        'slogan'    => 'Quality Printing. Creative Excellence. On Time. Every Time.',
        'parentOrganization' => ['@id' => SeoService::SITE_URL . '/#organization'],
    ];

    // Breadcrumb schema (only when more than home)
    $breadcrumbSchema = null;
    if (count($breadcrumbs) > 1) {
        $breadcrumbSchema = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => array_map(fn($crumb, $i) => [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'name'     => $crumb['name'],
                'item'     => $crumb['url'],
            ], $breadcrumbs, array_keys($breadcrumbs)),
        ];
    }

    // Page-type schemas
    $aboutSchema = in_array('AboutPage', $schemaTypes) ? [
        '@context'   => 'https://schema.org',
        '@type'      => 'AboutPage',
        'name'       => 'About Alet Inspirationz Prints Limited',
        'url'        => SeoService::SITE_URL . '/about',
        'description'=> $facts['description'],
        'mainEntity' => ['@id' => SeoService::SITE_URL . '/#organization'],
    ] : null;

    $contactSchema = in_array('ContactPage', $schemaTypes) ? [
        '@context'  => 'https://schema.org',
        '@type'     => 'ContactPage',
        'name'      => 'Contact Alet Inspirationz',
        'url'       => SeoService::SITE_URL . '/contact',
        'mainEntity'=> ['@id' => SeoService::SITE_URL . '/#organization'],
    ] : null;

    $faqSchema = null;
    if (in_array('FAQPage', $schemaTypes)) {
        $faqSchema = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'name'       => 'Frequently Asked Questions — Alet Inspirationz Prints',
            'url'        => SeoService::SITE_URL . '/faq',
            'mainEntity' => array_map(fn($faq) => [
                '@type' => 'Question',
                'name'  => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text'  => $faq['answer'],
                ],
            ], SeoService::faqs()),
        ];
    }

    $itemListSchema = null;
    if (in_array('ItemList', $schemaTypes)) {
        $itemListSchema = [
            '@context'       => 'https://schema.org',
            '@type'          => 'ItemList',
            'name'           => 'Printing & Creative Services — Alet Inspirationz',
            'description'    => 'Complete list of services offered by Alet Inspirationz Prints Limited in Lagos, Nigeria.',
            'url'            => SeoService::SITE_URL . '/services',
            'numberOfItems'  => count($facts['services']),
            'itemListElement'=> array_map(fn($svc, $i) => [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'item'     => [
                    '@type'       => 'Service',
                    'name'        => $svc['name'],
                    'description' => $svc['description'],
                    'url'         => $svc['url'],
                    'provider'    => ['@id' => SeoService::SITE_URL . '/#organization'],
                    'areaServed'  => 'Lagos, Nigeria',
                    'serviceType' => 'Printing and Creative Services',
                ],
            ], $facts['services'], array_keys($facts['services'])),
        ];
    }

    $blogSchema = in_array('Blog', $schemaTypes) ? [
        '@context'   => 'https://schema.org',
        '@type'      => 'Blog',
        'name'       => 'Alet Inspirationz Prints Blog',
        'url'        => SeoService::SITE_URL . '/blog',
        'description'=> 'Printing tips, branding trends, packaging design ideas, and creative industry insights from Lagos, Nigeria.',
        'publisher'  => ['@id' => SeoService::SITE_URL . '/#organization'],
    ] : null;

    $articleSchema = null;
    if (!empty($dynamic['is_article'])) {
        $articleSchema = [
            '@context'    => 'https://schema.org',
            '@type'       => 'BlogPosting',
            'headline'    => $title,
            'description' => $description,
            'image'       => $ogImage,
            'url'         => $canonical,
            'datePublished' => $dynamic['published_at'] ?? now()->toIso8601String(),
            'dateModified'  => $dynamic['updated_at']   ?? now()->toIso8601String(),
            'author'      => [
                '@type' => 'Organization',
                '@id'   => SeoService::SITE_URL . '/#organization',
                'name'  => SeoService::SITE_NAME,
            ],
            'publisher' => [
                '@type' => 'Organization',
                '@id'   => SeoService::SITE_URL . '/#organization',
                'name'  => SeoService::SITE_NAME,
                'logo'  => ['@type' => 'ImageObject', 'url' => SeoService::SITE_URL . '/images/logo.png'],
            ],
            'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $canonical],
            'keywords'    => $keywords,
        ];
    }

    $jsonFlags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
@endphp

{{-- ════════════════════════════════════════════════════════════
     LAYER 1 — TRADITIONAL SEO META TAGS
     ════════════════════════════════════════════════════════════ --}}

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<meta name="robots" content="{{ $robots }}">
<meta name="author" content="{{ SeoService::SITE_NAME }}">
<link rel="canonical" href="{{ $canonical }}">

{{-- Geo targeting --}}
<meta name="geo.region" content="NG-LA">
<meta name="geo.placename" content="Lagos, Nigeria">
<meta name="geo.position" content="{{ SeoService::LATITUDE }};{{ SeoService::LONGITUDE }}">
<meta name="ICBM" content="{{ SeoService::LATITUDE }}, {{ SeoService::LONGITUDE }}">

{{-- Open Graph --}}
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ SeoService::SITE_NAME }} — Lagos, Nigeria">
<meta property="og:site_name" content="{{ SeoService::SITE_NAME }}">
<meta property="og:locale" content="en_NG">
<meta property="business:contact_data:locality" content="Lagos">
<meta property="business:contact_data:country_name" content="Nigeria">
<meta property="business:contact_data:email" content="{{ SeoService::EMAIL }}">
<meta property="business:contact_data:phone_number" content="{{ SeoService::PHONE }}">

{{-- Twitter Cards --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ SeoService::TWITTER }}">
<meta name="twitter:creator" content="{{ SeoService::TWITTER }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $ogImage }}">
<meta name="twitter:image:alt" content="{{ SeoService::SITE_NAME }}">

{{-- Entity disambiguation --}}
<meta name="organization" content="{{ SeoService::SITE_NAME }}">
<meta name="registration-number" content="RC {{ SeoService::RC_NUMBER }}">

{{-- Hreflang --}}
<link rel="alternate" hreflang="en-ng" href="{{ $canonical }}">
<link rel="alternate" hreflang="x-default" href="{{ SeoService::SITE_URL }}/">

{{-- ════════════════════════════════════════════════════════════
     LAYER 2 — JSON-LD STRUCTURED DATA (PHP arrays → json_encode)
     ════════════════════════════════════════════════════════════ --}}

<script type="application/ld+json">{!! json_encode($websiteSchema, $jsonFlags) !!}</script>
<script type="application/ld+json">{!! json_encode($orgSchema, $jsonFlags) !!}</script>
<script type="application/ld+json">{!! json_encode($localBusinessSchema, $jsonFlags) !!}</script>

@if($breadcrumbSchema)
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, $jsonFlags) !!}</script>
@endif

@if($aboutSchema)
<script type="application/ld+json">{!! json_encode($aboutSchema, $jsonFlags) !!}</script>
@endif

@if($contactSchema)
<script type="application/ld+json">{!! json_encode($contactSchema, $jsonFlags) !!}</script>
@endif

@if($faqSchema)
<script type="application/ld+json">{!! json_encode($faqSchema, $jsonFlags) !!}</script>
@endif

@if($itemListSchema)
<script type="application/ld+json">{!! json_encode($itemListSchema, $jsonFlags) !!}</script>
@endif

@if($blogSchema)
<script type="application/ld+json">{!! json_encode($blogSchema, $jsonFlags) !!}</script>
@endif

@if($articleSchema)
<script type="application/ld+json">{!! json_encode($articleSchema, $jsonFlags) !!}</script>
@endif
