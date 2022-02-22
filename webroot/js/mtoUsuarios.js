var botonBuscar = document.getElementById("buscar");

loadJSONDoc();

botonBuscar.addEventListener("click", function (evento) {
    
    loadJSONDoc();
});

function loadJSONDoc() {
    var descripcionUsuario = document.getElementById("descUsuario").value;
    var filas = document.getElementById("usuarios");
    var divErrorBuscar = document.getElementById("divBuscar");
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (this.readyState == 4 && this.status == 200) {
            objetoJSON = JSON.parse(xhttp.responseText);
            var aUsuarios = objetoJSON.usuarios;
            filas.innerHTML="";
            for (var i = 0; i < aUsuarios.length; i++) {
                if (objetoJSON.usuarios[i].result == "unsuccessful") {
                    error = objetoJSON.usuarios[i].mensajeError;
                    nuevoElementoError = document.createElement("p");
                    nuevoElementoError.innerHTML = error;
                    nuevoElementoError.classList.add("mensajeErrorUsuario");
                    divErrorBuscar.appendChild(nuevoElementoError);
                } else {
                    codigo = objetoJSON.usuarios[i].codUsuario;
                    descripcion = objetoJSON.usuarios[i].descUsuario;
                    conexiones = objetoJSON.usuarios[i].numconexiones;
                    ultimaconexion = objetoJSON.usuarios[i].fechaHoraUltimaConexion;
                    let oFecha = new Date(ultimaconexion * 1000);
                    ultimaConexionProcesada=`${oFecha.getDate()}/${oFecha.getMonth()+1}/${oFecha.getFullYear()}, a las ${oFecha.getHours()}:${oFecha.getMinutes()}:${oFecha.getSeconds()}`;
                    perfil = objetoJSON.usuarios[i].perfil;
                    imagen = objetoJSON.usuarios[i].imagenUsuario;
                    nuevoElemento = document.createElement("tr");
                    nuevoElementoCodigo = document.createElement("td");
                    nuevoElementoDescripcion = document.createElement("td");
                    nuevoElementoConexiones = document.createElement("td");
                    nuevoElementoUltimaconexion = document.createElement("td");
                    nuevoElementoPerfil = document.createElement("td");
                    nuevoElementoImagen = document.createElement("td");
                    img = document.createElement("img");
                    img.setAttribute("class", "fotoPerfil");
                    img.setAttribute("src", imagen);
                    nuevoElementoCodigo.innerHTML = codigo;
                    nuevoElementoDescripcion.innerHTML = descripcion;
                    nuevoElementoConexiones.innerHTML = conexiones;
                    nuevoElementoUltimaconexion.innerHTML = ultimaConexionProcesada;
                    nuevoElementoPerfil.innerHTML = perfil;
                    nuevoElemento.appendChild(nuevoElementoCodigo);
                    nuevoElemento.appendChild(nuevoElementoDescripcion);
                    nuevoElemento.appendChild(nuevoElementoConexiones);
                    nuevoElemento.appendChild(nuevoElementoUltimaconexion);
                    nuevoElemento.appendChild(nuevoElementoPerfil);
                    nuevoElemento.appendChild(img);
                    filas.appendChild(nuevoElemento);
                }
            }
        }
    }
    //Clase
    //xhttp.open("GET", `http://daw208.sauces.local/208DWESProyectoFinal/api/buscarUsuariosPorDesc.php?descUsuario=${descripcionUsuario}`, true);
    //Casa
    //xhttp.open("GET", `http://192.168.1.107/208DWESProyectoFinal/api/buscarUsuariosPorDesc.php?descUsuario=${descripcionUsuario}`, true);
    //Explotación
     xhttp.open("GET", `https://daw208.ieslossauces.es/208DWESProyectoFinal/api/buscarUsuariosPorDesc.php?descUsuario=${descripcionUsuario}`, true);
    xhttp.send();
}
