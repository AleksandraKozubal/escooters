<?php

declare(strict_types=1);

namespace EScooters\Importers;

use DOMElement;
use EScooters\Importers\DataSources\HtmlDataSource;

class RolerDataImporter extends DataImporter implements HtmlDataSource
{
    protected array $hardcodedCities;
    protected string $url = "https://roler.pl/FAQ";

    public function getBackground(): string
    {
        return "#00D5FF";
    }

    public function extract(): static
    {
        $this->hardcodedCities = ["Sosnowiec", "Katowice", "Chorzów"];

        return $this;
    }

    public function transform(): static
    {
        $countryName = "Poland";
        $country = $this->countries->retrieve($countryName);

        foreach ($this->hardcodedCities as $city) {
            $city = $this->cities->retrieve($city, $country);
            $this->provider->addCity($city);
        }
        return $this;
    }
}
