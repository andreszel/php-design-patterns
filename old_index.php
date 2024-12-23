<?php

// informations
// https://github.com/rpodwika/designpatterns
// https://github.com/zawarstwaabstrakcji/design-patterns

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/vendor/autoload.php';

use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\Checkout;
use App\DesignPatterns\Behavioral\Strategy\CalculateDiscount\CheckoutFactory;
use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\Payment;
use App\DesignPatterns\Behavioral\Strategy\PaymentMethod\PaymentFactory;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCM;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\FCMNotification;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\Mail;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\MailNotification;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMS;
use App\DesignPatterns\Behavioral\Strategy\SendNotification\SMSNotification;
use App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial\Facebook;
use App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial\Twitter;
use App\DesignPatterns\Creational\AbstractFactory\CMS\CMS;
use App\DesignPatterns\Creational\AbstractFactory\CMS\SimpleArticleFactory;
use App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator\Page;
use App\DesignPatterns\Creational\AbstractFactory\TemplateGenerator\PHPTemplateFactory;
use App\DesignPatterns\Creational\Builder\SQLQuery\MysqlQueryBuilder;
use App\DesignPatterns\Creational\Builder\SQLQuery\PostgresQueryBuilder;
use App\DesignPatterns\Creational\Builder\SQLQuery\SqlQueryDirector;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastFactory;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastFit;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastMeat;
use App\DesignPatterns\Creational\Factory\Breakfast\BreakfastMilk;
use App\DesignPatterns\Creational\Factory\Toy\ToyFactory;
use App\DesignPatterns\Creational\Factory\Toy\ToyType;
use App\DesignPatterns\Creational\FactoryMethod\Plan\PlanFactory;
use App\DesignPatterns\Creational\Singleton\Config;
use App\DesignPatterns\Creational\Singleton\ConnectDB;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\DesignPatterns\Structural\Adapter\Logger\ExternalLoggerFileWriter;
use App\DesignPatterns\Structural\Adapter\Logger\ExternalLoggerFileWriterAdapter;
use App\DesignPatterns\Structural\Adapter\Logger\RandomProcessor;
use App\DesignPatterns\Structural\Facade\Api\ApiFacade;
use App\DesignPatterns\Structural\Facade\Api\Cart;
use App\DesignPatterns\Structural\Facade\Api\CartItem;
use App\DesignPatterns\Structural\Facade\Api\Product;
use App\DesignPatterns\Structural\Facade\Api\ProductStorage;
use App\DesignPatterns\Structural\Facade\Api\User;
use App\Example\HelloWorld;
use App\Helper\ConstHelper;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\CappriziozaBuilder;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\Enum\PizzaSize;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\PepperoniBuilder;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\Pizza;
use DesignPatterns\Tutorial\Creational\Builder\Pizza\PizzaDirector;

const ROOT_DIRECTORY = __DIR__;

$counterExample = 1;

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
Logger::log("-> PRZYKLAD NR " . $counterExample++ . "\nKlasa Logger, która wypisuje wiadomość na standardowe wyjście, tzn. do konsoli.");
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

Logger::log("\n-> PRZYKLAD NR " . $counterExample++ . "\nKlasa Config");
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
Logger::log("\n-> PRZYKLAD NR " . $counterExample++ . "\n\nKlasa ConnectDB");
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

Logger::log("-> PRZYKLAD NR " . $counterExample++ . "\n\nFabryka abstrakcyjna - template [twig, php]");
Logger::log("");

$page = new Page('Simple page title', 'This is the body page');
echo $page->render(new PHPTemplateFactory());

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

Logger::log("-> PRZYKLAD NR " . $counterExample++ . " - Fabryka abstrakcyjna - CMS");
Logger::log("");

$articleFactory = new SimpleArticleFactory();
$cms = new CMS($articleFactory);

$textArticle = $cms->renderArticle('text', 'Text article title', 'This is a text article.');
$imageArticle = $cms->renderArticle('image', 'Image article title', '/path/to/image.jpg');
$videoArticle = $cms->renderArticle('video', 'Video article title', '/path/to/video.mp4');
echo "Text article: \n\t$textArticle";
echo "\n\n";
echo "Image article: \n\t$imageArticle";
echo "\n\n";
echo "Video article: \n\t$videoArticle";
echo "\n";

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

Logger::log("-> PRZYKLAD NR " . $counterExample++ . "\n\nBuilder - Pizza");
Logger::log("");

$pizzaSize = PizzaSize::MEDIUM_SIZE;
$pizzaBuilder = new CappriziozaBuilder(new Pizza($pizzaSize));
$pizzaDirector = new PizzaDirector();
$pizza = $pizzaDirector->build($pizzaBuilder);

Logger::log(ConstHelper::SEPARATOR);

$pizzaSize = PizzaSize::SMALL_SIZE;
$pizzaBuilder = new PepperoniBuilder(new Pizza($pizzaSize));
$pizzaDirector = new PizzaDirector();
$pizza = $pizzaDirector->build($pizzaBuilder);

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

Logger::log("-> PRZYKLAD NR " . $counterExample++ . "\n\nFactory pattern - Toy");
Logger::log("");

$toyTypeDoll = ToyType::Doll;
$toyTypeRobot = ToyType::Robot;
$toyTypeCar = ToyType::Car;
$toyFactory = new ToyFactory();
$dollToy = $toyFactory->getToy($toyTypeDoll);
$robotToy = $toyFactory->getToy($toyTypeRobot);
$carToy = $toyFactory->getToy($toyTypeCar);
echo "Manufactured toys: \n";

echo $dollToy->getDescription() . "\n";
echo $robotToy->getDescription() . "\n";
echo $carToy->getDescription() . "\n";

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

Logger::log("-> PRZYKLAD NR " . $counterExample++ . "\nFactory pattern - Breakfast");
Logger::log("");

$breakfastFactory = new BreakfastFactory();
$breakfastFactory->registryBreakfast('milk', fn() => new BreakfastMilk());
$breakfastFactory->registryBreakfast('meat', fn() => new BreakfastMeat());
$breakfastFactory->registryBreakfast('fit', fn() => new BreakfastFit());

$milkBreakfast = $breakfastFactory->getBreakfast('milk');
$meatBreakfast = $breakfastFactory->getBreakfast('meat');
$fitBreakfast = $breakfastFactory->getBreakfast('fit');

echo "Maked breakfast: \n";

echo $milkBreakfast->getDescription() . "\n";
echo $meatBreakfast->getDescription() . "\n";
echo $fitBreakfast->getDescription() . "\n";

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

Logger::log("-> PRZYKLAD NR " . $counterExample++ . "\n\nBuilder - SQLQuery");
Logger::log("");

$sqlQueryFactory = new SqlQueryDirector();
$queryFromMysql = $sqlQueryFactory->clientCode(new MysqlQueryBuilder());
$queryFromPostgres = $sqlQueryFactory->clientCode(new PostgresQueryBuilder());

echo "Query from MySQL:\n";
echo $queryFromMysql;
echo "\n\n";
echo "Query from Postgres:\n";
echo $queryFromPostgres;
echo "\n\n";

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

Logger::log("-> PRZYKLAD NR " . $counterExample++ . "\n\nFactory method - Plan");
Logger::log("");

$planFactory = new PlanFactory();
$plan = $planFactory->createPlan('pro');
//$plan = $planFactory->createPlan('pro');
if ($plan) {
    echo 'Rate: ' . $plan->getRate() . "\n";
    foreach ($plan->getFeatures() as $feature) {
        echo '- ' . $feature . "\n";
    }
    echo "\n";
}

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

// ------------------------------------------------------------------
// STRUCTURAL DESIGN PATTERNS
// ------------------------------------------------------------------
Logger::log("-> PRZYKLAD NR " . $counterExample++ . " - STRUCTURAL\n\nFacade - API");
Logger::log("");

$userApiFacade = new User('user1', 'user1@example.com');
$productStorage = new ProductStorage();
$cartFacadeApi = new Cart($userApiFacade);

$apiFacade = new ApiFacade($userApiFacade, $cartFacadeApi, $productStorage);

// Logowanie i rejestracja
$apiFacade->register();
$apiFacade->login();

// Dodawanie i usuwanie produktów z koszyka
$apiFacade->addToCart(1, 2);
$apiFacade->addToCart(2, 1);
echo json_encode($apiFacade->getCartItems(), JSON_PRETTY_PRINT) . "\n";

// Testowanie metod increase, increaseBy, decrease, decreaseBy
$productFacadeApi = new Product(3, 'Product 1', 10.0, 10);
$productStorage->addProduct($productFacadeApi);
$cartItem = new CartItem($productFacadeApi, 2);

echo json_encode($cartItem, JSON_PRETTY_PRINT);
echo "\n";
$cartItem->increase();
echo "Quantity: " . $cartItem->getQuantity() . "\n";
$cartItem->decrease();
echo "Quantity: " . $cartItem->getQuantity() . "\n";
$cartItem->increaseBy(11);
echo "Quantity: " . $cartItem->getQuantity() . "\n";
$cartItem->decreaseBy(3);
echo "Quantity: " . $cartItem->getQuantity() . "\n";

$apiFacade->removeFromCart(1);
echo json_encode($apiFacade->getCartItems(), JSON_PRETTY_PRINT) . "\n";

// Pobieranie produktów
echo json_encode($apiFacade->getProducts(), JSON_PRETTY_PRINT) . "\n";
echo json_encode($apiFacade->getProduct(2), JSON_PRETTY_PRINT) . "\n";

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

Logger::log("-> PRZYKLAD NR " . $counterExample++ . " - STRUCTURAL\n\nFacade - API");
Logger::log("");

// external class
$randomProcessor = new RandomProcessor(new ExternalLoggerFileWriterAdapter(new ExternalLoggerFileWriter()));
$randomProcessor->process(['test','test']);

// internal class
//$randomProcessor = new RandomProcessor(new LoggerFileWriter());
//$randomProcessor->process(['test','test']);

Logger::log("\n");
Logger::log(ConstHelper::SEPARATOR);
Logger::log("\n");

// ------------------------------------------------------------------
// BEHAVIORAL DESIGN PATTERNS
// ------------------------------------------------------------------
Logger::log("-> PRZYKLAD NR " . $counterExample++ . " - BEHAVIORAL\n\nStrategy - Calculate TOTAL PRICE in promotion(selected strategy)");
Logger::log("");

$couponStrategy = CheckoutFactory::create('coupon');
$checkout = new Checkout(250, $couponStrategy);
$totalPriceCoupon = $checkout->getTotalPrice();
Logger::log("Total price Coupon is: " . number_format($totalPriceCoupon, 2, '.', '') . " PLN");

$blackFridayStrategy = CheckoutFactory::create('black_friday');
$checkout = new Checkout(250, $blackFridayStrategy);
$totalPriceBlackFriday = $checkout->getTotalPrice();
Logger::log("Total price Black Friday is: " . number_format($totalPriceBlackFriday, 2, '.', '') . " PLN");

$progressStrategy = CheckoutFactory::create('progress');
$checkout = new Checkout(250, $progressStrategy);
$totalPriceProgress = $checkout->getTotalPrice();
Logger::log("Total price Progress is: " . number_format($totalPriceProgress, 2, '.', '') . " PLN");

// No discount, unknown disocunt
$noDiscountStrategy = CheckoutFactory::create('super');
$checkout = new Checkout(250, $noDiscountStrategy);
$totalPriceNoDiscount = $checkout->getTotalPrice();
Logger::log("Total price No Discount or Unknown Discount is: " . number_format($totalPriceNoDiscount, 2, '.', '') . " PLN");

Logger::log("\n");

Logger::log("-> PRZYKLAD NR " . $counterExample++ . " - BEHAVIORAL\n\nStrategy - Send notification");
Logger::log("");

$email = new Mail();
$fcm = new FCM();
$sms = new SMS();
$verificationEmail = new MailNotification($email);
$verificationEmail->setStrategy($email)->notify();
$anouncementFCM = new FCMNotification($email);
$anouncementFCM->setStrategy($fcm)->notify();
$otpSMS = new SMSNotification($email);
$otpSMS->setStrategy($sms)->notify();

Logger::log("\n");
Logger::log("-> PRZYKLAD NR " . $counterExample++ . " - BEHAVIORAL\n\nStrategy - Payment Method\n");

$paymentStrategy = PaymentFactory::create('paypal');
$payment = new Payment(220, $paymentStrategy);
$payment->process();

Logger::log("\n\n");
Logger::log("-> PRZYKLAD NR " . $counterExample++ . " - BEHAVIORAL\n\nTemplate Method - Publishing Message on Social Network");
Logger::log("");

/**
 * The client code.
 */
echo "Username: \n";
$username = readline();
echo "Password: \n";
$password = readline();
echo "Message: \n";
$message = readline();

echo "\nChoose the social network to post the message:\n" .
    "1 - Facebook\n" .
    "2 - Twitter\n";
$choice = readline();

// Now, let's create a proper social network object and send the message.
if ($choice == 1) {
    $network = new Facebook($username, $password);
} elseif ($choice == 2) {
    $network = new Twitter($username, $password);
} else {
    die("Sorry, I'm not sure what you mean by that.\n");
}
$network->post($message);

Logger::log("");