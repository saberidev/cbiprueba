<?php
namespace Cbi\Problems;
/*
	Vamos a crear un juego de tres en raya y necesitamos controlar el estado del
	tablero. Para ello, crearemos una función.

	Supongamos que el tablero viene en la forma de un array de 3x3, en el que
	el valor es 0 si la casilla está vacía, 1 si es una X y 2 si es una O, tal
	que así:

	[[0,0,1],
	 [0,1,2],
	 [2,1,0]]

	Lo que queremos es que nuestra función devuelva -1 si el tablero no está
	resuelto, 1 si han ganado las X, 2 si han ganado las O y 0 en caso de
	empate.

	Supondremos que el tablero que se pasa como entrada siempre es válido, dado
	que estamos dentro del contexto de nuestro juego.
*/

Class TresEnRaya{

	function boardState(array $board): int
	{


		$rows = count($board);
		for($i=0; $i<$rows; $i++){
			if(count($board[$i]) != 3)
				return false;
		}
		
		$winner = $this->checkHorizontal($board);
		if(!$winner)
			$winner = $this->checkVertical($board);
		if(!$winner)
			$winner = $this->checkCruz($board);
		if(!$winner)
			$winner = $this->checkResuelto($board);
		
		return $winner;
	}


	private function checkHorizontal($board){

		$winner = false;

		foreach ($board as $b) {		
			if(array_sum($b) == 6)
				$winner = 2;
			
			elseif($b[0] == $b[1] && $b[1] == $b[2] && array_sum($b) == 3)
				$winner = 1;
		}

		return $winner;
	}

	private function checkVertical($board){

		$winner = false;

		if($board[0][0] == $board[1][0] && $board[1][0] == $board[2][0]){
			if($board[0][0] == 1)
				$winner = 1;
			elseif($board[0][0] == 2)
				$winner = 2;
		}
		elseif($board[0][1] == $board[1][1] && $board[1][1] == $board[2][1]){
			if($board[0][1] == 1)
				$winner = 1;
			elseif($board[0][1] == 2)
				$winner = 2;
		}
		if($board[0][2] == $board[1][2] && $board[1][2] == $board[2][2]){
			if($board[0][2] == 1)
				$winner = 1;
			elseif($board[0][2] == 2)
				$winner = 2;
		}

		return $winner;
		
	}

	private function checkCruz($board){

		$winner = false;

		if($board[0][0] == $board[1][1] && $board[1][1] == $board[2][2]){
			if($board[0][0] == 1)
				$winner = 1;
			elseif($board[0][0] == 2)
				$winner = 2;
		}

		elseif($board[0][2] == $board[1][1] && $board[1][1] == $board[2][0]){
			if($board[0][2] == 1)
				$winner = 1;
			elseif($board[0][2] == 2)
				$winner = 2;
		}

		return $winner;
	}

	private function checkResuelto($board){

		$winner = 0;

		foreach ($board as $b) {
			foreach ($b as $casilla) {
				if($casilla == 0)
					$winner = -1;
				break;
			}
		}

		return $winner;
	}
}
