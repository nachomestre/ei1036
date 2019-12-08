var cuadrado = [0, 0];
function getMousePos(canvas, evt) {
		var rect = canvas.getBoundingClientRect();
		return {
			x: evt.clientX - rect.left,
			y: evt.clientY - rect.top
		};
	}

function limpiar(context) {
	canvas = document.querySelector('#sketchpad1');
	context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
}

function dibuja(context) {
	var x = Math.floor(Math.random() * 470);
	var y = Math.floor(Math.random() * 470);
	cuadrado[0] = x;
	cuadrado[1] = y;
	context.fillStyle = "rgb(0,0,200)";
	context.fillRect(x, y, 30, 30);
}
function DibujaEnRaton(context, coors) {
	if(coors.x > cuadrado[0] && coors.x < cuadrado[0]+30 && coors.y > cuadrado[1] && coors.y < cuadrado[1]+30){
		context.fillStyle = "rgb(200,0,0)";
		context.fillRect(cuadrado[0], cuadrado[1], 30, 30);
		dibuja(context);
	}
		
	}
function ready() {
	var canvas = document.querySelector("#sketchpad1");
	context = canvas.getContext('2d');
	canvas.addEventListener("click",function(evt){
		coors=getMousePos(canvas, evt);
		DibujaEnRaton(context, coors, cuadrado) ;
	})
	document.querySelector("#reiniciar1").addEventListener("click", function () {
		limpiar(context);
		dibuja(context, cuadrado);
	});
	
	dibuja(context);
}

window.addEventListener('DOMContentLoaded', (event) => {
    var selection = document.querySelector('#sketchpad1') !== null;
    if (selection) {
        ready();
    }
});