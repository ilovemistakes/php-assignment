<?php

namespace SocialPost\Driver\Factory;

use SocialPost\Cache\Factory\CacheFactory;
use SocialPost\Client\Factory\FictionalClientFactory;
use SocialPost\Driver\FictionalDriver;
use SocialPost\Driver\SocialDriverInterface;
use SocialPost\User\UserDataProviderInterface;

/**
 * Class FictionalSocialDriverFactory
 *
 * @package SocialPost\Driver\Factory
 */
class FictionalDriverFactory
{

    /**
     * @return FictionalDriver
     */
    public static function create(UserDataProviderInterface $userDataProvider): SocialDriverInterface
    {
        try {
            $cache = CacheFactory::create();
        } catch (\Throwable $throwable) {
            //Cache not ready :(
            $cache = null;
        }

        $client = FictionalClientFactory::create();
        $driver = new FictionalDriver($client, $userDataProvider);
        $driver->setCache($cache);

        return $driver;
    }
}
