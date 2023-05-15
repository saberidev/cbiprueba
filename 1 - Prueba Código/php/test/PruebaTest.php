<?php

namespace Cbi\Tests;
use \PHPUnit\Framework\TestCase;

use Cbi\Problems\TresEnRaya;

/**
 *
 */
class PruebaTest extends TestCase
{

	public function testFrameworkConfigured()
	{
		$this->assertTrue(true);
	}

	public function testTresEnRaya()
	{
		$tresenraya = new TresEnRaya;

		$board =   [[0,0,1],
	 				[0,1,2],
	 				[2,1,0]];

	 	$result = $tresenraya->boardState($board);

		$this->assertEquals($result, -1);
	}
}
