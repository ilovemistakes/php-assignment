<?php

namespace App\Controller\Factory;

use App\Controller\ControllerInterface;
use App\Controller\StatisticsController;
use SocialPost\Service\Factory\SocialPostServiceFactory;
use Statistics\Extractor\StatisticsToExtractor;
use Statistics\Service\Factory\StatisticsServiceFactory;
use App\Auth\Factory\AuthServiceFactory;
use App\Auth\SocialPostAdapter;

/**
 * Class StatisticsControllerFactory
 *
 * @package App\Controller\Factory
 */
class StatisticsControllerFactory implements ControllerFactoryInterface
{

    /**
     * @return ControllerInterface
     */
    public function create(): ControllerInterface
    {
        $statsService = StatisticsServiceFactory::create();

        $authService = AuthServiceFactory::create();
        $userDataProviderAdapter = new SocialPostAdapter($authService);
        $socialService = SocialPostServiceFactory::create($userDataProviderAdapter);

        return new StatisticsController($statsService, $socialService, new StatisticsToExtractor());
    }
}
