<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?PHP $t=$this->native_session->userdata('login_datos');?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP echo $t['nombre'];?> | HayEmpleo.com - Administrador</title>

<link href="<?PHP  echo base_url('/html/css/proyecto.css');?>" rel="stylesheet" type="text/css" />
<link href="<?PHP  echo base_url('/html/css/proyecto-formulario.css');?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?PHP  echo base_url('/html/jquery-1.6.4.min.js');?>"></script>
<script type="text/javascript" src="<?PHP  echo base_url('/html/rload.js');?>"></script>
<script>
$(function() {
	
	
	if ($('.mensaje_sistema').length) {
 
$('div.mensaje_sistema').fadeOut(3500);
 
}
 $('a.boton').click(function(){
	 
	 id=$(this).attr('id');
	 
	 $('div#div_'+id).toggle('slow');
	 
	 
	 $(this).toggleClass('abajo');
//	 alert(c);
	 
	 
	 
	 });
});
</script>
</head>

<body>

<div id="cabeza">
<div class="pagina">

<h1><a href="#"  class="principal">Haycursos.com</a> </h1>
<a href="<?PHP echo site_url('feedback/sugerencias');?>">Tienes sugerencias?</a>
  <a href="<?PHP echo site_url('feedback/preguntas');?>">Tienes preguntas?</a>
  <a href="<?PHP echo site_url('feedback/animos');?>">Danos &aacute;nimos!</a>
  
  <a   href="<?PHP  echo site_url('/welcome/logout/');?>">Cerrar sesi&oacute;n</a>
</div>
</div>



<div id="cuerpo">
<div class="modulos">
  
  <h2><a href="<?PHP echo site_url('home/index');?>" class="principal">Ir a  panel</a></h2>
  
  <?PHP if(isset($t['tipo']) && $t['tipo']!='interno'):?>
  <?PHP $canal=$this->native_session->userdata('_canal_');
if(isset($canal) && $canal):?>
  <h2><a href="http://<?PHP echo $canal;?>.hayempleo.com" class="principal">Ir a  <?PHP echo $canal?></a></h2>
  <?PHP endif;?>
  
  
  
  <?PHP endif;?>
  
  <h2><a href="<?PHP echo base_url('index.php');?>" class="principal">Ir a HayEmpleo.com</a></h2>
  
  <div class="submodulo">
    <h2><a href="javascript:void(0);" class="boton" id="info01">Informacion personal</a></h2>
    <div class="" id="div_info01" style="display:none;">
      <div class="fila"><?PHP echo $t['nombre'];?></div>
      <div class="fila">RUC/C&Oacute;DIGO:<?PHP echo $t['ruc'];?></div>
      <div class="fila">Encargado:<?PHP echo $t['encargado'];?></div>
      <div class="fila">Cargo:<?PHP echo $t['cargo'];?></div>
      <div class="fila"><?PHP echo $t['email_contacto'];?></div>
      </div>
    </div>
  
  
  
  
  <div class="submodulo">
    <h2>Empleos</h2>
    <ul>
      <li><a  class="tool  listar"href="<?PHP echo  site_url('/home/listar');?>">Listar empleos registrados</a></li>
      <li><a class="tool  agregar"href="<?PHP echo site_url('/home/agregar/');?>">Agregar nuevo empleo</a></li>
      </ul>
    </div>
  
  <?PHP if($t['tipo']!='interno'):?>
  <div class="submodulo">
    <h2>Informaci&oacute;n de la empresa</h2>
    <ul>
      
      <li><a class="tool  perfil"href="<?PHP echo site_url('/perfil/editar/');?>">Actualizar perfil</a></li>
      <li><a class="tool  logo"href="<?PHP echo site_url('/perfil/logo/');?>">Subir  logo</a></li>
      <li><a class="tool  clave"href="<?PHP echo  site_url('/perfil/cambiar');?>">Cambiar contraseña</a></li>
      
      
      </ul>
    </div>
  
  <?PHP else:?>
  <div class="submodulo">
    <h2>Configuración</h2>
    <ul>
      <li><a class="tool  perfil"href="<?PHP echo site_url('/perfil/editar/');?>">Actualizar perfil</a></li>
      <li><a class="tool  clave"href="<?PHP echo  site_url('/perfil/cambiar');?>">Cambiar contraseña</a></li>
      </ul>
    </div>
  <?PHP endif;?>
  
  
  
  <?PHP if($t['tipo']!='interno'):?>
  <div class="submodulo">
    <h2>Web empresa</h2>
    <ul>
      
      
      <li><a class="tool  logo"href="<?PHP echo site_url('/perfil/banner/');?>">Subir  banner</a></li>
      
      </ul>
    </div>
  <?PHP endif;?>
  
  
  <?PHP if($t['tipo']=='interno'):?>
  <div class="submodulo">
    <h2>Contenidos web</h2>
    <ul>
      <li><a  class="tool  agregar"href="<?PHP echo  site_url('/blogfast/index');?>">Agregar publicación</a></li>
      <li><a class="tool  listar"href="<?PHP echo site_url('/blogfast/listar/');?>">Listar publicaciones</a></li>
      <li><a class="tool  configurar"href="<?PHP echo site_url('/blogfast/configurar/');?>">Configurar</a></li>
      </ul>
    </div>
  <?PHP endif;?>
  <?PHP if($t['tipo']!='interno'):?>
  <div class="submodulo">
    <h2>Candidatos</h2>
    <ul>
      
      
      <li><a class="tool  usuario"href="<?PHP echo site_url('/candidatos/index/');?>">Ver candidatos</a></li>
      
      
      
      </ul>
    </div>
  <?PHP endif;?>
  
  <a  class="salir" href="<?PHP  echo site_url('/welcome/logout/');?>">Cerrar sesi&oacute;n</a>
  
</div>
<div id="panel">
  <?PHP echo $content;?>
</div>
</div>




<div id=pie>
<div class="pagina">
2012 haycursos.com
</div>
</div>



</body>
</html>