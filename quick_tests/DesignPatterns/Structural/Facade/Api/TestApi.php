<?php

namespace App\QuickTests\DesignPatterns\Structural\Facade\Api;

use App\DesignPatterns\Creational\Singleton\Logger;
use App\DesignPatterns\Structural\Facade\Api\ApiFacade;
use App\DesignPatterns\Structural\Facade\Api\Cart;
use App\DesignPatterns\Structural\Facade\Api\CartItem;
use App\DesignPatterns\Structural\Facade\Api\Product;
use App\DesignPatterns\Structural\Facade\Api\ProductStorage;
use App\DesignPatterns\Structural\Facade\Api\User;
use App\Helper\ConstHelper;

class TestApi
{
    public static function run(): void
    {
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
    }
}