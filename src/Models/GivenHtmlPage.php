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
        public ?float $nte = null,
        public ?string $storeId = null,
        public ?string $street = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $zipCode = null,
        public ?string $phoneNumber = null //TODO float? XD
    )
    {
    }

    public function toArray(): array
    {
        return (array) $this;
//        return [
//            'trackingNumber' => $this->trackingNumber,
//            'poNumber' => $this->poNumber,
//            'scheduleDate' => $this->scheduleDate,
//            'customer' => $this->customer,
//            'trade' => $this->trade,
//            'nte' => $this->nte,
//            'storeId' => $this->storeId,
//            'street' => $this->street,
//            'city' => $this->city,
//            'state' => $this->state,
//            'zipCode' => $this->state,
//            'phoneNumber' => $this->state,
//        ];
    }
}