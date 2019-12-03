function getMousePos(canvas, evt) {
		var rect = canvas.getBoundingClientRect();
		return {
			x: evt.clientX - rect.left,
			y: evt.clientY - rect.top
		};
	}
function mostrarFoto(file, imagen) {
	var reader = new FileReader();
	reader.addEventListener("load", function () {
		imagen.src = reader.result;
	});
	reader.readAsDataURL(file);
}

function limpiar(context) {
	canvas = document.querySelector('#sketchpad');
	context = canvas.getContext("2d");
	context.clearRect(0, 0, canvas.width, canvas.height);
}

function dibuja(context) {
	context.fillStyle = "rgb(200,0,0)";
	context.fillRect(20, 10, 40, 50);
}
function DibujaEnRaton(context, coors) {
	context.fillStyle = "rgb(200,200,0)";
	context.fillRect(coors.x, coors.y, 30, 30);

		
	}
function ready() {
	var fichero = document.querySelector("#foto");
	var imagen = document.querySelector("#img_foto");
	fichero.addEventListener("change", function (event) {
		mostrarFoto(this.files[0], imagen);
	})
	var canvas = document.querySelector("#sketchpad");
	context = canvas.getContext('2d');
	canvas.addEventListener("click",function(evt){
		coors=getMousePos(canvas, evt);
		DibujaEnRaton(context, coors) ;
	})
	document.querySelector("#dibujar").addEventListener("click", function () {
		dibuja(context);
	});
	document.querySelector("#copiar").addEventListener("click", function () {
		context.drawImage(imagen, 0, 0, 100, 60);
	});
	document.querySelector("#limpiar").addEventListener("click", function () {
		limpiar(context);
	});
	document.querySelector("#guardar").addEventListener("click", function () {
		imagen.src = canvas.toDataURL("image/png");
	});
}
ready();
