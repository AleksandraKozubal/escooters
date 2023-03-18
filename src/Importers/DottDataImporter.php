<?php

declare(strict_types=1);

namespace EScooters\Importers;

use EScooters\Importers\DataSources\HtmlDataSource;
use EScooters\Importers\DataSources\JsonDataSource;
use EScooters\Utils\HardcodedCitiesToCountriesAssigner;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class DottDataImporter extends DataImporter implements HtmlDataSource, JsonDataSource
{
    protected Crawler $sections;

    public function getBackground(): string
    {
        return "#F5C605";
    }

    public function extract(): static
    {
        $html = file_get_contents("https://ridedott.com/ride-with-us/paris/");
        $crawler = new Crawler($html);
        $this->sections = $crawler->filter("div .group.inline-block div.hidden ul.inline-flex li.mb-4");

        return $this;
    }

    public function transform(): static
    {
        /** @var DOMElement $section */
        foreach ($this->sections as $section) {
            $country = null;

            foreach ($section->childNodes as $node) {
                if ($node->nodeName === "span") {
                    $countryName = ($node->nodeValue == "UK") ? "United Kingdom" : $node->nodeValue;
                    $country = $this->countries->retrieve($countryName);
                }

                if ($node->nodeName === "ul") {
                    foreach ($node->childNodes as $city) {
                        if ($city->nodeName === "li") {
                            $city = $this->cities->retrieve(trim($city->nodeValue), $country);
                            $this->provider->addCity($city);
                        }
                    }
                }
            }
        }

        return $this;
    }
}
