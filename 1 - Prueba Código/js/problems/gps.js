/*
	¡El GPS se ha roto y tenemos que llegar a un sitio!

	Por suerte, tienes un mapa y tu algoritmo sigue intacto. Eso sí, tu mapa es
	un poco	extraño: todas las intersecciones están etiquetadas con números enteros
	diferentes y las  carreteras que las conectan están etiquetadas con el tiempo
	que se tarda en recorrerlas expresado en minutos.

	Te encuentras en la intersección etiquetada como "start" y tu destino es la
	interescción etiquetada como "finish".

	Dispondrás del número total de intersecciones y un array de carreteras, cada
	una de ellas con las propiedades: "from", "to" (las interesecciones están
	etiquetadas con números enteros menores que el número de intersecciones) y
	"drivingTime". Las carreteras sólo pueden ser usadas para ir desde "from" a
	"to". No hay carreteras de doble sentido.

	Completa la función para que devuelva un array de intersecciones de la ruta
	más rápida desde "start" hasta "finish" (ambas incluidas).

	Si hay vairas rutas iguales, coge cualquiera. Si no hay rutas, devuelve null.

	Ejemplo:


	var roads = [
	    {from: 0, to: 1, drivingTime: 5},
	    {from: 0, to: 2, drivingTime: 10},
	    {from: 1, to: 2, drivingTime: 10},
	    {from: 1, to: 3, drivingTime: 2},
	    {from: 2, to: 3, drivingTime: 2},
	    {from: 2, to: 4, drivingTime: 5},
	    {from: 3, to: 2, drivingTime: 2},
	    {from: 3, to: 4, drivingTime: 10}
	];
	console.log(navigate(5, roads, 0, 4));
	// devolvería [0, 1, 3, 2, 4]. Tiempo más rápido is 5 + 2 + 2 + 5 = 14 minutes
*/

let gps = function navigate(numberOfIntersections, roads, start, finish) {

  if(start == finish){ //Significa que no moveremos
  	return null;
  }

  let path = [start]
  let distance
  let i = 0
  let total_distance = 0

  while (i < numberOfIntersections) { //Para que salgamos de loop como pedido

    distance = false;
    roads.forEach(function(road){

      if(road.from == start){

        if(!distance){
          distance = road.drivingTime

          if(!path.includes(road.to))
          	path.push(road.to)
		    	
        }else{
          if(road.to == finish && i == numberOfIntersections-1){
          	distance = road.drivingTime
            
            if(path.length > i)
            	path.pop()
            path.push(road.to)
	        }else{
          	if(road.drivingTime <= distance){
          		distance = road.drivingTime
	            if(path.length-1 > i)
            		path.pop()
	            path.push(road.to)
	          }
          }
        }
      }

    });

    total_distance += distance
    
    if(path.slice(-1) != finish)
    	start = path.slice(-1)
    else
    	break

    i++
  }

  if(!path.includes(finish))
  	return null

  return path
}

module.exports = gps
