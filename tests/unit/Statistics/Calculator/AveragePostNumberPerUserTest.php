<?php

declare(strict_types = 1);

namespace Tests\unit\Statistics\Calculator;

use PHPUnit\Framework\TestCase;
use SocialPost\Dto\SocialPostTo;
use Statistics\Calculator\AveragePostNumberPerUser;
use Statistics\Dto\ParamsTo;

/**
 * Class AveragePostNumberPerUserTest
 *
 * @package Tests\unit
 */
class AveragePostNumberPerUserTest extends TestCase
{

    /**
     * @var AveragePostNumberPerUser
     */
    private $calculator;

    public function setUp(): void
    {
        $this->calculator = new AveragePostNumberPerUser();

        $params = new ParamsTo();
        $params->setStatName('Test');

        $this->calculator->setParameters($params);
    }

    /**
     * @test
     */
    public function testEmptySet(): void
    {
        $this->assertEquals(0, $this->calculator->calculate()->getValue());
    }

    /**
     * @test
     * @dataProvider postProvider
     */
    public function testCalculations($authorIds, $expectedResult): void
    {
        foreach($authorIds as $authorId) {
            $post = new SocialPostTo();
            $post->setAuthorId($authorId);

            $this->calculator->accumulateData($post);
        }

        $this->assertEquals($expectedResult, $this->calculator->calculate()->getValue());
    }

    public function postProvider(): array
    {
        return [
            [
                // single author, single post
                ['test'],
                1
            ],
            [
                // many posts, single author
                array_fill(0, 10, 'test'),
                10
            ],
            [
                // many authors, each has one post
                range('a', 'z'),
                1
            ],
            [
                [
                    'user1',
                    'user1',
                    'user1',
                    'user2',
                    'user2',
                    'user2',
                ],
                3
            ],
            [
                [
                    'user1',
                    'user2',
                    'user2',
                    'user2',
                ],
                2
            ],
            [
                [
                    'user1',
                    'user2',
                    'user2',
                ],
                1.5
            ],
        ];
    }
}
