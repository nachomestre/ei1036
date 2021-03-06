var cuadrado = [0, 0];
var premio = [0, 0];
var puntuacion = 0;
var perdido = 0;
function getMousePos0(canvas, evt) {
		var rect = canvas.getBoundingClientRect();
		return {
			x: evt.clientX - rect.left,
			y: evt.clientY - rect.top
		};
	}

function limpiar0(context) {
	canvas = document.querySelector('#sketchpad');
	context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
}

function marcador0(){
	document.getElementById('marcador').innerHTML = puntuacion;
}

function dibuja0(context) {
	var x = Math.floor(Math.random() * 470);
	var y = Math.floor(Math.random() * 470);
	cuadrado[0] = x;
	cuadrado[1] = y;
	context.fillStyle = "rgb(200,0,0)";
	context.fillRect(x, y, 10, 10);
}

function dibujaPremio0(context){
	var x = Math.floor(Math.random() * 470);
	var y = Math.floor(Math.random() * 470);
	premio[0] = x;
	premio[1] = y;
	context.fillStyle = "rgb(0,200,0)";
	context.fillRect(x, y, 30, 30);
}

function DibujaEnRaton0(context, coors) {
	if(perdido == 0){
		var vector = [coors.x - cuadrado[0], coors.y - cuadrado[1]];
		var modulo = Math.sqrt(vector[0]*vector[0]+vector[1]*vector[1]);
		vector[0] = cuadrado[0] + vector[0] / modulo * 10;
		vector[1] = cuadrado[1] + vector[1] / modulo * 10;
		if(context.getImageData(vector[0], vector[1], 1, 1).data[2]==200){
			premio[0] = -200;
			premio[1] = -200;
			context.font="50px Comic Sans MS";
			context.fillStyle = "red";
			context.textAlign = "center";
			context.fillText("Has perdido!", 250, 250);
			perdido = 1;
		}
		context.fillStyle = "rgb(0,0,200)";
		context.fillRect(cuadrado[0], cuadrado[1], 10, 10);
		cuadrado[0] = vector[0];
		cuadrado[1] = vector[1];
		context.fillStyle = "rgb(200,0,0)";
		context.fillRect(cuadrado[0], cuadrado[1], 10, 10);
		if(cuadrado[0]+5 > premio[0] && cuadrado[0]+5 < premio[0]+30 && cuadrado[1]+5 > premio[1] && cuadrado[1]+5 < premio[1]+30){
			context.fillStyle = "rgb(0,0,0)";
			context.fillRect(premio[0], premio[1], 30, 30);
			dibujaPremio0(context);
			puntuacion = puntuacion + 1;
			marcador0();
		}
	}
}

function ready0() {
	var canvas = document.querySelector("#sketchpad");
	context = canvas.getContext('2d');
	canvas.addEventListener("click",function(evt){
		coors=getMousePos0(canvas, evt);
		DibujaEnRaton0(context, coors, cuadrado) ;
	})
	document.querySelector("#reiniciar").addEventListener("click", function () {
		limpiar0(context);
		dibuja0(context, cuadrado);
		puntuacion = 0;
		marcador0(puntuacion);
		dibujaPremio0(context);
		perdido = 0;
	});
	
	dibuja0(context);
	dibujaPremio0(context);
}

window.addEventListener('DOMContentLoaded', (event) => {
    var selection0 = document.querySelector('#sketchpad') != null;
    if (selection0) {
        ready0();
    }
});
