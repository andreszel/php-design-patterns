<?php

namespace App\DesignPatterns\Behavioral\TemplateMethod\PublishingMessageOnSocial;

class NetworkUtils
{
    /**
     * Simulates network latency by pausing execution for a while.
     */
    public static function simulateNetworkLatency()
    {
        $i = 0;
        while ($i < 5) {
            echo "*";
            sleep(1);
            $i++;
        }
        echo " ";
    }
}
