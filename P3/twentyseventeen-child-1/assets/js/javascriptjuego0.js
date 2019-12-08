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

function dibuja(context, cuadrado) {
	var x = Math.floor(Math.random() * 470);
	var y = Math.floor(Math.random() * 470);
	cuadrado = [x, y];
	context.fillStyle = "rgb(0,0,200)";
	context.fillRect(x, y, 30, 30);
}
function DibujaEnRaton(context, coors, cuadrado) {
	if(coors.x > cuadrado[0]-30 && coors.x < cuadrado[0]+30 && coors.y > cuadrado[1]-30 && coors.y < cuadrado[1]+30){
		limpiar(context);
		context.fillStyle = "rgb(200,0,0)";
		context.fillRect(cuadrado[0], cuadrado[1], 30, 30);
	}
		
	}
function ready() {
	var canvas = document.querySelector("#sketchpad");
	context = canvas.getContext('2d');
	var cuadrado = [0, 0];
	
	canvas.addEventListener("click",function(evt){
		coors=getMousePos(canvas, evt);
		DibujaEnRaton(context, coors, cuadrado) ;
	})
	document.querySelector("#dibujar").addEventListener("click", function () {
		limpiar(context);
		dibuja(context, cuadrado);
	});
	document.querySelector("#limpiar").addEventListener("click", function () {
		limpiar(context);
	});
}

window.addEventListener('DOMContentLoaded', (event) => {
    ready();
});
