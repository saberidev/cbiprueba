var sn = require('../problems/caracol.js');
var gps = require('../problems/gps.js');

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

describe('prueba', function() {
	it('test framework setup correct', function() {
		expect(true).toBe(true);
	});

	describe('caracol', function() {
		it('should run spiral in clock wise', function() {
			expect(sn([[1,2,3],[4,5,6],[7,8,9]])).toEqual([1,2,3,6,9,8,7,4,5]);
		});

		it('should return empty array on 0x0 array', function() {
			expect(sn([])).toEqual([]);
		});
	});

	describe('GPS', function() {

		it('should find the shortest route', function() {
			var resultado = gps(5, roads, 0, 4);
			expect(resultado).toEqual([0,1,3,2,4]);
		});

		it('should return null when not routes found', function() {
			var resultado = gps(5, roads, 0, 5);
			expect(resultado).toBe(null);
		});
	});
});
