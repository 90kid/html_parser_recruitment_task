<?php

namespace Dawid\HtmlParser\Models;

class GivenHtmlPage
{
    public function __construct(
        public ?string $trackingNumber = null,
        public ?string $poNumber = null,
        public ?string $scheduleDate = null,
        public ?string $customer = null,
        public ?string $trade = null,
        public ?float  $nte = null,
        public ?string $storeId = null,
        public ?string $street = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $zipCode = null,
        public ?string $phoneNumber = null
    )
    {
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}
