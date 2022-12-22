<?php

namespace Dawid\HtmlParser\HtmlParser;

use Dawid\HtmlParser\Models\GivenHtmlPage;
use PHPHtmlParser\Dom;

class GivenHtmlPageParser
{
    public const TRACKING_NUMBER_HTML_ID = 'wo_number';
    public const PO_NUMBER = 'po_number';
    public const SCHEDULE_DATE_HTML_ID = 'scheduled_date';
    public const CUSTOMER_HTML_ID = 'location_customer';
    public const TRADE_HTML_ID = 'trade';
    public const NTE_HTML_ID = 'nte';
    public const STORE_ID_HTML_ID = 'location_name';
    public const FULL_ADDRESS_HTML_ID = 'location_address';
    public const PHONE_NUMBER_HTML_ID = 'location_phone';
    private const FORMAT_DATE = 'Y-m-d H:i';

    public function __construct(private readonly GivenHtmlPage $givenHtmlPageModel, private readonly Dom $dom)
    {
    }

    public function getTrackingNumberFromHtml(): void
    {
        $this->givenHtmlPageModel->trackingNumber = $this->dom->getElementById(self::TRACKING_NUMBER_HTML_ID)->text;
    }

    public function getPoNumberFromHtml(): void
    {
        $this->givenHtmlPageModel->poNumber = $this->dom->getElementById(self::PO_NUMBER)->text;
    }

    public function getScheduleDateFromHtml(): void
    {
        $allElements = $this->dom->getElementById(self::SCHEDULE_DATE_HTML_ID);
        $dateAsString = $this->getDataFromManyElements($allElements);
        $this->givenHtmlPageModel->scheduleDate = date(self::FORMAT_DATE, strtotime($dateAsString));
    }

    public function getCustomerFromHtml(): void
    {
        $this->givenHtmlPageModel->customer = $this->dom->getElementById(self::CUSTOMER_HTML_ID)->text;
    }

    public function getTradeFromHtml(): void
    {
        $this->givenHtmlPageModel->trade = $this->dom->getElementById(self::TRADE_HTML_ID)->text;
    }

    public function getNteFromHtml(): void
    {
        $nteAsString = $this->dom->getElementById(self::NTE_HTML_ID)->text;
        $formattedNte = preg_replace("/([^0-9\\.])/i", "", $nteAsString);
        $this->givenHtmlPageModel->nte = floatval($formattedNte);
    }

    public function getStoreIdFromHtml(): void
    {
        $this->givenHtmlPageModel->storeId = $this->dom->getElementById(self::STORE_ID_HTML_ID)->text;
    }

    public function getFullAddressFromHtml(): void
    {
        $allElements = $this->dom->getElementById(self::FULL_ADDRESS_HTML_ID);
        $fullAddress = explode(' ', trim($this->getDataFromManyElements($allElements)));
        $this->givenHtmlPageModel->zipCode = array_pop($fullAddress);
        $this->givenHtmlPageModel->state = array_pop($fullAddress);
        $this->givenHtmlPageModel->city = array_pop($fullAddress);
        $this->givenHtmlPageModel->street = implode(' ', $fullAddress);
    }

    public function getPhoneNumberFromHtml(): void
    {
        $this->givenHtmlPageModel->phoneNumber = $this->dom->getElementById(self::PHONE_NUMBER_HTML_ID)->text;
    }

    public function getAllData(): array
    {
        $this->getTrackingNumberFromHtml();
        $this->getPoNumberFromHtml();
        $this->getScheduleDateFromHtml();
        $this->getCustomerFromHtml();
        $this->getTradeFromHtml();
        $this->getNteFromHtml();
        $this->getStoreIdFromHtml();
        $this->getFullAddressFromHtml();
        $this->getPhoneNumberFromHtml();

        return $this->givenHtmlPageModel->toArray();
    }

    private function getDataFromManyElements($elements)
    {
        $dataAsString = '';
        foreach ($elements as $element) {
            $dataAsString .= $element->text;
        }

        return $dataAsString;
    }
}
