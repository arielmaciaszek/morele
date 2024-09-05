<?php

use PHPUnit\Framework\TestCase;
include_once("../src/Recommendation.php");

class RecommendationTest extends TestCase 
{
  const NUMBER_OF_TITLES = 3;
  const FIRST_LETTER = 'A';

  protected static $class;

  public static function setUpBeforeClass(): void 
  {
    $movies = [
      '',
      'A',
      'Aa aa',
      'Aaaa aaa'
    ];
    static::$class = new Recommendation($movies);
  }

  public function testAlgorithm1() 
  {
    $expectedResult = self::NUMBER_OF_TITLES;

    $this->assertCount($expectedResult, static::$class->algorithm2(self::NUMBER_OF_TITLES));
  }

  public function testAlgorithm2() 
  {
    $expectedResult = [
      'Aaaa aaa',
    ];

    $this->assertEquals($expectedResult, static::$class->algorithm2(self::FIRST_LETTER));
  }

  public function testAlgorithm3() 
  {
    $expectedResult = [
      1 => 'Aa aa',
      2 => 'Aaaa aaa',
    ];

    $this->assertEquals($expectedResult, static::$class->algorithm3());
  }
}
