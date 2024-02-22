<?php

/**
 * Klasa stworzona na podstawie informacji zamieszczonych na stronie
 * https://refactoring.guru/design-patterns/singleton/php/example
 * Klasa ta jest punktem wyjściowym do stworzenia już konkretnych klas, które powinny być w naszym projekcie klasami
 * stworzonymi wg wzorca kreacyjnego o nazwie Singleton
 * Przykładowymi klasami, które możemy napisać wg tego wzorca mogą być klasa: Logger, Database, Config
 * Klasy, które w całym naszym projekcie powinny mieć jedną instancję, kiedy chcemy kontrolować zasoby, kiedy chcemy posiadać globalny obiekt,
 * który po stworzeniu będzie używany we wszystkich plikach, klasach czy funkcjach.
 * Wzorzec ten jest nazywany antywzorcem, ponieważ łamie zasadę Single Responsibility Principle, czyli pojedynczej odpowiedzialności,
 */

namespace App\DesignPatterns\Creational\Singleton;

class Singleton
{
    /**
     * Tablica przechowująca wszystkie instancje do klas, które korzystają z klasy Singleton i pobierały instancję za pomocą metody getInstance()
     */
    private static $instances = [];

    /**
     * Konstruktor nie powinien być publiczny, ale nie może też być prywatny tak jak jest to w Singletonie,
     * jeżeli chcemy korzystać z niego w klasach dziedziczących po klasie Singleton
     */
    protected function __construct() { }

    /**
     * Klonowanie i deserializacja obiektu nie może być dozwolona
     */
    protected function __clone()
    {
        throw new \Exception("Cannot clone singleton");
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    /**
     * Metoda dodana w PHP >= 7.4, jeżeli ktoś próbuje zrobić deserializację to wykonywana jest metoda, która jest później w kodzie, jeżeli jest to PHP >= 7.4
     */
    public function __unserialize(array $data)
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    /**
     * Główna metoda, której używamy za każdym razem do pobierania instancji klasy, jeżeli istnieje już to zwracana jest ta instancja
     * która była wcześniej utworzona, jeżeli nie istnieje to jest tworzona nowa, dodawana do tablicy na przyszłość i zwracana
     */
    public static function getInstance()
    {
        $subclass = static::class;
        if(!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }

        return self::$instances[$subclass];
    }

    public function __destruct()
    {
        self::$instances = null;
    }

}