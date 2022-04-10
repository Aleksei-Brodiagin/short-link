<?php

namespace App\Services;

use App\Models\Link;
use Hashids\Hashids;

class LinkService
{
    public function storeLink(string $url): string
    {
        $code = $this->getLinksCode($url);

        if ($code) {
            return $code;
        }

        $code = $this->createNewCode();

        Link::query()
            ->create([
                'url' => $url,
                'code' => $code,
            ]);

        return $code;
    }

    public function getUrlByCode(string $code): ?string
    {
        return Link::query()
            ->where('code', $code)
            ->firstOrFail()
            ->value('url');
    }

    private function getLinksCode(string $url): ?string
    {
        $link = Link::query()
            ->where('url', $url)
            ->first();

        return $link->code ?? null;
    }

    private function createNewCode(): string
    {
        $codeLength = config('constants.link_code_length', 6);

        $hashids = new Hashids('', $codeLength);
        $maxLinkId = Link::query()->max('id') ?? 0;
        return $hashids->encode($maxLinkId + 1);
    }
}
