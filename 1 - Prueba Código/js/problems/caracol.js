/*
  	Dado un array nxn, devuelve los elementos ordenados de fuera hacia dentro
	en espiral en el sentido de las agujas del reloj.

	Ejemplo:
	array = [[1,2,3],
           [4,5,6],
           [7,8,9]]

	snail(array) #=> [1,2,3,6,9,8,7,4,5]

	array = [[1,2,3],[4,5,6],[7,8,9]]

	Nota: El objetivo NO es ordenar los elementos de menor a mayor, sino recorrer
  	la matriz en espiral.
	Nota: La matriz 0x0 se representa como [[]]
*/

let caracol = function snail(array) {

	let finalArray = []
  while(array.length){
    finalArray.push(...array.shift())
    for (var i = 0; i < array.length; i++){
      finalArray.push(array[i].pop())
    }
    finalArray.push(...(array.pop() || []).reverse());
    for (var i = array.length -1; i >= 0; i--){
      finalArray.push(array[i].shift())
    }
  }
 
 return finalArray
}

module.exports = caracol
