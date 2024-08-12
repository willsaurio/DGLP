function validarFormulario() {
  var fecha = document.getElementById('fecha').value;
  var turno = document.getElementById('turno').value;
  var distrito = document.getElementById('distrito').value;
  var ruta = document.getElementById('zona').value;
  var equipos = document.getElementById('equipos').value;
  var inss = document.getElementById('frame1').value;
  var inss1 = document.getElementById('frame2').value;
  var inss2 = document.getElementById('frame3').value;
  var inss3 = document.getElementById('frame4').value;
  var viaje1 = document.getElementById('viaje1').value;
  var viaje2 = document.getElementById('viaje2').value; 
  var viaje3 = document.getElementById('viaje3').value;
  var viaje_apoyo = document.getElementById('viaje4').value;
  var salida = document.getElementById('horaSalida').value;
  var entrada = document.getElementById('horaEntrada').value;
  var atencion = document.getElementById('atencion').value;
  var estado = document.getElementById('estado').value;
  var inss4 = document.getElementById('frame5').value;
  var inss5 = document.getElementById('frame6').value;

  if (fecha === '') {
    alert('Por favor, completa el campo "Fecha" del formulario.');
    return false;
}
if (turno === ''){
  alert('Por favor, completa el campo "Turno" del formulario.');
  return false;
}
if(distrito === ''){
  alert('Por favor, completa el campo "Distrito" del formulario.');
  return false;
}
if(zona === ''){
  alert('Por favor, completa el campo "Zona" del formulario.');
  return false;
}
if(ruta === ''){
  alert('Por favor, completa el campo "Ruta" del formulario.');
  return false;
}
if(equipos === ''){
  alert('Por favor, completa el campo "Equipos" del formulario.');
  return false;
}
if(inss === ''){
  alert('Por favor, completa el campo "Inss de Conductor" del formulario.');
  return false;
}
if(inss1 === ''){
  alert('Por favor, completa el campo "Inss Operario1" del formulario.');
  return false;
}
if(inss2 === ''){
  alert('Por favor, completa el campo "Inss Operario2" del formulario.');
  return false;
}
if(inss3 === ''){
  alert('Por favor, completa el campo "Inss Operario3" del formulario.');
  return false;
}
if(viaje1 === ''){
  alert('Por favor, completa el campo "Viaje1" del formulario.');
  return false;
}
if(viaje2 === ''){
  alert('Por favor, completa el campo "Viaje2" del formulario.');
  return false;
}
if(viaje3 === ''){
  alert('Por favor, completa el campo "Viaje3" del formulario.');
  return false;
}
if(viaje_apoyo === ''){
  alert('Por favor, completa el campo "Viaje de Apoyo" del formulario.');
  return false;
}
if(salida === ''){
  alert('Por favor, complete el campo de "hora de salida".')
  return false;
}
if(entrada === ''){
  alert('Por favor, complete el campo de "hora de entrada".')
  return false;
}
if(atencion === ''){
  alert('Por favor, complete el campo de "atención".')
  return false;
}
if(estado === ''){
  alert('Por favor, complete el campo de "estado".')
  return false;
}
if(inss4 === ''){
  alert('Por favor, complete el campo de "Inss de Fiscal".')
  return false;
}
if(inss5 === ''){
  alert('Por favor, complete el campo de "Inss de Jefe de Seccion".')
  return false;
}

  // Si llegamos aquí, todos los campos están completos
  return true; // Envía el formulario
}