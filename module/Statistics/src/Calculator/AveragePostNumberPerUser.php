<?php

declare(strict_types = 1);

namespace Statistics\Calculator;

use SocialPost\Dto\SocialPostTo;
use Statistics\Dto\StatisticsTo;

class AveragePostNumberPerUser extends AbstractCalculator
{

    protected const UNITS = 'posts';

    /**
     * @var array
     */
    private $authors = [];

    /**
     * @var int
     */
    private $totalPosts = 0;

    /**
     * @inheritDoc
     */
    protected function doAccumulate(SocialPostTo $postTo): void
    {
        /*
         * Author ID is used as a key here because it works faster
         * due to the fact that array set operation is almost O(1)
         * while in_array() is O(n).
         */
        $this->authors[$postTo->getAuthorId()] = 1;

        $this->totalPosts++;
    }

    /**
     * @inheritDoc
     */
    protected function doCalculate(): StatisticsTo
    {
        $value = empty($this->authors)
            ? 0
            : $this->totalPosts / count($this->authors);

        return (new StatisticsTo())->setValue(round($value, 2));
    }
}
