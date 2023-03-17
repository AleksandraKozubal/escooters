<?php

declare(strict_types=1);

namespace EScooters\Importers;

use DOMElement;
use EScooters\Importers\DataSources\HtmlDataSource;
use Symfony\Component\DomCrawler\Crawler;

class HulajDataImporter extends DataImporter implements HtmlDataSource
{
    protected Crawler $sections;

    public function getBackground(): string
    {
        return "#C3C3C3";
    }

    public function extract(): static
    {
        $html = file_get_contents("https://hulaj.eu/miasta/");
        $crawler = new Crawler($html);
        $this->sections = $crawler->filter("div.cities_group div div div h2");

        return $this;
    }

    public function transform(): static
    {
        $countryName = "Poland";
        $country = $this->countries->retrieve($countryName);

        /** @var DOMElement $section */
        foreach ($this->sections as $section) {
            $city = $this->cities->retrieve(str_replace(" – przerwa zimowa","",$section->nodeValue), $country);
            $this->provider->addCity($city);
        }
        return $this;
    }
}
