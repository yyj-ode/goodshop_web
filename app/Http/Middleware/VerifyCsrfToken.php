<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'collect/content',
        'index/checklogin',
        'center/uploads/headscreenshot',
        'center/uploads/articleimg',
        'center/uploads/screenshot',
        'center/uploads/image',

        'admin/uploads/articleimg',
        'admin/uploads/screenshot',
        'admin/uploads/image',
        'order/notify',
    ];
}
