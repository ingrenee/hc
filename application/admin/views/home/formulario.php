<?PHP header('Content-Type: text/html; charset=utf-8');?>




<link rel="stylesheet" href="<?PHP echo base_url('js/tinybox2/style.css');?>" />
<script type="text/javascript" src="<?PHP echo base_url('js/tinybox2/tinybox.js');?>"></script>
<script src="<?PHP echo base_url('js/jquery.maskedinput-1.3.min.js');?>" type="text/javascript"></script>

<script>

</script>




<div class="fila">
<div class="colu_1"><?PHP _ayuda('tipos_ID');?>Clasificación <?PHP echo form_dropdown('tipos_ID',$tipos,_e($empleo,'tipos_ID'));?>  <?PHP echo form_error('tipos_ID');?>
</div>
<div class="colu_2">

</div>



</div>


  <div class="fila">

  <div class="colu_1"><?PHP _ayuda('titulo');?>T&iacute;tulo del curso <?PHP echo form_error('titulo');?></div>



<div class="colu_2">

  <input name="titulo" type="text"  class="caja largo" id="titulo" value="<?PHP echo _e($empleo,'titulo');//$empleo["titulo"];?>" maxlength="50" />

   

</div>



</div>





<?PHP 

//$arr['']='seleccione';

$arr[1]='Administración/Oficina';

$arr[2]='Arte/Diseño/Medios';

$arr[3]='Científico/Investigación';

$arr[4]='Informática/Telecom.';

$arr[5]='Dirección/Gerencia';

$arr[6]='Economía/Contabilidad';

$arr[7]='Educación/Universidad';

$arr[8]='Hostelería/Turismo';

$arr[9]='Ingeniería/Técnico';

$arr[10]='Legal/Asesoría';

$arr[11]='Márketing/Ventas';

$arr[12]='Medicina/Salud';

$arr[13]='Recursos Humanos';

$arr[14]='Otros';



?>



<div class="fila">

  <div class="colu_1"><?PHP _ayuda('categoria');?>Categoria del curso   <?PHP echo form_error('categoria');?></div>



<div class="colu_2">
<table>
<td valign="top">
 <?PHP
   //print_r($_POST['categoria']);
  $arr2=_e($empleo,'categoria');
 
 if(isset($empleo['categoria'])):
 $arr2=desaplana($empleo['categoria']);
 elseif(isset($_POST['categoria'])):
 $arr2=$_POST['categoria'];
 else:
 $arr2=array();
 endif;
 
   foreach($arr as $k => $v):?>
   <?PHP if(($k+3)%4==0):?>
   </td><td valign="top">
   <?PHP endif;?>
     <?PHP 
   $ch='';
   if(in_array($k,$arr2)):
   $ch=' checked="checked" ';
    endif;?>
<label style="display:block"><input type="checkbox"  <?PHP echo $ch;?> name="categoria[]" value="<?PHP echo $k?>" id="categorias_<?PHP echo $k;?>" /><?PHP echo $v;?></label>
  
  <?PHP endforeach;?>
</td>
</table>
  <?PHP //echo form_dropdown('categoria',$arr,_e($empleo,'categoria'));?>

 

</div>



</div>

<!--


<div class="fila">

<div class="colu_1"><?PHP _ayuda('experiencia');?>Experiencia</div>



<div class="colu_2">

  <div class="subfila">

<input name="experiencia" 



type="text" class="peque6" id="experiencia" value="<?PHP echo _e($empleo,'experiencia');?>" size="20" />

       

       <label>

        <input name="experiencia_tipo" type="radio" class="peque" id="experiencia_tipo_0" value="a"

  <?PHP if(@$empleo['experiencia_tipo']=='a'):

   echo 'checked="checked"';

  

  else:

   echo set_radio('experiencia_tipo','a');

   endif;

  ?>

           

             />

A&ntilde;os</label>

            <label>

        <input name="experiencia_tipo" type="radio" class="peque"

             

             id="experiencia_tipo_1" value="m"

             

  <?PHP //if(@$empleo['experiencia_tipo']=='m') echo 'checked="checked"';?>

  

  <?PHP if(@$empleo['experiencia_tipo']=='m'):

  echo 'checked="checked"';

  else:

  echo set_radio('experiencia_tipo','m');

  endif;

  ?>

  

  

             

             />



        Meses     

        </label>

           <?PHP echo form_error('experiencia');?>  <?PHP echo form_error('experiencia_tipo');?></div>

         

        </p>



</div>

</div>

-->



















<!--

<div class="fila">

<div class="colu_1"><?PHP _ayuda('edad');?>Edad</div>



<div class="colu_2"> 

      Entre 

      <input name="edada" type="text" class="peque6"  id="edada" onkeypress="copiar();"  onkeydown="copiar();" onkeyup="copiar();" value="<?PHP

	   echo _e($empleo,"edada");?>" size="10" maxlength="2"/> 



      &nbsp;&nbsp;

y

       &nbsp;&nbsp;

     <input name="edadb" type="text" class="peque6"  id="edadb" value="<?PHP

		   echo _e($empleo,"edadb");?>" size="10" maxlength="2" /> 

     años



   

    <span class="subfila"><?PHP echo form_error('edada');?></span><span class="subfila"> <?PHP echo form_error('edadb');?></span></div>

</div>

-->

<div class="fila" style="display:none;">
  
  <div class="colu_1">

Moneda del salario

</div>

<div class="colu_2">



<label>

<input name="salario_tipo" type="radio" id="salario_tipo_0" value="soles" 

            

            

             

    <?PHP if(@$empleo['salario_tipo']=='soles'): echo 'checked="checked"';?>

       

              <?PHP else:?>

          <?PHP echo set_radio('salario_tipo','soles');?>

          <?PHP endif;?>

            />



      Moneda nacional

    </label>

    <label>

      <input type="radio" name="salario_tipo" value="dolares"  

            

    <?PHP if(@$empleo['salario_tipo']=='dolares'): echo 'checked="checked"';?>

             <?PHP else:?>

          <?PHP echo set_radio('salario_tipo','dolares');?>

          <?PHP endif;?>

            id="salario_tipo_1" />

    

      Dolares 

</label>



  <span class="subfila"><?PHP echo form_error('salario_tipo');?></span></div>



</div>
<div class="fila">
  
  <div class="colu_1" ><?PHP _ayuda('contenido');?>Descripci&oacute;n del curso  <?PHP echo form_error('descripcion');?>
  </div>
  <div class="colu_2">
  <input type="text"  id="lengthBox"  style="width:70px;"/>
  <?PHP 
$canal=$this->native_session->userdata('_canal_');
if(isset($canal)&& $canal):?>
<div class="aviso_canal">
<h1>Lea atentamente</h1>
Si deseas que tus ofertas se muestren en : <label class="canal">http://<?PHP echo $canal;?>.hayempleo.com</label><br />



</div>

<?PHP endif;?>









    <textarea name="descripcion" cols="50" rows="7" class="" id="descripcion"      

       ><?PHP  echo _e($empleo,'descripcion');?><?PHP echo _e($empleo,'requisitos');?></textarea>

    <span class="subfila"></span>
  
    

</div>

</div>

<div class="fila">
<div class="colu_1"><?PHP _ayuda('email_contacto');?>Precio público general S/. 
  <input name="precio" type="text" class="caja " style="width:80px" id="precio" value="<?PHP 

		

		echo _e($empleo,'precio');

		

		?>" size="50" maxlength="50" />
        | Incluye IGV ? <?PHP 
		$tmp['']='Seleccione';
		$tmp[1]='Si';
		$tmp[0]='No';
		
		echo form_dropdown('igv',$tmp,_e($empleo,'igv'));?>
        
  </div>
<div class="colu_2"> <?PHP echo form_error('precio');?> <?PHP echo form_error('igv');?></div>

</div>


<!--
<div class="fila">

  <div class="colu_1"><?PHP _ayuda('ubicacion');?>Ubicaci&oacute;n<span id="ciudad">



 <?PHP if(!isset($_POST['departamento'])):?>

 <?PHP if(@$empleo['departamento']):?>

  <label>Ciudad :<?PHP echo form_dropdown('departamento',$ciudades,$empleo['departamento']);?></label>

  <?PHP else: ?>

    <label>Ciudad :<?PHP echo form_dropdown('departamento',$ciudades);?></label>

  <?PHP endif;?>

 <?PHP else:?>       

 <label>Ciudad :<?PHP echo form_dropdown('departamento',$ciudades,$_POST['departamento']);?></label> 

 <?PHP endif;?>

 </span></div>

    <div class="colu_2">

   <input  name="pais"  type="hidden"value="167:Peru">

 

 

 

 

  <?PHP echo  form_error('departamento');?>

     

    </div>

  </div>
  
  
  -->
  
  
  <div class="fila">
  <div class="colu_1"><?PHP _ayuda('fecha_inicio');?>Fecha de inicio
  
  <?PHP
  if(isset($empleo['fecha_inicio'])):
  $empleo['fecha_inicio']=date('d/m/Y',strtotime($empleo['fecha_inicio']));
  endif;
  echo form_input('fecha_inicio',_e($empleo,'fecha_inicio'),' id="fecha_inicio" style=" width:75px;"');
  ?>  | Duración 
  
<input name="duracion" id="duracion" type="text" style="width:30px;" value="<?PHP echo _e($empleo,'duracion');?>" maxlength="2"> |
<?PHP
$duracion_tipo['']='Seleccione';
$duracion_tipo['dias']='dias';
$duracion_tipo['semanas']='Semanas';
$duracion_tipo['meses']='Meses';
$duracion_tipo['anio']='Años';

echo form_dropdown('duracion_tipo',$duracion_tipo,_e($empleo,'duracion_tipo'));

?>
  </div>
   <div class="colu_2">
   <?PHP 

    echo form_error('fecha_inicio');
   ?>
   <?PHP 

    echo form_error('duracion');
	    echo form_error('duracion_tipo');
   ?>
  </div>
  </div>
  
  
    <div class="fila">
  <div class="colu_1">

  </div>
   <div class="colu_2">
   
   
  </div>
  </div>
  
  
  

  
<input type="submit" value="Guardar" id="guardar"  class="boton"/>

  <script type="text/javascript" src="<?PHP echo base_url('js/jscripts/tiny_mce/tiny_mce.js');?>"></script>







<script type="text/javascript">


$(document).ready(function() {
 // $("#salario").val('<?PHP echo @_e($empleo,'salario'); ?>');
 
 jQuery(function($){
   $("input#fecha_inicio").mask("99/99/9999");
    $("input#duracion").mask("99");
   
});
});




	tinyMCE.init({







		



		mode : "exact",



        elements : "descripcion",

entity_encoding : "raw",

theme : "advanced",

    plugins : "autolink,maxchars,pagebreak,layer,table,contextmenu,paste,noneditable,wordcount,inlinepopups",


max_chars : 600,
max_chars_indicator : "lengthBox",


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

