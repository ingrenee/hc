<html>
<head>
<link rel="stylesheet" type="text/css"  href="<?PHP echo base_url('css/word.css');?>" />
</head>
<body>
<div  class="contenido"><h1>Oferta de empleo</h1>
    <div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

      <div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>Empresa Solicitante :</div>

      <div class="colu_2"><?PHP echo utf8_decode($empleo['nombre_empresa']);?>

       

      </div>

    </div>

    <div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

      <div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>Ubicaci&oacute;n :</div>

      <div class="colu_2">

   <input  name="pais"  type="hidden"value="167:Peru">

 

 

 

 <span id="ciudad">



 <?PHP if(!isset($_POST['departamento'])):?>

 <?PHP if(@$empleo['departamento']):?>

  <label>Ciudad :<?PHP  $tmp=explode(':',$empleo['departamento']); echo $tmp[1];?></label>

  <?PHP else: ?>



  <?PHP endif;?>

 <?PHP else:?>       

 

 <?PHP endif;?>

 </span>

 

     

      </div>

    </div>

    <div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

  <div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>T&iacute;tulo del Puesto :</div>



<div class="colu_2">
<?PHP echo utf8_decode(_e($empleo,'titulo'));//$empleo["titulo"];?>
  

</div>



</div>





<?PHP 

//$arr['']='seleccione';

$arr[1]='Administraci&oacute;n/Oficina';

$arr[2]='Arte/Dise&ntilde;o/Medios';

$arr[3]='Cient&iacute;fico/Investigaci&oacute;n';

$arr[4]='Inform&aacute;tica/Telecom.';

$arr[5]='Direcci&oacute;n/Gerencia';

$arr[6]='Econom&iacute;a/Contabilidad';

$arr[7]='Educaci&oacute;n/Universidad';

$arr[8]='Hosteler&iacute;a/Turismo';

$arr[9]='Ingenier&iacute;a/T&eacute;cnico';

$arr[10]='Legal/Asesor&iacute;a';

$arr[11]='M&aacute;rketing/Ventas';

$arr[12]='Medicina/Salud';

$arr[13]='Recursos Humanos';

$arr[14]='Otros';



?>



<div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

  <div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>Categoria del empleo :</div>



<div class="colu_2">
<ul>
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
   <?PHP if($k==8):?>
  
   <?PHP endif;?>
     <?PHP 
   $ch='';
   if(in_array($k,$arr2)):

?>
<li>
<?PHP  echo $v; ?>
  </li>
  <?PHP
    endif;?>

  
  <?PHP endforeach;?>


  <?PHP //echo form_dropdown('categoria',$arr,_e($empleo,'categoria'));?>

   
</ul>
</div>



</div>































<div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

  <div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>Vacantes :</div>



<div class="colu_2">[<?PHP echo _e($empleo,'vacantes');?>]

 

    

</div>

</div>







<div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

<div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>Modalidad de Empleo :</div>



<div class="colu_2">



  

  

  <?PHP  if((int)$empleo['modalidades_ID']==1):?>
Tiempo Completo
<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==2):?>Medio Tiempo
  <?PHP endif;?>

  <?PHP  if((int)$empleo['modalidades_ID']==3):?>Por horas 
<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==4):?>Desde Casa 
<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==5):?>Por Proyectos 
<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==6):?>Pr&aacute;cticas Pre-Profesionales 
<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==7):?>Bolsa UNMSM <?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==8):?>Pr&aacute;cticas Profesionales : Egresado  <?PHP endif;?>

  <?PHP  if((int)$empleo['modalidades_ID']==9):?>Pr&aacute;cticas Profesionales <?PHP endif;?>



    



</div>



</div>







































<div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

<div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>Sexo :</div>



<div class="colu_2">


             

          <?PHP  echo @$empleo["sexo"];?> 

    

 

</div>


</div>










<div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

<div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>Salario :</div>



<div class="colu_2">
S/. <?PHP  echo  _e($empleo,"salario");?>
 </div>

</div>







<div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

<div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;' >Descripci&oacute;n: <br />
</div>





<div class="colu_2">
<?PHP  echo _e($empleo,'descripcion');?>
</div>

    



</div>

<div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

  <div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>Email de contacto :</div>



<div class="colu_2"><?PHP 

		

		echo _e($empleo,'email_contacto');

		

		?>

 </div>

</div>






<div class="fila2"   style='display: block;
	width: 100%;
	overflow: hidden;
	padding-top: 10px;
	padding-bottom: 10px;
	border-top-width: 2px;
	border-right-width: 2px;
	border-bottom-width: 2px;
	border-left-width: 2px;
	border-bottom-style: dotted;
	border-top-color: #CCC;
	border-right-color: #CCC;
	border-bottom-color: #CCC;
	border-left-color: #CCC;'>

  <div class="colu_1"    style='	font-weight: bold;
	font-variant: normal;
	display: block;
	float: left;
	width: 20%;'>Asunto en el email :</div>



<div class="colu_2">
<?PHP 

		

		echo utf8_decode(_e($empleo,'email_asunto'));

		

		?>
  </div>

</div>



<div class="fila3"><p style="color: #999;">
Documento creado a trav&eacute;s de <a  style="color: #06C;"href="http://www.hayempleo.com">HayEmpleo.com</a> - <?PHP echo date('Y');?></p></div>









  

  

  

  </div>

 
</body>
<html>