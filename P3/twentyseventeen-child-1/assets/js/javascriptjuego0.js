var cuadrado = [0, 0];
var puntuacion = 0;
function getMousePos(canvas, evt) {
		var rect = canvas.getBoundingClientRect();
		return {
			x: evt.clientX - rect.left,
			y: evt.clientY - rect.top
		};
	}

function limpiar(context) {
	canvas = document.querySelector('#sketchpad');
	context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
}

function marcador(){
	document.getElementById('marcador').innerHTML = puntuacion;
}

function dibuja(context) {
	var x = Math.floor(Math.random() * 470);
	var y = Math.floor(Math.random() * 470);
	cuadrado[0] = x;
	cuadrado[1] = y;
	context.fillStyle = "rgb(200,0,0)";
	context.fillRect(x, y, 30, 30);
}
function DibujaEnRaton(context, coors) {
	var vector = [coors.x - cuadrado[0], coors.y - cuadrado[1]];
	var modulo = Math.sqrt(vector[0]*vector[0]+vector[1]*vector[1]);
	context.fillStyle = "rgb(0,0,200)";
	context.fillRect(cuadrado[0], cuadrado[1], 30, 30);
	cuadrado[0] = cuadrado[0] + vector[0] / modulo * 30;
	cuadrado[1] = cuadrado[1] + vector[1] / modulo * 30;
	context.fillStyle = "rgb(200,0,0)";
	context.fillRect(cuadrado[0], cuadrado[1], 30, 30);
	puntuacion = puntuacion + 1;
	marcador();
	}
function ready() {
	var canvas = document.querySelector("#sketchpad");
	context = canvas.getContext('2d');
	canvas.addEventListener("click",function(evt){
		coors=getMousePos(canvas, evt);
		DibujaEnRaton(context, coors, cuadrado) ;
	})
	document.querySelector("#reiniciar").addEventListener("click", function () {
		limpiar(context);
		dibuja(context, cuadrado);
		puntuacion = 0;
		marcador(puntuacion);
	});
	
	dibuja(context);
}

window.addEventListener('DOMContentLoaded', (event) => {
    var selection = document.querySelector('#sketchpad') !== null;
    if (selection) {
        ready();
    }
});
