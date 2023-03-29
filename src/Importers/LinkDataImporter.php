<?php

declare(strict_types=1);

namespace EScooters\Importers;

use DOMElement;
use EScooters\Exceptions\CityNotAssignedToAnyCountryException;
use EScooters\Importers\DataSources\HtmlDataSource;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class LinkDataImporter extends DataImporter implements HtmlDataSource
{
    protected Crawler $sections;

    public function getBackground(): string
    {
        return "#DEF700";
    }

    public function extract(): static
    {
        $client = new Client();
        $html = $client->get("https://superpedestrian.com/locations")->getBody()->getContents();

        $crawler = new Crawler($html);
        $this->sections = $crawler->filter("body > div >div > div.Content-outer main section div div div div.row.sqs-row div.col div div p");

        return $this;
    }

    /**
     * @throws CityNotAssignedToAnyCountryException
     */
    public function transform(): static
    {
        $country = null;
        $countryName = null;
        $states = ["California", "Connecticut", "Illinois", "Kansas", "Maryland", "Michigan", "New Jersey", "Ohio", "Oregon", "Tennessee", "Texas", "Virginia", "Washington"];
        /** @var DOMElement $section */
        foreach ($this->sections as $section) {
            if ($section->nodeValue === "Ride with us in cities around the world!") {
                continue;
            }
            foreach ($section->childNodes as $node) {
                if ($node->nodeName === "strong") {
                    if (in_array($node->nodeValue, $states, true)) {
                        $countryName = "United States";
                    } else {
                        $countryName = trim($node->nodeValue);
                    }
                    $country = $this->countries->retrieve($countryName);
                } else {
                    if (str_contains(trim($section->nodeValue), "coming soon"))
                        continue;
                    $city = $this->cities->retrieve(trim($section->nodeValue), $country);
                    $this->provider->addCity($city);
                }
            }
        }

        return $this;
    }
}
