<?php

namespace App\QuickTests\DesignPatterns\Creational\Factory\Toy;

use App\DesignPatterns\Creational\Factory\Toy\ToyFactory;
use App\DesignPatterns\Creational\Factory\Toy\ToyType;
use App\DesignPatterns\Creational\Singleton\Logger;
use App\Helper\ConstHelper;

class TestToy
{
    public static function run(): void
    {
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
    }
}