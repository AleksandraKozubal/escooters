<?php

declare(strict_types=1);

namespace EScooters\Importers;

use EScooters\Importers\DataSources\JsonDataSource;
use Symfony\Component\DomCrawler\Crawler;

class TierDataImporter extends DataImporter implements JsonDataSource
{
    protected array $entries;

    public function getBackground(): string
    {
        return "#0E1A50";
    }

    public function extract(): static
    {
        $html = file_get_contents("https://www.tier.app/en/where-to-find-us");
        $crawler = new Crawler($html);
        $this->sections = $crawler->filter("main div.relative section.Accordion__AccordionWrapper-sc-ehu24-0.fvluSp>li > div.items-center");

        return $this;
    }

    public function transform(): static
    {
//

        /** @var DOMElement $section */
        foreach ($this->sections as $section) {
            foreach ($section->childNodes as $node) {
                if ($node->nodeName === "h5") {
                    $countryName = $node->nodeValue;
                    $country = $this->countries->retrieve($countryName);
                    continue 2;
                }
                foreach ($node->childNodes as $childNode) {
                    if (trim($childNode->nodeValue) !== ""){
                        $city = $this->cities->retrieve(trim($childNode->nodeValue), $country);
                        $this->provider->addCity($city);
                    }
                }
            }
        }
        return $this;
    }
}
