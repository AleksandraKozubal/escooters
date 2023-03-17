<?php

declare(strict_types=1);

namespace EScooters\Importers;

use DOMElement;
use EScooters\Importers\DataSources\HtmlDataSource;
use Symfony\Component\DomCrawler\Crawler;

class BITMobilityDataImporter extends DataImporter implements HtmlDataSource
{
    protected Crawler $sections;

    public function getBackground(): string
    {
        return "#FFFEFC";
    }

    public function extract(): static
    {
        $html = file_get_contents("https://bitmobility.it/dove-siamo/");
        $crawler = new Crawler($html);
        $this->sections = $crawler->filter("div.wpb_column .vc_column_container.vc_col-sm-6 > div > div > div.wpb_text_column > div > p > a");

        return $this;
    }

    public function transform(): static
    {
        $countryName = "Italy";
        $country = $this->countries->retrieve($countryName);

        /** @var DOMElement $section */
        foreach ($this->sections as $section) {
            $city = $this->cities->retrieve(ucwords(strtolower($section->nodeValue)), $country);
            $this->provider->addCity($city);
        }
        return $this;
    }
}
