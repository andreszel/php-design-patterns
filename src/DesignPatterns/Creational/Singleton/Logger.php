<?php

namespace App\DesignPatterns\Creational\Singleton;

/**
 * Krótka informacja, przykład jest zapożyczony ze strony https://refactoring.guru/design-patterns/singleton/php/example#example-1
 * Nie mogło tego przykładu zabraknąć, ponieważ tak jak napisał autor jest to najbardziej znany i chwalony przykład zastosowania wzorca Singleton.
 * Dzięki tej klasie mamy pojedynczy obiekt rejestrowania logów, które zapisujemy w pliku.
 * Dostęp do pliku jest możliwy z dowolnego kontekstu Twojej aplikacji, mamy globalny punkt(jeden) dostępu.
 */
class Logger extends Singleton
{
    // Zmienna do przechowywania tzw. uchwytu do pliku
    private $fileHandle;

    // W konstruktorze domyślnie przy tworzeniu obiektu tworzymy sobie uchwyt do standardowego wyjścia, czyli konsoli, której możemy coś logować, pisać
    protected function __construct()
    {
        $this->fileHandle = fopen('php://stdout', 'w');
    }

    // Tuta metoda tylko wypisuje nam podaną w argumencie wiadomość na standardowe wyjście, do konsoli
    public function writeLog(string $message, bool $withDate): void
    {
        $date = date("Y-m-d");
        fwrite($this->fileHandle, $withDate ? ($message != '' ? "$date: $message\n" : "$message\n") : "$message\n");
    }

    // W tej metodzie słówko static to odwołanie do bieżącej klasy, która jak wcześniej widać dziedziczy po klasie Singleton i zawiera metodę getInstance()
    // Odwołując się w ten sposób dostaniemy obiekt bieżącej klasy, tej w której to wywołamy,  a nie tej z której jest wywoływana metoda
    // Mając obiekt bieżącej klasy możemy na nim wywołać metodę writeLog
    public static function log(string $message, bool $withDate = false): void
    {
        $logger = static::getInstance();
        $logger->writeLog($message, $withDate);
    }
}