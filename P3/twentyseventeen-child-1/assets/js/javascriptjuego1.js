var cuadrado1 = [0, 0];
function getMousePos1(canvas, evt) {
		var rect = canvas.getBoundingClientRect();
		return {
			x: evt.clientX - rect.left,
			y: evt.clientY - rect.top
		};
	}

function limpiar1(context) {
	canvas = document.querySelector('#sketchpad1');
	context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
}

function dibuja1(context) {
	var x = Math.floor(Math.random() * 470);
	var y = Math.floor(Math.random() * 470);
	cuadrado1[0] = x;
	cuadrado1[1] = y;
	context.fillStyle = "rgb(0,0,200)";
	context.fillRect(x, y, 30, 30);
}
function DibujaEnRaton1(context, coors) {
	if(coors.x > cuadrado1[0] && coors.x < cuadrado1[0]+30 && coors.y > cuadrado1[1] && coors.y < cuadrado1[1]+30){
		context.fillStyle = "rgb(200,0,0)";
		context.fillRect(cuadrado1[0], cuadrado1[1], 30, 30);
		dibuja1(context);
	}
		
	}
function ready1() {
	var canvas = document.querySelector("#sketchpad1");
	context = canvas.getContext('2d');
	canvas.addEventListener("click",function(evt){
		coors=getMousePos1(canvas, evt);
		DibujaEnRaton1(context, coors, cuadrado) ;
	})
	document.querySelector("#reiniciar1").addEventListener("click", function () {
		limpiar1(context);
		dibuja1(context);
	});
	
	dibuja1(context);
}

window.addEventListener('DOMContentLoaded', (event) => {
    var selection1 = document.querySelector('#sketchpad1') != null;
    if (selection1) {
        ready1();
    }
});
