<?php

declare(strict_types=1);

namespace EScooters\Utils;

class HardcodedCitiesToCountriesAssigner
{
    public static function assign(string $name): ?string
    {
        return match ($name) {
            "Aalst" => "Belgium",
            "Antwerp" => "Belgium",
            "Aprilia" => "Italy",
            "Bretigny-sur-Orge" => "France",
            "Canterbury" => "United Kingdom",
            "Cascais" => "Portugal",
            "Charleroi" => "Belgium",
            "Erfurt", "Troisdorf" => "Germany",
            "Espinho" => "Portugal",
            "Évora" => "Portugal",
            "Faro" => "Portugal",
            "Ferrara" => "Italy",
            "Firenze" => "Italy",
            "Liege" => "Belgium",
            "Maia" => "Portugal",
            "Neckarsulm" => "Germany",
            "Neu-Ulm" => "Germany",
            "Orange" => "France",
            "Pesaro" => "Italy",
            "Pforzheim" => "Germany",
            "Porto" => "Portugal",
            "Redditch" => "United Kingdom",
            "Regensburg" => "Germany",
            "Rimini" => "Italy",
            "Tarragona" => "Spain",
            "Tel Aviv" => "Israel",
            "Tomar" => "Portugal",
            "Ulm" => "Germany",
            "Verona" => "Italy",
            "Viareggio" => "Italy",
            "Vila Franca de Xira" => "Portugal",
            "Vila Nova de Gaia" => "Portugal",
            "Villemomble" => "France",
            "Viry-Chatillon" => "France",
            "Würzburg" => "Germany",
            "Zaragoza" => "Spain",
            "Givatayim" => "Israel",
            "Ramat Gan" => "Israel",
            "Chemnitz" => "Germany",
            "Heilbronn" => "Germany",
            "Kassel" => "Germany",
            "Palermo" => "Italy",
            "Rostock" => "Germany",
            "Varese" => "Italy",
            "Catania" => "Italy",
            "Monza" => "Italy",
            "Padua" => "Italy",
            default => null,
        };
    }
}
