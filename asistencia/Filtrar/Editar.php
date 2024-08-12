<?php

    $ID = $_GET["id"];
	
include("conn.php");
$tareas = "SELECT * FROM `tareas` WHERE ID='$ID'"; 

$resultado= mysqli_query($conexion, $tareas);

$fetch=mysqli_fetch_array($resultado);
	

	
        $POST["ID"] = $fetch["ID"];
		$POST["Departamento"] = $fetch["Departamento"];
		$POST["Seccion"] = $fetch["Seccion"];
		$POST["Ubicacion"] = $fetch["Ubicacion"];
		$POST["Actividad"] = $fetch["Actividad"];
		$POST["Equipos"] = $fetch["Equipos"];
		echo $POST["Equipos"];
		$POST["Cantidad_persona"] = $fetch["Cantidad_persona"];
		$POST["Cantidad_equipo"] = $fetch["Cantidad_equipo"];
		echo $POST["Cantidad_equipo"];
		$POST["Personas_Beneficiadas"] = $fetch["Personas_Benficiadas"];
		$POST["Presupuesto"] = $fetch["Presupuesto"];
		$POST["Fecha"] = $fetch["Fecha"];
		
      /*  <td class="table__item">
        <a href="Filtrar/Editar.php?id=<?php echo $fetch["ID"]?>" class="table">Editar</a>|
        <a href="Borrar.php?id=<?php echo $fetch["ID"]?>" class="">Borrar</a>
        </td>*/
    
    
	
?>

	

<!doctype html>
<html>
<head>
<title> Actualizacion
</title>
<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Roboto&display=swap" rel="stylesheet">
<link rel="stylesheet" href="test/Diseño/Tipos/style.css">
<style>

.selectBox select {
	width:100;
	font-weight: bold;
}

#checkboxes label {
display: block;
}

#checkboxes {
  display: none;
border: 1px #dadada solid;
}

#checkboxes label:hover {
 background-color: #le90ff;
}
</style>
</head>



<body>



<h1>Ingrese sus Actividades</h1>

<Form action= "/test/Update.php" method="POST">
<input type="date" name="Fecha" value= <?php echo $POST["Fecha"];?>>

<select name="Departamento">
<option label="">Seleccione su Departamento</option>

 <option value="Administracion"<?php
 if($POST["Departamento"] == "Administracion")
 {
	 echo "selected";
	 
 }
 ?>>Administracion</option>
 
 <option value="Area Tecnica"<?php
 if($POST["Departamento"] == "Area Tecnica")
 {
	 echo "selected";
	 
 }
 ?>>Area Tecnica</option>
 
 <option value="Control de Equipo"<?php
 if($POST["Departamento"] == "Control de Equipo")
 {
	 echo "selected";
	 
 }
 ?>>Control de Equipo</option>
 
 <option value="Red Vial"<?php
 if($POST["Departamento"] == "Red Vial")
 {
	 echo "selected";
	 
 }
 ?>>Red Vial</option>
 
 <option value="Red Hidraulica"<?php
 if($POST["Departamento"] == "Red Hidraulica")
 {
	 echo "selected";
	 
 }
 ?>>Red Hidraulica</option>
 
 <option value="Servicios Complementarios"<?php
 if($POST["Departamento"] == "Servicios Complementarios")
 {
	 echo "selected";
	 
 }
 ?>>Servicios Complementarios</option>
 

 <option value="Señal Vial" <?php
 if($POST["Departamento"] == "Señal Vial")
 {
	 echo "selected";
	 
 }
 ?>>Señal Vial</option>
 
 
 </select>
 <select name="Seccion">
<option label="">Seleccione su Seccion</option>

<optgroup label="1.Administracion">

 <option value="Administracion" <?php
 if($POST["Seccion"] == "Administracion")
 {
	 echo "selected";
	 
 }
 ?>>Administracion</option>
 
 <option value="Combustible" <?php
 if($POST["Seccion"] == "Combustible")
 {
	 echo "selected";
	 
 }
 ?>>Combustible</option>
 
 <option value="Horas Extras" <?php
 if($POST["Seccion"] == "Horas Extras")
 {
	 echo "selected";
	 
 }
 ?>>Horas Extras</option>
 
 </optgroup>
<optgroup label="2.Area Tecnica">
 <option value="Diseño" <?php
 if($POST["Seccion"] == "Diseño")
 {
	 echo "selected";
	 
 }
 ?>>Diseño</option>
 
 <option value="Presupuesto" <?php
 if($POST["Seccion"] == "Presupuesto")
 {
	 echo "selected";
	 
 }
 ?>>Presupuesto</option>
 
 <option value="Topografia" <?php
 if($POST["Seccion"] == "Topografia")
 {
	 echo "selected";
	 
 }
 ?>>Topografia</option>
 
 </optgroup>
 <optgroup label="3.Control de Equipo">
 <option value="Serviciamiento" <?php
 if($POST["Seccion"] == "Serviciamiento")
 {
	 echo "selected";
	 
 }
 ?>>Serviciamiento</option>
 
 <option value="Taller Mecanico" <?php
 if($POST["Seccion"] == "Taller Mecanico")
 {
	 echo "selected";
	 
 }
 ?>>Taller Mecanico</option>
 
 <option value="Control de Equipo" <?php
 if($POST["Seccion"] == "Control de Equipo")
 {
	 echo "selected";
	 
 }
 ?>>Control de Equipo</option>
 
 <option value="Traslado" <?php
 if($POST["Seccion"] == "Traslado")
 {
	 echo "selected";
	 
 }
 ?>>Traslado</option>
 
 </optgroup>
 <optgroup label="4.Red Hidraulica">
 <option value="Obras Civiles" <?php
 if($POST["Seccion"] == "Obras Civiles")
 {
	 echo "selected";
	 
 }
 ?>>Obras Civiles</option>
 
 <option value="Drenaje Pluvial" <?php
 if($POST["Seccion"] == "Drenaje Pluvial")
 {
	 echo "selected";
	 
 }
 ?>>Drenaje Pluvial</option>
 
 </optgroup>
<optgroup label="5.Red Vial">
 <option value="Calles no Revestidas" <?php
 if($POST["Seccion"] == "Calles no Revestidas")
 {
	 echo "selected";
	 
 }
 ?>>Calles no Revestidas</option>
 
 <option value="Calles Adoquines" <?php
 if($POST["Seccion"] == "Calles Adoquines")
 {
	 echo "selected";
	 
 }
 ?>>Calles Adoquines</option>
 
 <option value="Calles Asfaltadas" <?php
 if($POST["Seccion"] == "Calles Asfaltadas")
 {
	 echo "selected";
	 
 }
 ?>>Calles Asfaltadas</option>
 
 </optgroup>
 <optgroup label="6.Señal Vial">
 <option value="Vertical" <?php
 if($POST["Seccion"] == "Vertical")
 {
	 echo "selected";
	 
 }
 ?>>Vertical</option>
 
 <option value="Horizontal" <?php
 if($POST["Seccion"] == "Horizontal")
 {
	 echo "selected";
	 
 }
 ?>>Horizontal</option>
 
 <option value="Semaforica" <?php
 if($POST["Seccion"] == "Semaforica")
 {
	 echo "selected";
	 
 }
 ?>>Semaforica</option>
 
 </optgroup>
 <optgroup label="7.Servicio Complementario">
 <option value="Carpinteria" <?php
 if($POST["Seccion"] == "Carpinteria")
 {
	 echo "selected";
	 
 }
 ?>>Carpinteria</option>
 
 <option value="Metalurgia" <?php
 if($POST["Seccion"] == "Metalurgia")
 {
	 echo "selected";
	 
 }
 ?>>Metalurgia</option>
 
 <option value="Mantenimiento" <?php
 if($POST["Seccion"] == "Mantenimiento")
 {
	 echo "selected";
	 
 }
 ?>>Mantenimiento</option>
 
 <option value="Apoyo" <?php
 if($POST["Seccion"] == "Apoyo")
 {
	 echo "selected";
	 
 }
 ?>>Apoyo</option>
 
 </optgroup>
 </select>
<input type="text" name="Ubicacion" value= <?php echo $POST["Ubicacion"];?>>
<input type="text" name="Actividad" value= <?php echo $POST["Actividad"];?>">
<div class="multiselect">
<div class="selectBox" onclick="showcheckboxes()">
<select> 
<option>Seleccione Equipos</option>
</Select>
<div class="overselect"></div>
</div>
<div id="checkboxes">
<Label><input type="checkbox" name="Equipos[]" value="Sin Medio" 
<?php

 $item = $POST["Equipos"];
 $buscar= 'Sin Medio';
 $encontrar = strpos ($item, $buscar);
 
 if($encontrar === false) {
	  
 }else{
 	 echo "checked";
	 
 }
 
 ?>
/>Sin Medio</label>

<Label><input type="checkbox" name="Equipos[]" value="Apisonador:13V083" <?php

 $item = $POST["Equipos"];
 $buscar= 'Apisonador:13V083';
 $encontrar = strpos ($item, $buscar);
 
 if($encontrar === false) {
	  
 }else{
 	 echo "checked";
	 
 }
 
 ?>/>Apisonador:13V083
 
<input type="checkbox" name="Equipos[]" value="Apisonador:13V077"/>Apisonador:13V077</label>
<Label><input type="checkbox" name="Equipos[]" value="Apisonador:13V076"/>Apisonador:13V076
<input type="checkbox" name="Equipos[]" value="Apisonador:13V073"/>Apisonador:13V073</label>
<Label><input type="checkbox" name="Equipos[]" value="Apisonador:13V072"/>Apisonador:13V072
<input type="checkbox" name="Equipos[]" value="Apisonador:13V071"/>Apisonador:13V071</label>
<Label><input type="checkbox" name="Equipos[]" value="Apisonador:13V067"/>Apisonador:13V067
<input type="checkbox" name="Equipos[]" value="Apisonador:13V066"/>Apisonador:13V066</label>
<Label><input type="checkbox" name="Equipos[]" value="Apisonador:13V065"/>Apisonador:13V065
<input type="checkbox" name="Equipos[]" value="Apisonador:13V064"/>Apisonador:13V064</label>
<Label><input type="checkbox" name="Equipos[]" value="Apisonador:13V061"/>Apisonador:13V061
<input type="checkbox" name="Equipos[]" value="Apisonador:13V059"/>Apisonador:13V059</label>
<Label><input type="checkbox" name="Equipos[]" value="Apisonador:13V056"/>Apisonador:13V056
<input type="checkbox" name="Equipos[]" value="Apisonador:13V055"/>Apisonador:13V055</label>
<label><input type="checkbox" name="Equipos[]" value="A.Distrito:AD"/>A.Distrito:AD</label>
<label><input type="checkbox" name="Equipos[]"/>Barredora:04B010</label>
<Label><input type="checkbox" name="Equipos[]" value="Bomba Achicadora:13BA139"/>Bomba Achicadora:13BA139
<Label><input type="checkbox" name="Equipos[]" value="Bomba Achicadora:13BA137"/>Bomba Achicadora:13BA137
<Label><input type="checkbox" name="Equipos[]" value="Bomba Achicadora:13BA130"/>Bomba Achicadora:13BA130
<Label><input type="checkbox" name="Equipos[]" value="Bomba Achicadora:13BA084"/>Bomba Achicadora:13BA084
<label><input type="checkbox" name="Equipos[]" value="Buckey:Cod-017"/>Buckey:Cod-017</label>
<label><input type="checkbox" name="Equipos[]" value="Bulldozer:07B034" 
<?php
 $item = $POST["Equipos"];
 $buscar= 'Bulldozer:07B034';
 $encontrar = strpos ($item, $buscar);
 
 if($encontrar === false) {
	  
 }else{
 	 echo "checked";
	 
 }
 ?>/>Bulldozer:07B034
 
<input type="checkbox" name="Equipos[]" value="Bulldozer:07B033"/>Bulldozer:07B033</label>
<label><input type="checkbox" name="Equipos[]" value="Bulldozer:07B032"/>Bulldozer:07B032
<input type="checkbox" name="Equipos[]" value="Bulldozer:07B028"/>Bulldozer:07B028</label>
<label><input type="checkbox" name="Equipos[]" value="Bulldozer:07B027"/>Bulldozer:07B027
<input type="checkbox" name="Equipos[]" value="Bulldozer:07B008"/>Bulldozer:07B008</label>
<label><input type="checkbox" name="Equipos[]" value="Cabezal:04C057"/>Cabezal:04C057
<input type="checkbox" name="Equipos[]" value="Cabezal:04C046"/>Cabezal:04C046</label>
<label><input type="checkbox" name="Equipos[]" value="Camion Microcarpeta:04CM001"/>Camion Microcarpeta:04CM001</label>
<label><input type="checkbox" name="Equipos[]" Value="Camion Taller:04T014"/>Camion Taller:04T014</label>
<label><input type="checkbox" name="Equipos[]" Value="Canasta:04PL02"/>Canasta:04PL02
<input type="checkbox" name="Equipos[]" Value="Canasta:04PL02"/>Canasta:04PL01</label>
<label><input type="checkbox" name="Equipos[]" value="Cargadora:6066"/>Cargadora:6066
<input type="checkbox" name="Equipos[]" value="Cargadora:6065"/>Cargadora:6065</label>
<label><input type="checkbox" name="Equipos[]" value="Cargadora:6064"/>Cargadora:6064
<input type="checkbox" name="Equipos[]" value="Cargadora:6059"/>Cargadora:6059</label>
<label><input type="checkbox" name="Equipos[]" value="Cargadora:6050"/>Cargadora:6050
<input type="checkbox" name="Equipos[]" value="Cargadora:6058"/>Cargadora:6058</label>
<label><input type="checkbox" name="Equipos[]" value="Cargadora:6057"/>Cargadora:6057
<input type="checkbox" name="Equipos[]" value="Cargadora:6052"/>Cargadora:6052</label>
<label><input type="checkbox" name="Equipos[]" value="Cargadora:6051"/>Cargadora:6051</label>
<label><input type="checkbox" name="Equipos[]" value="Carreta Verde:17RP011"/>Carreta Verde:17RP011</label>
<label><input type="checkbox" name="equipos[]" value="Cisterna:04PA062"/>Cisterna:04PA062
<input type="checkbox" name="equipos[]" value="Cisterna:04PA059"/>Cisterna:04PA059</label>
<label><input type="checkbox" name="Equipos[]" value="Cisterna:04PA018"/>Cisterna:04PA018</label>
<label><input type="checkbox" name="Equipos[]" value="Cisterna Asfaltica:04PB010"/>Cisterna Asfaltica:04PB010</label>
<label><input type="checkbox" name="Equipos[]" value="Cisterna Estacionaria:04P015"/>Cisterna Estacionaria:04P015</label>
<label><input type="checkbox" name="Equipos[]" value="Cisterna Estacionaria:04PA015"/>Cisterna Estacionaria:04PA015</label>
<label><input type="checkbox" name="Equipos[]" value="Compresor:13CM014"/>Compresor:13CM014
<input type="checkbox" name="Equipos[]" value="Compresor:13CM013"/>Compresor:13CM013</label>
<label><input type="checkbox" name="Equipos[]" value="Compresor:13CM012"/>Compresor:13CM012
<input type="checkbox" name="Equipos[]" value="Compresor:13CM011"/>Compresor:13CM011</label>
<label><input type="checkbox" name="Equipos[]" value="Compresor:13CM010"/>Compresor:13CM010
<input type="checkbox" name="Equipos[]" value="Compresor:13CM009"/>Compresor:13CM009</label>
<label><input type="checkbox" name="Equipos[]" value="Doble Rodo:09R052"/>Doble Rodo:09R052</label>
<label><input type="checkbox" name="Equipos[]" value="Dumper:04DP01"/>Dumper:04DP01</label>
<label><input type="checkbox" name="Equipos[]" value="Excavadora:210LC07"/>Excavadora:210LC07</label>
<label><input type="checkbox" name="Equipos[]" value="Excavadora:8032"/>Excavadora:8032
<input type="checkbox" name="Equipos[]" value="Excavadora:8028"/>Excavadora:8028</label>
<label><input type="checkbox" name="Equipos[]" value="Finisher:12004"/>Finisher:12004
<input type="checkbox" name="Equipos[]" value="Grua:10010"/>Grua:10010</label>
<label><input type="checkbox" name="Equipos[]" value="Hidrosanitario:04HS002"/>Hidrosanitario:04HS002</label>
<label><input type="checkbox" name="Equipos[]" value="Hidrosanitario:04HS001"/>Hidrosanitario:04HS001</label>
<label><input type="checkbox" name="Equipos[]" value="Low Boy:17014"/>Low Boy:17014
<input type="checkbox" name="Equipos[]" value="Low Boy:17015"/>Low Boy:17015</label>
<label><input type="checkbox" name="Equipos[]" value="Lubrico:04L010"/>Lubrico:04L010</label>
<label><input type="checkbox" name="Equipos[]" value="Mezclador:13M037" <?php
 $item = $POST["Equipos"];
 $buscar= 'Mezclador:13M037';
 $encontrar = strpos ($item, $buscar);
 
 if($encontrar === false) {
	  
 }else{
 	 echo "checked";
	 
 }
 ?>/>Mezclador:13M037
 
<input type="checkbox" name="Equipos[]" value="Mezclador:13M035"/>Mezclador:13M035</label>
<label><input type="checkbox" name="Equipos[]" value="Mezclador:13M034"/>Mezclador:13M034
<input type="checkbox" name="Equipos[]" value="Mezclador:13M032"/>Mezclador:13M032</label>
<label><input type="checkbox" name="Equipos[]" value="Mezclador:13M028"/>Mezclador:13M028
<input type="checkbox" name="Equipos[]" value="Mezclador:13M027"/>Mezclador:13M027</label>
<label><input type="checkbox" name="Equipos[]" value="Mezclador:13M026"/>Mezclador:13M026
<input type="checkbox" name="Equipos[]" value="Mezclador:13M025"/>Mezclador:13M025</label>
<label><input type="checkbox" name="Equipos[]" value="Mezclador:13M023"/>Mezclador:13M023
<input type="checkbox" name="Equipos[]" value="Mezclador:13M022"/>Mezclador:13M022</label>
<label><input type="checkbox" name="Equipos[]" value="Mezclador:13M020"/>Mezclador:13M020
<input type="checkbox" name="Equipos[]" value="Mezclador:13M018"/>Mezclador:13M018</label>
<label><input type="checkbox" name="Equipos[]" value="Mezclador:13M017"/>Mezclador:13M017</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC074"/>Minicargadora:06MC074</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC064"/>Minicargadora:06MC064</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC060"/>Minicargadora:06MC060</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC053"/>Minicargadora:06MC053</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC052"/>Minicargadora:06MC052</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC050"/>Minicargadora:06MC050</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC037"/>Minicargadora:06MC037</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC035"/>Minicargadora:06MC035</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC034"/>Minicargadora:06MC034</label>
<label><input type="checkbox" name="Equipos[]" value="Minicargadora:06MC032"/>Minicargadora:06MC032</label>
<label><input type="checkbox" name="Equipos[]" value="Motonivelador:5062"/>Motonivelador:5062</label>
<label><input type="checkbox" name="Equipos[]" value="Motonivelador:5058"/>Motonivelador:5058
<input type="checkbox" name="Equipos[]" value="Motonivelador:5056"/>Motonivelador:5056</label>
<label><input type="checkbox" name="Equipos[]" value="Motonivelador:5055"/>Motonivelador:5055
<input type="checkbox" name="Equipos[]" value="Motonivelador:5054"/>Motonivelador:5054</label>
<label><input type="checkbox" name="Equipos[]" value="Neumatica:09N009"/>Neumatica:09N009</label>
<label><input type="checkbox" name="Equipos[]" value="Perfiladora:14001"/>Perfiladora:14001</label>
<label><input type="checkbox" name="Equipos[]" value="Plataforma:04P122"/>Plataforma:04P122</label>
<label><input type="checkbox" name="Equipos[]" value="Plataforma:04P121"/>Plataforma:04P121
<input type="checkbox" name="Equipos[]" value="Plataforma:04P120"/>Plataforma:04P120</label>
<label><input type="checkbox" name="Equipos[]" value="Plataforma:04P119"/>Plataforma:04P119
<input type="checkbox" name="Equipos[]" value="Plataforma:04P118"/>Plataforma:04P118</label>
<label><input type="checkbox" name="Equipos[]" value="Plataforma:04P117"/>Plataforma:04P117
<input type="checkbox" name="Equipos[]" value="Plataforma:04P116"/>Plataforma:04P116</label>
<label><input type="checkbox" name="Equipos[]" value="Plataforma:04P115"/>Plataforma:04P115
<input type="checkbox" name="Equipos[]" value="Plataforma:04P114"/>Plataforma:04P114</label>
<label><input type="checkbox" name="Equipos[]" value="Plataforma:04P113"/>Plataforma:04P113
<input type="checkbox" name="Equipos[]" value="Plataforma:04P109"/>Plataforma:04P109</label>
<label><input type="checkbox" name="Equipos[]" value="Plataforma:04P108"/>Plataforma:04P108
<input type="checkbox" name="Equipos[]" value="Plataforma:04P106"/>Plataforma:04P106</label>
<label><input type="checkbox" name="Equipos[]" value="Plataforma:04P103"/>Plataforma:04P103
<input type="checkbox" name="Equipos[]" value="Plataforma:04P100"/>Plataforma:04P100</label>
<label><input type="checkbox" name="Equipos[]" value="Rayadora:04R01"/>Rayadora:04R01</label>
<label><input type="checkbox" name="Equipos[]" value="Retroexcavadora:8034"/>Retroexcavadora:8034</label>
<label><input type="checkbox" name="Equipos[]" value="Retroexcavadora:8031"/>Retroexcavadora:8031</label>
<label><input type="checkbox" name="Equipos[]" value="Retroexcavadora:8030"/>Retroexcavadora:8030</label>
<label><input type="checkbox" name="Equipos[]" value="Rodo Manual:09RM089"/>Rodo Manual:09RM089</label>
<label><input type="checkbox" name="Equipos[]" value="Rodo Manual:09RM088"/>Rodo Manual:09RM088</label>
<label><input type="checkbox" name="Equipos[]" value="Rodo Manual:09RM087"/>Rodo Manual:09RM087</label>
<label><input type="checkbox" name="Equipos[]" value="Rodo Manual:09RM083"/>Rodo Manual:09RM083</label>
<label><input type="checkbox" name="Equipos[]" value="Rodo Manual:09RM080"/>Rodo Manual:09RM080</label>
<label><input type="checkbox" name="Equipos[]" value="Rodo Manual:09RM079"/>Rodo Manual:09RM079</label>
<label><input type="checkbox" name="Equipos[]" value="Rodo Manual:09RM073"/>Rodo Manual:09RM073</label>
<Label><input type="checkbox" name="Equipos[]" value="Soldador C:13SC042"/>Soldador C:13SC042
<input type="checkbox" name="Equipos[]" value="Soldador C:13SC040"/>Soldador C:13SC040</label>
<Label><input type="checkbox" name="Equipos[]" value="Soldador C:13SC039"/>Soldador C:13SC039
<Label><input type="checkbox" name="Equipos[]" value="Soldador C:13SC038"/>Soldador C:13SC038</label>
<input type="checkbox" name="Equipos[]" value="Soldador C:13SC037"/>Soldador C:13SC037
<input type="checkbox" name="Equipos[]" value="Soldador C:13SC036"/>Soldador C:13SC036</label>
<Label><input type="checkbox" name="Equipos[]" value="Soldador C:13SC035"/>Soldador C:13SC035
<input type="checkbox" name="Equipos[]" value="Soldador C:13SC034"/>Soldador C:13SC034</label>
<Label><input type="checkbox" name="Equipos[]" value="Soldador C:13SC033"/>Soldador C:13SC033
<input type="checkbox" name="Equipos[]" value="Soldador C:13SC032"/>Soldador C:13SC032</label>
<Label><input type="checkbox" name="Equipos[]" value="Soldador C:13SC031"/>Soldador C:13SC031
<input type="checkbox" name="Equipos[]" value="Soldador C:13SC030"/>Soldador C:13SC030</label>
<Label><input type="checkbox" name="Equipos[]" value="Soldador C:13SC025"/>Soldador C:13SC025</label>
<Label><input type="checkbox" name="Equipos[]" value="Soplete:13SM001"/>Soplete:13SM001</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI016"/>Torre de Iluminacion:13TI016</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI015"/>Torre de Iluminacion:13TI015</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI014"/>Torre de Iluminacion:13TI014</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI013"/>Torre de Iluminacion:13TI013</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI012"/>Torre de Iluminacion:13TI012</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI011"/>Torre de Iluminacion:13TI011</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI010"/>Torre de Iluminacion:13TI010</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI009"/>Torre de Iluminacion:13TI009</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI007"/>Torre de Iluminacion:13TI007</label>
<Label><input type="checkbox" name="Equipos[]" value="Torre de Iluminacion:13TI004"/>Torre de Iluminacion:13TI004</label>
<Label><input type="checkbox" name="Equipos[]" value="Tractor:07V033"/>Tractor:07V033</label>
<Label><input type="checkbox" name="Equipos[]" value="Vibrador de Concreto:13VC081"/>Vibrador de Concreto:13VC081</label>
<Label><input type="checkbox" name="Equipos[]" value="Vibrocompactadora:09RN022"/>Vibrocompactadora:09RN022</label>
<Label><input type="checkbox" name="Equipos[]" value="Vibrocompactadora:09RN015"/>Vibrocompactadora:09RN015</label>
<Label><input type="checkbox" name="Equipos[]" value="Vibrocompactadora:09RN016"/>Vibrocompactadora:09RN016</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V346"/>Volquete:04V346
<input type="checkbox" name="Equipos[]" value="Volquete:04V345"/>Volquete:04V345</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V344"/>Volquete:04V344
<input type="checkbox" name="Equipos[]" value="Volquete:04V343"/>Volquete:04V343</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V334"/>Volquete:04V334
<input type="checkbox" name="Equipos[]" value="Volquete:04V333"/>Volquete:04V333</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V330"/>Volquete:04V330
<input type="checkbox" name="Equipos[]" value="Volquete:04V329"/>Volquete:04V329</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V328"/>Volquete:04V328
<input type="checkbox" name="Equipos[]" value="Volquete:04V327"/>Volquete:04V327</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V326"/>Volquete:04V326
<input type="checkbox" name="Equipos[]" value="Volquete:04V325"/>Volquete:04V325</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V324"/>Volquete:04V324
<input type="checkbox" name="Equipos[]" value="Volquete:04V323"/>Volquete:04V323</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V311"/>Volquete:04V311
<input type="checkbox" name="Equipos[]" value="Volquete:04V298"/>Volquete:04V298</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V297"/>Volquete:04V297
<input type="checkbox" name="Equipos[]" value="Volquete:04V296"/>Volquete:04V296</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V295"/>Volquete:04V295
<input type="checkbox" name="Equipos[]" value="Volquete:04V294"/>Volquete:04V294</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V293"/>Volquete:04V293
<input type="checkbox" name="Equipos[]" value="Volquete:04V292"/>Volquete:04V292</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V291"/>Volquete:04V291
<input type="checkbox" name="Equipos[]" value="Volquete:04V289"/>Volquete:04V289</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V288"/>Volquete:04V288
<input type="checkbox" name="Equipos[]" value="Volquete:04V287"/>Volquete:04V287</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V282"/>Volquete:04V282
<input type="checkbox" name="Equipos[]" value="Volquete:04V281"/>Volquete:04V281</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V280"/>Volquete:04V280
<input type="checkbox" name="Equipos[]" value="Volquete:04V279"/>Volquete:04V279</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V278"/>Volquete:04V278
<input type="checkbox" name="Equipos[]" value="Volquete:04V277"/>Volquete:04V277</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V276"/>Volquete:04V276
<input type="checkbox" name="Equipos[]" value="Volquete:04V275"/>Volquete:04V275</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V274"/>Volquete:04V274
<input type="checkbox" name="Equipos[]" value="Volquete:04V273"/>Volquete:04V273</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V272"/>Volquete:04V272
<input type="checkbox" name="Equipos[]" value="Volquete:04V265"/>Volquete:04V265</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V263"/>Volquete:04V263
<input type="checkbox" name="Equipos[]" value="Volquete:04V245"/>Volquete:04V245</label>
<Label><input type="checkbox" name="Equipos[]" value="Volquete:04V226"/>Volquete:04V226</label>
</div>
</div>
<Input type="Number" name="Cantidad_persona" value= <?php echo $POST["Cantidad_persona"];?>>
<Input type="Number" name="Cantidad_equipo" value= <?php echo $POST["Cantidad_equipo"];?>>
<input type="submit" value="Enviar">
</Form>
<script>
var expanded=false;
function showcheckboxes() {
	var checkboxes = document.getElementById("checkboxes");
	if (!expanded) {
		checkboxes.style.display = "block";
		expanded=true;
	} else {
		checkboxes.style.display = "none";
		expanded= false;
	}
}
</script>
<a href= "Salir.php">Salir</a>
</body>
</html>




 
