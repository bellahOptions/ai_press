<?php

namespace App\Services;

/**
 * Central SEO/GEO/LLM configuration for every page on aletinspirationz.com.
 *
 * Strategy layers:
 *  1. Traditional SEO  — title, meta description, canonical, OG, Twitter cards, robots
 *  2. Structured Data  — JSON-LD schemas (Organization, LocalBusiness, Service, FAQ,
 *                        WebSite, BreadcrumbList, Article/BlogPosting)
 *  3. GEO/LLM signals  — /llms.txt, /ai.txt, entity disambiguation, FAQ blocks,
 *                        citation-ready factual copy
 */
class SeoService
{
    public const SITE_NAME   = 'Alet Inspirationz Prints Limited';
    public const SITE_URL    = 'https://aletinspirationz.com';
    public const TWITTER     = '@alet_inspirationz';
    public const FACEBOOK    = 'https://www.facebook.com/aletinspirationzltd';
    public const INSTAGRAM   = 'https://www.instagram.com/alet_inspirationz';
    public const LINKEDIN    = 'https://www.linkedin.com/company/alet-inspirationz';
    public const PHONE       = '+2348000000000';
    public const EMAIL       = 'info@aletinspirationz.com';
    public const ADDRESS     = 'Lagos, Nigeria';
    public const LATITUDE    = '6.5244';
    public const LONGITUDE   = '3.3792';
    public const RC_NUMBER   = '1878085';
    public const FOUNDED     = '2023';
    public const OG_IMAGE    = 'https://aletinspirationz.com/images/og-default.jpg';

    /** Per-route SEO config — keyed by Laravel route name */
    public static function forRoute(string $routeName, array $dynamic = []): array
    {
        $pages = [
            'landingPage' => [
                'title'       => 'Best Printing Company in Lagos Nigeria | Alet Inspirationz',
                'description' => 'Alet Inspirationz Prints Limited is Lagos\'s premier printing, branding, and packaging company. Quality digital, offset & large-format printing with fast turnaround. Get a free quote today.',
                'keywords'    => 'printing company Lagos, printing company Nigeria, graphic design Lagos, corporate printing Lagos, packaging design Nigeria, banner printing Lagos, flyer printing Lagos, offset printing Lagos, large format printing Nigeria',
                'canonical'   => self::SITE_URL . '/',
                'og_type'     => 'website',
                'schema_types'=> ['WebSite', 'Organization', 'LocalBusiness'],
            ],
            'about' => [
                'title'       => 'About Alet Inspirationz | Print & Branding Experts Since 2023 — Lagos',
                'description' => 'Learn about Alet Inspirationz Prints Limited (RC: 1878085) — an indigenous Nigerian printing powerhouse serving Lagos with integrity, excellence, and world-class creative services since 2023.',
                'keywords'    => 'about Alet Inspirationz, printing company history Lagos, Nigerian printing company, Lagos branding agency, indigenous printing company Nigeria',
                'canonical'   => self::SITE_URL . '/about',
                'og_type'     => 'website',
                'schema_types'=> ['AboutPage', 'Organization'],
            ],
            'services' => [
                'title'       => 'Printing & Branding Services in Lagos | Alet Inspirationz',
                'description' => 'Explore all 11 services: graphic design, corporate branding, packaging, digital/offset/large-format printing, signage, yearbooks, corporate gifts, web graphics, training & more — all in Lagos.',
                'keywords'    => 'printing services Lagos, graphic design Lagos, packaging design Nigeria, signage company Lagos, yearbook printing Lagos, corporate gifts Nigeria, large format printing Lagos, offset printing Nigeria, web graphics Lagos',
                'canonical'   => self::SITE_URL . '/services',
                'og_type'     => 'website',
                'schema_types'=> ['WebPage', 'ItemList'],
            ],
            'contact' => [
                'title'       => 'Contact Alet Inspirationz Prints | Lagos Printing Company',
                'description' => 'Get in touch with Alet Inspirationz Prints in Lagos. Call, email, or fill our form — we respond within 24 hours. Expert printing, branding, and packaging services in Nigeria.',
                'keywords'    => 'contact printing company Lagos, printing company phone number Lagos, printing quote Lagos Nigeria',
                'canonical'   => self::SITE_URL . '/contact',
                'og_type'     => 'website',
                'schema_types'=> ['ContactPage'],
            ],
            'quote' => [
                'title'       => 'Get a Free Printing Quote | Alet Inspirationz Lagos',
                'description' => 'Request a free, no-obligation printing quote from Alet Inspirationz. Covers all jobs: flyers, banners, packaging, yearbooks, corporate branding and more. Fast response guaranteed.',
                'keywords'    => 'free printing quote Lagos, printing price Nigeria, get quote printing company Lagos, print job estimate Nigeria',
                'canonical'   => self::SITE_URL . '/quote',
                'og_type'     => 'website',
                'schema_types'=> ['WebPage'],
            ],
            'blog' => [
                'title'       => 'Print & Design Blog | Tips, Trends & Industry Insights — Alet Inspirationz',
                'description' => 'The Alet Inspirationz blog covers printing tips, branding trends, packaging design ideas, and creative industry insights from Lagos, Nigeria.',
                'keywords'    => 'printing tips Nigeria, branding advice Lagos, packaging design trends, graphic design blog Nigeria, printing industry Lagos',
                'canonical'   => self::SITE_URL . '/blog',
                'og_type'     => 'website',
                'schema_types'=> ['WebPage', 'Blog'],
            ],
            'faq' => [
                'title'       => 'Printing FAQs — Alet Inspirationz Lagos | Common Questions Answered',
                'description' => 'Answers to the most common questions about printing, branding, packaging, and design services at Alet Inspirationz Prints in Lagos, Nigeria.',
                'keywords'    => 'printing company FAQ Lagos, printing questions Nigeria, how much does printing cost Lagos, printing turnaround time Nigeria',
                'canonical'   => self::SITE_URL . '/faq',
                'og_type'     => 'website',
                'schema_types'=> ['FAQPage'],
            ],
        ];

        $config = $pages[$routeName] ?? [
            'title'       => self::SITE_NAME . ' — Quality Printing in Lagos, Nigeria',
            'description' => 'Alet Inspirationz Prints Limited — Lagos\'s trusted printing, branding and creative services company. Quality, speed, and excellence on every job.',
            'keywords'    => 'printing company Lagos Nigeria, Alet Inspirationz',
            'canonical'   => self::SITE_URL . request()->getPathInfo(),
            'og_type'     => 'website',
            'schema_types'=> ['WebPage'],
        ];

        // Allow dynamic overrides (e.g. blog post passes title/description/og_image)
        return array_merge($config, $dynamic);
    }

    /** Shared company facts used across schemas and llms.txt */
    public static function companyFacts(): array
    {
        return [
            'name'           => self::SITE_NAME,
            'alternateName'  => ['Alet Inspirationz', 'Alet Prints', 'AletInspirationz'],
            'url'            => self::SITE_URL,
            'logo'           => self::SITE_URL . '/images/logo.png',
            'image'          => self::OG_IMAGE,
            'description'    => 'Alet Inspirationz Prints Limited (RC: 1878085) is an indigenous Nigerian printing, branding, and creative services company established in 2023, headquartered in Lagos, Nigeria. It operates under the Alet Inspirationz Group alongside AI Digital Agency (RC: 1911945) and Printbuka.com (RC: 1905426).',
            'founded'        => self::FOUNDED,
            'registrationNo' => self::RC_NUMBER,
            'email'          => self::EMAIL,
            'phone'          => self::PHONE,
            'address'        => self::ADDRESS,
            'latitude'       => self::LATITUDE,
            'longitude'      => self::LONGITUDE,
            'sameAs'         => [self::FACEBOOK, self::INSTAGRAM, self::LINKEDIN],
            'services'       => self::services(),
            'areaServed'     => ['Lagos', 'Abuja', 'Port Harcourt', 'Nigeria', 'West Africa'],
            'priceRange'     => '₦₦',
            'paymentAccepted'=> 'Cash, Bank Transfer, POS, Paystack, Flutterwave',
            'openingHours'   => 'Mo-Fr 08:00-18:00, Sa 09:00-15:00',
            'mission'        => 'To provide our clients with the highest allied quality printing products and services coupled with exceptional and impeccable service delivery and solutions geared towards optimal clients satisfaction.',
            'vision'         => 'To become an outstanding brand and a pacesetter in the creative and printing industry globally.',
            'values'         => ['Integrity', 'Excellence', 'Professionalism', 'Innovativeness', 'Client Centeredness'],
        ];
    }

    public static function services(): array
    {
        return [
            [
                'name'        => 'Ideas Conceptualization & Graphic Design',
                'description' => 'We transform raw ideas into compelling visual concepts — logos, brochures, flyers, and complete design systems tailored to your brand.',
                'keywords'    => 'graphic design Lagos, logo design Nigeria, brochure design Lagos',
                'url'         => self::SITE_URL . '/services#graphic-design',
            ],
            [
                'name'        => 'Corporate Identity & Brand Consultancy',
                'description' => 'Comprehensive brand identity systems including logos, colour palettes, brand guidelines, and strategic consultancy for businesses in Lagos and Nigeria.',
                'keywords'    => 'branding company Lagos, brand identity Nigeria, corporate identity Lagos',
                'url'         => self::SITE_URL . '/services#branding',
            ],
            [
                'name'        => 'Packaging Design & Production',
                'description' => 'Custom product packaging that sells — boxes, cartons, labels, sachets, and luxury gift sets designed and produced to international standards.',
                'keywords'    => 'packaging design Lagos, product packaging Nigeria, custom boxes Lagos',
                'url'         => self::SITE_URL . '/services#packaging',
            ],
            [
                'name'        => 'Digital, Offset & Large Format Printing',
                'description' => 'High-quality printing across digital presses, offset machines, and wide-format printers — flyers, banners, billboards, posters, and more.',
                'keywords'    => 'digital printing Lagos, offset printing Nigeria, large format printing Lagos, banner printing Lagos',
                'url'         => self::SITE_URL . '/services#printing',
            ],
            [
                'name'        => 'Printing & Publishing',
                'description' => 'Complete publishing solutions — books, magazines, catalogues, annual reports, diaries, with professional typesetting, binding, and finishing.',
                'keywords'    => 'book printing Lagos, magazine printing Nigeria, catalogue printing Lagos, publishing company Nigeria',
                'url'         => self::SITE_URL . '/services#publishing',
            ],
            [
                'name'        => 'Web Graphics & Designs',
                'description' => 'Digital-first visual content — social media graphics, email templates, web banners, and UI assets that maintain brand consistency online.',
                'keywords'    => 'social media graphics Lagos, web design graphics Nigeria, digital marketing visuals Lagos',
                'url'         => self::SITE_URL . '/services#web-graphics',
            ],
            [
                'name'        => 'Signages & Monogramming',
                'description' => 'Premium indoor and outdoor signage, vehicle branding, wayfinding systems, and custom monogrammed items for corporate and personal use.',
                'keywords'    => 'signage company Lagos, outdoor signs Nigeria, vehicle branding Lagos, monogramming Lagos',
                'url'         => self::SITE_URL . '/services#signage',
            ],
            [
                'name'        => "Schools' Writing Materials & Yearbooks",
                'description' => 'Custom school stationery, exercise books, diaries, and yearbooks — branded with school logos and colours for educational institutions across Nigeria.',
                'keywords'    => 'yearbook printing Lagos, school stationery Nigeria, exercise book printing Lagos',
                'url'         => self::SITE_URL . '/services#education',
            ],
            [
                'name'        => 'Corporate Gifts & Awards',
                'description' => 'Personalized plaques, trophies, branded merchandise, and premium corporate gift packages for events, staff appreciation, and client retention.',
                'keywords'    => 'corporate gifts Lagos, branded merchandise Nigeria, trophies plaques Lagos, promotional items Nigeria',
                'url'         => self::SITE_URL . '/services#corporate-gifts',
            ],
            [
                'name'        => 'Printing Consumables Supply',
                'description' => 'Quality inks, toners, papers, vinyl rolls, and print substrates supplied to organizations, print bureaus, and individuals in Lagos and Nigeria.',
                'keywords'    => 'printing consumables Lagos, ink toner supplier Nigeria, print paper supply Lagos',
                'url'         => self::SITE_URL . '/services#consumables',
            ],
            [
                'name'        => 'Training & Consultancy',
                'description' => 'Practical training in graphic design, print production, brand management, and creative entrepreneurship — workshops and consultancy for individuals and organizations.',
                'keywords'    => 'graphic design training Lagos, print production training Nigeria, branding workshop Lagos',
                'url'         => self::SITE_URL . '/services#training',
            ],
        ];
    }

    public static function faqs(): array
    {
        return [
            [
                'question' => 'What printing services does Alet Inspirationz offer in Lagos?',
                'answer'   => 'Alet Inspirationz Prints Limited offers 11 core services: graphic design, corporate identity & brand consultancy, packaging design & production, digital/offset/large-format printing, book & magazine publishing, web graphics, signage & monogramming, school writing materials & yearbooks, corporate gifts & awards, printing consumables supply, and training & consultancy — all available in Lagos, Nigeria.',
            ],
            [
                'question' => 'How long does it take to complete a print job at Alet Inspirationz?',
                'answer'   => 'Standard turnaround at Alet Inspirationz is 24–72 hours for digital printing, 3–5 business days for large offset runs, and up to 7–10 days for complex packaging or publishing projects. Rush orders are available upon request.',
            ],
            [
                'question' => 'Does Alet Inspirationz offer graphic design services?',
                'answer'   => 'Yes. Alet Inspirationz provides full graphic design services including logo design, brand identity systems, brochure design, flyer design, packaging design, social media graphics, and signage artwork — either as standalone services or as part of a complete print-and-design package.',
            ],
            [
                'question' => 'How do I get a quote from Alet Inspirationz for my print job?',
                'answer'   => 'You can request a free, no-obligation quote by visiting aletinspirationz.com/quote and filling out the project details form. Our team responds within 24 business hours. You can also email info@aletinspirationz.com or call us directly.',
            ],
            [
                'question' => 'Does Alet Inspirationz print custom product packaging?',
                'answer'   => 'Yes. Alet Inspirationz specialises in custom packaging design and production — including product boxes, cartons, labels, sachets, food-grade packaging, and luxury gift sets. We handle both design and production in-house.',
            ],
            [
                'question' => 'Can Alet Inspirationz handle large-volume corporate print orders?',
                'answer'   => 'Yes. Alet Inspirationz Prints Limited is equipped for both small-run digital printing and large-volume offset printing, making it suitable for corporate orders, bulk marketing collateral, mass packaging production, and national distribution print jobs across Nigeria.',
            ],
            [
                'question' => 'Where is Alet Inspirationz Prints located?',
                'answer'   => 'Alet Inspirationz Prints Limited (RC: 1878085) is headquartered in Lagos, Nigeria, and serves clients across Lagos, Abuja, Port Harcourt, and other major cities. Delivery across Nigeria is available.',
            ],
            [
                'question' => 'Is Alet Inspirationz a registered company in Nigeria?',
                'answer'   => 'Yes. Alet Inspirationz Prints Limited is a duly registered Nigerian company with CAC registration number RC: 1878085. It operates under the Alet Inspirationz Group, which also includes AI Digital Agency (RC: 1911945) and Printbuka.com (RC: 1905426).',
            ],
            [
                'question' => 'Does Alet Inspirationz print school yearbooks?',
                'answer'   => 'Yes. Alet Inspirationz provides a dedicated school writing materials and yearbook service — including custom exercise books, diaries, graduation programmes, school calendars, and full yearbook design and printing for educational institutions across Nigeria.',
            ],
            [
                'question' => 'What payment methods does Alet Inspirationz accept?',
                'answer'   => 'Alet Inspirationz accepts bank transfers, cash payments, POS card payments, and online payments via Paystack and Flutterwave. A deposit (typically 50–70%) is required before production begins.',
            ],
            [
                'question' => 'What makes Alet Inspirationz different from other printing companies in Lagos?',
                'answer'   => 'Alet Inspirationz stands out through its combination of in-house design and production, a 5-point commitment to integrity, excellence, professionalism, innovativeness, and client-centredness, multi-company group structure covering print, digital agency, and online commerce, CAC-registered status, and a track record of serving corporate, educational, and event clients across Nigeria.',
            ],
            [
                'question' => 'Does Alet Inspirationz offer branding consultancy?',
                'answer'   => 'Yes. Through its Corporate Identity & Brand Consultancy service, Alet Inspirationz helps businesses build cohesive brand identities — including logo development, colour strategy, brand guidelines, brand voice definition, and ongoing brand management support.',
            ],
        ];
    }

    public static function breadcrumbs(string $routeName, ?string $dynamicLabel = null): array
    {
        $crumbs = [
            ['name' => 'Home', 'url' => self::SITE_URL . '/'],
        ];

        $map = [
            'about'    => ['About Us',      self::SITE_URL . '/about'],
            'services' => ['Our Services',  self::SITE_URL . '/services'],
            'contact'  => ['Contact Us',    self::SITE_URL . '/contact'],
            'quote'    => ['Get a Quote',   self::SITE_URL . '/quote'],
            'blog'     => ['Blog',          self::SITE_URL . '/blog'],
            'faq'      => ['FAQ',           self::SITE_URL . '/faq'],
        ];

        if (isset($map[$routeName])) {
            $crumbs[] = ['name' => $map[$routeName][0], 'url' => $map[$routeName][1]];
        }

        if ($dynamicLabel) {
            $crumbs[] = ['name' => $dynamicLabel, 'url' => self::SITE_URL . request()->getPathInfo()];
        }

        return $crumbs;
    }
}
