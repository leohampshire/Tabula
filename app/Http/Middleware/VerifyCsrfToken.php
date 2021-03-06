<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'admin/cupom/pesquisar',
        'user/cupom/pesquisar',
        'curso/checked',
        'curso/item',
        'transaction/callback',
        'social/*'
    ];
}
