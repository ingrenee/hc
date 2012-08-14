<?PHP header('Content-Type: text/html; charset=utf-8');?>




<link rel="stylesheet" href="<?PHP echo base_url('js/tinybox2/style.css');?>" />
<script type="text/javascript" src="<?PHP echo base_url('js/tinybox2/tinybox.js');?>"></script>
<div align="center">

    

    

    <div class="fila2">

      <div class="colu_1"><?PHP _ayuda('estado');?>Estado de la publicación</div>

      <div class="colu_2">

        

          <label>

            <input type="radio" name="estado" 

   <?PHP if(@$info['estado']=='publicado'): echo 'checked="checked"';?>

   

   <?PHP else:?>

          <?PHP echo set_radio('estado','publicado');?>

          <?PHP endif;?>

   

   

            value="publicado" id="estado_0" />

            Publicado</label>

        

          <label>

            <input type="radio" name="estado" 

<?PHP if(@$info['estado']=='pendiente'): echo 'checked="checked"';?>            

<?PHP else:?>

          <?PHP echo set_radio('estado','pendiente');?>

          <?PHP endif;?>



             value="pendiente" id="estado_1" />

            No publicado</label>

            

            <?PHP echo form_error('estado');?>

        

      </div>

    </div>
    
    <div class="fila2">
      
      <div class="colu_1"><?PHP _ayuda('imagen_publicacion');?>Imagen</div>



<div class="colu_2">
<?PHP 
$imagenes['default_01.jpg']='default_01.jpg';
$imagenes['default_02.jpg']='default_02.jpg';
$imagenes['default_03.jpg']='default_03.jpg';
$imagenes['default_04.jpg']='default_04.jpg';
$imagenes['default_05.jpg']='default_05.jpg';
$imagenes['default_06.jpg']='default_06.jpg';
$imagenes['default_07.jpg']='default_07.jpg';
$imagenes['default_08.jpg']='default_08.jpg';
$imagenes['default_09.jpg']='default_09.jpg';
$imagenes['default_10.jpg']='default_10.jpg';
?>
<?PHP echo form_dropdown('imagen',$imagenes,_e($info,'imagen'));?>
   <?PHP echo form_error('imagen');?>

</div>



</div>
    
    <div class="fila2">
      
      <div class="colu_1"><?PHP _ayuda('titulo');?>T&iacute;tulo del contenido</div>



<div class="colu_2">

  <input name="titulo" type="text"  class="caja largo" id="titulo" value="<?PHP echo _e($info,'titulo');//$info["titulo"];?>" maxlength="120" />

   <?PHP echo form_error('titulo');?>

</div>



</div>


























<div class="fila2">
  
  <div class="colu_1" style="width:90%"><?PHP _ayuda('contenido_publicacion');?>Contenido : Este espacio es solo para la publicación de comunicados, citas, reuniones o cualquier evento que la facultad/centro de formación desee comunicar.<br />
  <br />
 









    <textarea name="descripcion" cols="50"   style="width:90%; height:250px;"class="" id="descripcion"      

       ><?PHP  echo _e($info,'descripcion');?><?PHP echo _e($info,'requisitos');?></textarea>

    <span class="subfila"><?PHP echo form_error('descripcion');?></span>

    <div id="funciones_trabajo">

      <ul id="funciones">



</ul>

</div>

</div>

</div>

<div class="fila2">

  <div class="colu_1"><?PHP _ayuda('autor');?>Autor :</div>



<div class="colu_2">

  <input name="autor" type="text" class="caja largo" id="autor" value="<?PHP 

		

		echo _e($info,'autor');

		

		?>" size="50" maxlength="50" />

  <span class="subfila"><?PHP echo form_error('autor');?></span></div>

</div>
<input type="submit" value="Guardar contenido" id="guardar" />







  

  

  

  <input type="submit" value="Cancelar" onclick="javascript" id="guardar2" />
</div>

  <script type="text/javascript" src="<?PHP echo base_url('js/tiny_mce3511/tiny_mce.js');?>"></script>







<script type="text/javascript">


$(document).ready(function() {
  $("#salario").val('<?PHP echo @_e($info,'salario'); ?>');
});




	tinyMCE.init({







		



		mode : "exact",



        elements : "descripcion",

entity_encoding : "raw",

theme : "advanced",

    plugins : "autolink,pagebreak,layer,table,contextmenu,paste,noneditable,wordcount,inlinepopups",



		// Theme options

		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,paste,pastetext,pasteword,|",

		theme_advanced_buttons2 : "",

		theme_advanced_buttons3 : "",

		theme_advanced_buttons4 : "",

		theme_advanced_toolbar_location : "top",

		theme_advanced_toolbar_align : "left",

		theme_advanced_statusbar_location : "bottom",

		theme_advanced_resizing : true





		







	});







</script>

