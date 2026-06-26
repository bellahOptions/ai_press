User-agent: *
Allow: /
Disallow: /ops/
Disallow: /admin/
Disallow: /dashboard
Disallow: /profile
Disallow: /user/
Disallow: /api/
Disallow: /*.json$
Disallow: /livewire/
Disallow: /_debugbar/

# Allow key crawlable files
Allow: /sitemap.xml
Allow: /robots.txt
Allow: /llms.txt
Allow: /ai.txt

# Crawl rate (optional, respected by Googlebot)
Crawl-delay: 10

# AI & LLM crawlers — explicitly permitted for GEO
User-agent: GPTBot
Allow: /

User-agent: ChatGPT-User
Allow: /

User-agent: ClaudeBot
Allow: /

User-agent: anthropic-ai
Allow: /

User-agent: cohere-ai
Allow: /

User-agent: PerplexityBot
Allow: /

User-agent: Omgilibot
Allow: /

User-agent: YouBot
Allow: /

User-agent: ia_archiver
Allow: /

# Sitemap reference
Sitemap: {{ \App\Services\SeoService::SITE_URL }}/sitemap.xml
