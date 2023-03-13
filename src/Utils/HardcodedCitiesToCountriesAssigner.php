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
            "Catania" => "Italy",
            "Charleroi" => "Belgium",
            "Chemnitz" => "Germany",
            "Erfurt" => "Germany",
            "Espinho" => "Portugal",
            "Évora" => "Portugal",
            "Faro" => "Portugal",
            "Ferrara" => "Italy",
            "Firenze" => "Italy",
            "Givatayim" => "Israel",
            "Heilbronn" => "Germany",
            "Kassel" => "Germany",
            "Liege" => "Belgium",
            "Maia" => "Portugal",
            "Monza" => "Italy",
            "Neckarsulm" => "Germany",
            "Neu-Ulm" => "Germany",
            "Orange" => "France",
            "Padua" => "Italy",
            "Palermo" => "Italy",
            "Pesaro" => "Italy",
            "Pforzheim" => "Germany",
            "Porto" => "Portugal",
            "Ramat Gan" => "Israel",
            "Redditch" => "United Kingdom",
            "Regensburg" => "Germany",
            "Rimini" => "Italy",
            "Rostock" => "Germany",
            "Tarragona" => "Spain",
            "Tel Aviv" => "Israel",
            "Tomar" => "Portugal",
            "Troisdorf" => "Germany",
            "Ulm" => "Germany",
            "Varese" => "Italy",
            "Verona" => "Italy",
            "Viareggio" => "Italy",
            "Vienna" => "Austria",
            "Vila Franca de Xira" => "Portugal",
            "Vila Nova de Gaia" => "Portugal",
            "Villemomble" => "France",
            "Viry-Chatillon" => "France",
            "Würzburg" => "Germany",
            "Zaragoza" => "Spain",
            default => null,
        };
    }
}
