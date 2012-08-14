<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>proyecto</title>
<link href="<?PHP  echo base_url('/html/css/proyecto.css');?>" rel="stylesheet" type="text/css" />
</head>

<body>



<div class="pagina">


<div class="modulos">

<ul>
<li><a href="#">Perfiles profesionales
</a>
  <ul>
<li><a href="<?PHP echo  site_url('/perfil/listar/');?>">Listar perfiles</a></li>
<li><a href="<?PHP echo site_url('/perfil/agregar/');?>">Agregar perfil</a></li>
</ul>

</li>


<li><a href="#">Competencias
</a>
  <ul>
<li><a href="<?PHP  echo site_url('/competencia/listar/');?>">Listar Competencia</a></li>
<li><a href="<?PHP  echo site_url('/competencia/form_agregar/');?>">Agregar Competencia</a></li>
</ul>

</li>


<li><a href="<?PHP  echo site_url('/categoria/listar/');?>">Categoria
</a>
  <ul>

<li><a href="<?PHP  echo site_url('/categoria/form_agregar/');?>">Agregar categoria</a></li>


  </ul>


</li>


</ul>



</div>
</div>
<div id="panel">