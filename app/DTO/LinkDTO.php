<?php

use Spatie\DataTransferObject\DataTransferObject;

class LinkDTO extends DataTransferObject
{
    /**
     * @var string|null
     */
    public ?string $url;

    /**
     * @var string|null
     */
    public ?string $code;
}
