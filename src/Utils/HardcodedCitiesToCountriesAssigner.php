<?php

declare(strict_types=1);

namespace EScooters\Utils;

class HardcodedCitiesToCountriesAssigner
{
    public static function assign(string $name): ?string
    {
        return match ($name) {
            "Aalst" => "Belgium",
            "Aprilia" => "Italy",
            "Bretigny-sur-Orge" => "France",
            "Canterbury" => "United Kingdom",
            "Charleroi" => "Belgium",
            "Erfurt" => "Germany",
            "Ferrara" => "Italy",
            "Firenze" => "Italy",
            "Liege" => "Belgium",
            "Neckarsulm" => "Germany",
            "Neu-Ulm" => "Germany",
            "Orange" => "France",
            "Pesaro" => "Italy",
            "Pforzheim" => "Germany",
            "Porto" => "Portugal",
            "Redditch" => "United Kingdom",
            "Regensburg" => "Germany",
            "Tarragona" => "Spain",
            "Ulm" => "Germany",
            "Viareggio" => "Italy",
            "Villemomble" => "France",
            "Viry-Chatillon" => "France",
            "Würzburg" => "Germany",
            "Zaragoza" => "Spain",
            "Givatayim" => "Israel",
            "Ramat Gan" => "Israel",
            default => null,
        };
    }
}
