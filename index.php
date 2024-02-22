<?php

// informations
// https://github.com/rpodwika/designpatterns
// https://github.com/zawarstwaabstrakcji/design-patterns

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/vendor/autoload.php';

use App\DesignPatterns\Behavioral\Strategy\Example1\BlackFriday;
use App\DesignPatterns\Behavioral\Strategy\Example1\CheckoutFactory;
use App\DesignPatterns\Behavioral\Strategy\Example1\Collection;
use App\DesignPatterns\Behavioral\Strategy\Example1\DiscountCoupon;
use App\DesignPatterns\Behavioral\Strategy\Example1\NoDiscount;
use App\DesignPatterns\Behavioral\Strategy\Example1\ProgressDiscount;
use App\DesignPatterns\Behavioral\Strategy\Example1\TestCollection;
use App\DesignPatterns\Creational\AbstractFactory\Page;
use App\DesignPatterns\Creational\AbstractFactory\PHPTemplateFactory;
use App\DesignPatterns\Creational\Singleton\Config;
use App\DesignPatterns\Creational\Singleton\ConnectDB;
use App\DesignPatterns\Creational\Singleton\Connection;
use App\DesignPatterns\Creational\Singleton\DB;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\DesignPatterns\Structural\Facade\Example1\Api;
use App\Example\HelloWorld;
use App\Helper\ConstHelper;

const ROOT_DIRECTORY = __DIR__;

$entry = new HelloWorld();

// ------------------------------------------------------------------

echo ConstHelper::NEW_LINE;

echo ConstHelper::START_ROW_STRING . 'TEST EXAMPLE CLASS';
echo ConstHelper::NEW_LINE;

echo ($entry->printHelloWorld());
echo ConstHelper::SEPARATOR;
echo ConstHelper::NEW_LINE;

// ------------------------------------------------------------------

// SINGLETON - od tej pory nie korzystam już z echo tylko z naszego przykładu
Logger::log("Wzorzec SINGLETON", true);
Logger::log("");
Logger::log("-> PRZYKLAD NR 1\nKlasa Logger, która wypisuje wiadomość na standardowe wyjście, tzn. do konsoli.");
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

Logger::log("\n-> PRZYKLAD NR 2\nKlasa Config");
Logger::log("Klasa przetrzymującą konfigurację możemy stworzyć o różnym stopniu zaawansowania. Jeżeli mamy mały projekt to tak klasa nie będzie skomplikowana, ale jeżeli mamy duży projekt to może się okazać, że klasa będzie bardziej skomplikowana. Poziom skomplikowana polega na tym, że mamy klasę która może mieć zdefiniowane zmienne przechowujące konfigurację, możemy mieć klasę, która te zmienne pobiera z plików po kluczu, np. database.host, możemy też do tego dopisać metodę, która będzie nam ustawiała nowe wartości i zapisywała do pliku, klucze mogą być z jednym poziomem zagnieżdżenia, mogą być z wieloma poziomami, konfiguracja może być przechowywana w plikach yaml itd. Może być również sytuacja, gdzie konfiguracja jest zczytywana z wielu plików. Ja chciałem stworzyć klasę bardziej skomplikowaną. Chodzi głównie o to, że taka klasa jest jedynym punktem dostępowym do konfiguracji aplikacji. Konfiguracja może być czytana z wielu plików, ale punkt dostępowy jest jeden. :)");
Logger::log("");

$config1 = Config::getInstance();
$config1->setValue('host', 'localhost');
$config1->setValue('port', '3306');
$host = $config1->getValue('host');
$port = $config1->getValue('port');

$config2 = Config::getInstance();
$config2->setValue('user', 'user');
$config2->setValue('password', 'secret');

if($host == $config2->getValue('host') && $port == $config2->getValue('port')) {
    Logger::log("- Wartości host i port są jednakowe w obydwu instancjach klasy Config!");
}

if ($config1 === $config2) {
    Logger::log("- Tak!. Klasa Config ma jedną instancję!");
} else {
    Logger::log("- Nie!. Klasa Config ma różne instancje!");
}

Logger::log("- Koniec testu klasy Config!");

Logger::log("\n\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n-> PRZYKLAD NR 3\n\nKlasa ConnectDB");
Logger::log(ConstHelper::START_ROW_STRING . 'TEST DESIGN PATTERNS');
Logger::log(ConstHelper::START_ROW_STRING . 'SINGLETON - Database connection');
Logger::log("\n");

$instanceA = ConnectDB::getInstance();
$connectionA = $instanceA->getConnection();
$instanceB = ConnectDB::getInstance();
$connectionB = $instanceB->getConnection();

var_dump($connectionA);
var_dump($connectionB);

Logger::log(ConstHelper::SEPARATOR);
Logger::log("");

Logger::log("-> PRZYKLAD NR 4\n\nFabryka abstrakcyjna - template [twig, php]");
Logger::log("");

$page = new Page('Simple page title', 'This is the body page');
echo $page->render(new PHPTemplateFactory());

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

// ------------------------------------------------------------------
// STRUCTURAL DESIGN PATTERNS
// ------------------------------------------------------------------
Logger::log("-> PRZYKLAD NR 5 - STRUCTURAL\n\nFasada - API");
Logger::log("");

$apiFacade = new Api();
$apiFacade->register();
$apiFacade->login();
$apiFacade->getProducts();
$apiFacade->getProduct(154);
$apiFacade->getBuyProducts();

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

// ------------------------------------------------------------------
// BEHAVIORAL DESIGN PATTERNS
// ------------------------------------------------------------------
Logger::log("-> PRZYKLAD NR 6 - BEHAVIORAL\n\nCalculate TOTAL PRICE in promotion(selected strategy)");
Logger::log("");

$totalPriceCoupon = CheckoutFactory::create(250, 'coupon')->getTotalPrice();
Logger::log("Total price Coupon is: " . number_format($totalPriceCoupon, 2, '.', '') . " PLN");
$totalPriceBlackFriday = CheckoutFactory::create(250, 'black_friday')->getTotalPrice();
Logger::log("Total price Black Friday is: " . number_format($totalPriceBlackFriday, 2, '.', '') . " PLN");
$totalPriceProgress = CheckoutFactory::create(250, 'progress')->getTotalPrice();
Logger::log("Total price Progress is: " . number_format($totalPriceProgress, 2, '.', '') . " PLN");
Logger::log("\n");