<?php

// informations
// https://github.com/rpodwika/designpatterns
// https://github.com/zawarstwaabstrakcji/design-patterns

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/vendor/autoload.php';

use App\DesignPatterns\Creational\Singleton\Logger;
use App\Example\HelloWorld;

const ROOT_DIRECTORY = __DIR__;

$counterExample = 1;

$entry = new HelloWorld();

$patterns = [
    'behavioral' => [
        'name' => 'BEHAVIORAL',
        'examples' => [
            'strategyCalculateDiscount' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Behavioral\\Strategy\\CalculateDiscount\\TestCheckout',
                'description' => 'Strategy - Calculate TOTAL PRICE in promotion(selected strategy)'
            ],
            'strategyPaymentMethod' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Behavioral\\Strategy\\PaymentMethod\\TestPayment',
                'description' => 'Strategy - Payment'
            ],
            'strategySendNotification' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Behavioral\\Strategy\\SendNotification\\TestSendNotification',
                'description' => 'Strategy - Send notification(FCM, Mail, SMS)'
            ],
            'templateMethodPublishingMessageOnSocial' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Behavioral\\TemplateMethod\\PublishingMessageOnSocial\\TestPublishingMessage',
                'description' => 'Template Method - Publishing Message on Social'
            ]
        ]
    ],
    'creational' => [
        'name' => 'CREATIONAL',
        'examples' => [
            'abstractFactoryCMS' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\AbstractFactory\\CMS\\TestCMS',
                'description' => 'Abstrat Factory - CMS'
            ],
            'abstractFactoryTemplateGenerator' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\AbstractFactory\\TemplateGenerator\\TestTemplateGenerator',
                'description' => 'Abstrat Factory - Template Generator'
            ],
            'builderPizza' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\Builder\\Pizza\\TestPizza',
                'description' => 'Builder - Pizza'
            ],
            'builderSQLQuery' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\Builder\\SQLQuery\\TestSQLQuery',
                'description' => 'Builder - SQL Query'
            ],
            'factoryBreakfast' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\Factory\\Breakfast\\TestBreakfast',
                'description' => 'Factory - Breakfast'
            ],
            'factoryToy' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\Factory\\Toy\\TestToy',
                'description' => 'Factory - Toy'
            ],
            'factoryMethodPlan' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\FactoryMethod\\Plan\\TestPlan',
                'description' => 'Factory Method - Plan'
            ],
            'singletonConfig' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\Singleton\\TestConfig',
                'description' => 'Singleton - Config'
            ],
            'singletonConnnectDb' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\Singleton\\TestConnectDB',
                'description' => 'Singleton - Connect DB'
            ],
            'singletonLogger' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Creational\\Singleton\\TestLogger',
                'description' => 'Singleton - Logger'
            ]
        ]
    ],
    'structural' => [
        'name' => 'STRUCTURAL',
        'examples' => [
            'adapterLogger' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Structural\\Adapter\\Logger\\TestLogger',
                'description' => 'Adapter - Logger'
            ],
            'adapterSlackNotification' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Structural\\Adapter\\SlackNotification\\TestSlackNotification',
                'description' => 'Adapter - Slack Notification'
            ],
            'facadeApi' => [
                'class' => 'App\\QuickTests\\DesignPatterns\\Structural\\Facade\\Api\\TestApi',
                'description' => 'Facade - Api'
            ]
        ]
    ]
];

function displayPatterns($patterns)
{
    $counter = 1;
    foreach ($patterns as $category => $examples) {
        echo ucfirst($examples['name']) . ":\n\n";
        foreach ($examples['examples'] as $key => $info) {
            echo "\t$counter. {$info['description']}\n";
            $counter++;
        }
        echo "\n";
    }
}

function getPatternByNumber(array $patterns, int $number)
{
    $counter = 1;
    foreach ($patterns as $category => $examples) {
        foreach ($examples['examples'] as $key => $info) {
            if ($counter === $number) {
                return $info;
            }
            $counter++;
        }
    }
    throw new Exception("Invalid pattern number.");
}

function getHeaderPattern(string $title)
{
    Logger::log("----------------------------------------------------------------------------");
    Logger::log("===> Name of the design pattern example {$title} <===");
    Logger::log("----------------------------------------------------------------------------");
    Logger::log("\n");
}

echo "\nTYPY WZORCÓW oraz ponumerowana lista przykładów:\n\n";
displayPatterns($patterns);

$selectedNumber = (int) readline("Wpisz numer przykładu do przetestowania (lub wpisz 0, aby przetestować wszystkie): ");

echo "\n\n";

if ($selectedNumber === 0) {
    foreach ($patterns as $category => $examples) {
        foreach ($examples['examples'] as $key => $info) {
            //loadTest($info['class']);
            $title = "[" . $counterExample++ . "]: ".$info['description'];
            getHeaderPattern($title);
            call_user_func([$info['class'], 'run']);
        }
    }
} else {
    try {
        $patternItem = getPatternByNumber($patterns, $selectedNumber);
        //loadTest($className);

        $title = $patternItem['description'];
        getHeaderPattern($title);
        call_user_func([$patternItem['class'], 'run']);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/* echo ConstHelper::SEPARATOR;
echo ConstHelper::NEW_LINE; */