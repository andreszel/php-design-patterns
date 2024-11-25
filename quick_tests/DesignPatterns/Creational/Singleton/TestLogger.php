<?php

namespace App\QuickTests\DesignPatterns\Creational\Singleton;

use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestLogger
{
    public static function run(): void
    {
        Logger::log("- Sprawdzimy, czy klasa dziala jak zaklada Singleton");
        Logger::log("- Pobiermay-tworzymy dwa obiekty-dwie instancje i sprawdzamy, czy te obiekty są tym samym, czy może innym obiektem");

        $logger1 = Logger::getInstance();
        $logger2 = Logger::getInstance();

        if($logger1 === $logger2) {
            Logger::log("- Tak!. Klasa Logger ma jedną instancję!");
        } else {
            Logger::log("- Nie!. Klasa Logger ma różne instancje!");
        }

        Logger::log("- Dzięki tej klasie i takiemu wzorcowi, możemy od tej pory korzystać z klasy Logger, jeżeli cos chcemy wypisac, nie musimy używać echo. Drugą kwestią jest to, że ile razy byśmy nie korzystali z tej klasy to w tym skrypcie - żądaniu na stronie www, który wykonujemy będzie to jeden obiekt, nie zostanie stworzona cała armia obiektów. Gdyby nie było zastosowanego wzorca Singleton, to każde wypisanie tworzyłoby nowy obiekt.");
        Logger::log("");
        Logger::log("UWAGA!\nPrzykład został nieco zmodyfikowany, ponieważ chciałbym korzystać z tej klasy, a nie potrzebuję w każdej linii daty, dodałem drugą zmienną widthDate. Normalnie przy logowaniu założeniem raczej jest, żebyśmy wiedzieli kiedy coś co jest zapisane miało miejsce., w końcu to jest logger.");

        Logger::log("\n");
        Logger::log(ConstHelper::SEPARATOR);
        Logger::log("\n");
    }
}