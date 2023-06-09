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

	public function test_cuando_array_no_es_3x3()
	{
		$tresenraya = new TresEnRaya;

		$board =   [[0,1,1],
	 				[0,1,2],
	 				[2,1]];

	 	$result = $tresenraya->boardState($board);

		$this->assertTrue(true);
	}

	public function test_cuando_x_ha_ganado()
	{
		$tresenraya = new TresEnRaya;

		$board =   [[0,1,1],
	 				[0,1,2],
	 				[2,1,0]];

	 	$result = $tresenraya->boardState($board);

		$this->assertEquals($result, 1);
	}

	public function test_cuando_O_ha_ganado()
	{
		$tresenraya = new TresEnRaya;

		$board =   [[0,0,2],
	 				[0,2,1],
	 				[2,1,0]];

	 	$result = $tresenraya->boardState($board);

		$this->assertEquals($result, 2);
	}

	public function test_el_caso_de_empate()
	{
		$tresenraya = new TresEnRaya;

		$board =   [[1,2,2],
	 				[2,1,1],
	 				[2,1,2]];

	 	$result = $tresenraya->boardState($board);

		$this->assertEquals($result, 0);
	}

	public function test_cuando_no_es_resuelto()
	{
		$tresenraya = new TresEnRaya;

		$board =   [[0,0,1],
	 				[0,1,2],
	 				[2,1,0]];

	 	$result = $tresenraya->boardState($board);

		$this->assertEquals($result, -1);
	}
}
