<?php

namespace App\Http\Controllers;

use App\Models\RedirectUrl;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RedirectUrlController extends Controller
{
    private const DEFAULT_REDIRECT_HTTP_CODE = 302;
    public function index(): View
    {
        // show all possible redirect url
        $redirectUrls = RedirectUrl::select(['origin', 'destination', 'http_code'])
            ->get();

        return view('redirect', ['redirectUrls' => $redirectUrls]);
    }

    public function redirect(string $slug): RedirectResponse
    {
        // do the redirect here
        $redirectUrl = RedirectUrl::select(['destination', 'http_code'])
            ->where(['origin' => $slug])
            ->first();

        if (empty($redirectUrl) || empty($redirectUrl->destination)) {
            abort(404);
        }

        return redirect()
            ->route('new_url', ['slug' => $redirectUrl->destination])
            ->setStatusCode($redirectUrl->http_code ?? self::DEFAULT_REDIRECT_HTTP_CODE);
    }
}
