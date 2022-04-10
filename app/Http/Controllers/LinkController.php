<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkCreateRequest;
use App\Http\Requests\LinkRedirectRequest;
use App\Services\LinkService;
use Illuminate\Http\RedirectResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class LinkController extends Controller
{
    /**
     * @throws UnknownProperties
     */
    public function show(LinkRedirectRequest $request, LinkService $service): RedirectResponse
    {
        $dto = $request->getDTO();
        $url = $service->getUrlByCode($dto->code);
        return redirect()->away($url);
    }

    /**
     * @throws UnknownProperties
     */
    public function store(LinkCreateRequest $request, LinkService $service): string
    {
        $dto = $request->getDTO();
        return url()->full() . '/' . $service->storeLink($dto->url);
    }
}
