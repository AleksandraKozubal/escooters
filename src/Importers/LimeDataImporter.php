<?php

declare(strict_types=1);

namespace EScooters\Importers;

use DOMElement;
use EScooters\Importers\DataSources\HtmlDataSource;
use EScooters\Models\Repositories\Cities;
use EScooters\Models\Repositories\Countries;
use Symfony\Component\DomCrawler\Crawler;

class LimeDataImporter extends DataImporter implements HtmlDataSource
{
    protected Crawler $sections;
    private $mapbox;

    public function __construct(Cities $cities, Countries $countries, $mapboxGeocodingService)
    {
        parent::__construct($cities, $countries);
        $this->mapbox = $mapboxGeocodingService;
    }

    public function getBackground(): string
    {
        return "#00DE00";
    }

    public function extract(): static
    {
        $html = file_get_contents("https://www.li.me/locations");

        $crawler = new Crawler($html);
        $this->sections = $crawler->filter("div#content-wrapper main div.pb-4.text-white div.overflow-hidden > div > div");

        return $this;
    }

    public function transform(): static
    {
        /** @var DOMElement $section */
        foreach ($this->sections as $section) {
            $cityName = trim($section->nodeValue);
            $countryName = $this->mapbox->getCountryFromAPI($cityName);
            $countryName = substr($countryName, strrpos($countryName, ', ') + 2);

            $country = $this->countries->retrieve($countryName);
            $city = $this->cities->retrieve($cityName, $country);
            $this->provider->addCity($city);
        }
        return $this;
    }
}
