let x = $(document);
x.ready(inicializarEventos);

function inicializarEventos() {
  let x = $("#boton1");
  x.click(ocultarRecuadro);
  x = $("#boton2");
  x.hide("fast");
  x.click(mostrarRecuadro);
}

function ocultarRecuadro() {
  let x = $("#descripcion");
  let y = $("#boton2");
  x.hide("slow");
  y.show("fast");
  
}

function mostrarRecuadro() {
  let x = $("#descripcion");
  let y = $("#boton1");
  let z = $("#boton2");
  x.show("fast");
  y.show("fast");
  z.hide("fast");
}