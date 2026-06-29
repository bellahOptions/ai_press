<?php

test('public landing page renders with vite assets from a clean document start', function () {
    $response = $this->get('/');

    $response->assertOk();
    $content = $response->getContent();

    $this->assertStringStartsWith('<!DOCTYPE html>', $content);
    $this->assertTrue(
        str_contains($content, 'resources/css/app.css') || str_contains($content, 'build/assets/app-'),
        'The landing page did not include Vite CSS assets.'
    );
});

test('legacy home view yields its hero content through the shared theme layout', function () {
    $html = view('home')->render();

    $this->assertStringContainsString('Redefining Prints', $html);
    $this->assertStringStartsWith('<!DOCTYPE html>', $html);
});

test('frontend layouts do not start with a utf8 bom', function () {
    $layouts = [
        resource_path('views/layouts/theme.blade.php'),
        resource_path('views/layouts/app.blade.php'),
        resource_path('views/layouts/guest.blade.php'),
        resource_path('views/layouts/auth/theme.blade.php'),
        resource_path('views/layouts/admin/theme.blade.php'),
    ];

    foreach ($layouts as $layout) {
        $this->assertStringStartsWith('<!DOCTYPE html>', file_get_contents($layout));
    }
});
