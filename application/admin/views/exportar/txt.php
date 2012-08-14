<h1>Oferta de empleo</h1>

...............................................................................

Empresa Solicitante :<?PHP echo $empleo['nombre_empresa'];?>

...............................................................................

Ubicación :<?PHP if(!isset($_POST['departamento'])):?><?PHP if(@$empleo['departamento']):?>Ciudad :<?PHP  $tmp=explode(':',$empleo['departamento']); echo $tmp[1];?><?PHP else: ?><?PHP endif;?><?PHP else:?><?PHP endif;?>

................................................................................

Título del Puesto : <?PHP echo _e($empleo,'titulo');//$empleo["titulo"];?><?PHP 
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

...............................................................................

Categoria del empleo : <?PHP
   //print_r($_POST['categoria']);
  $arr2=_e($empleo,'categoria');
 
 if(isset($empleo['categoria'])):
 $arr2=desaplana($empleo['categoria']);
 elseif(isset($_POST['categoria'])):
 $arr2=$_POST['categoria'];
 else:
 $arr2=array();
 endif;
 
   foreach($arr as $k => $v): if($k==8): endif;
   $ch='';
   if(in_array($k,$arr2)):

?><li>*<?PHP  echo $v.' | '; ?></li>
<?PHP
    endif; endforeach;?>

...............................................................................

Vacantes :[<?PHP echo _e($empleo,'vacantes');?>]

...............................................................................

Modalidad de Empleo :<?PHP  if((int)$empleo['modalidades_ID']==1):?>Tiempo Completo<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==2):?>Medio Tiempo<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==3):?>Por horas<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==4):?>Desde Casa<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==5):?>Por Proyectos<?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==6):?>Prácticas Pre-Profesionales <?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==7):?>Bolsa UNMSM <?PHP endif;?>
  <?PHP  if((int)$empleo['modalidades_ID']==8):?>Pr&aacute;cticas Profesionales : Egresado  <?PHP endif;?>
<?PHP  if((int)$empleo['modalidades_ID']==9):?>Pr&aacute;cticas Profesionales <?PHP endif;?>

..............................................................................

Sexo : <?PHP  echo @$empleo["sexo"];?> 

...............................................................................

Salario :S/. <?PHP  echo  _e($empleo,"salario");?>

...............................................................................

Descripción: <?PHP  echo _e($empleo,'descripcion');?>

...............................................................................

Email de contacto :<?PHP echo _e($empleo,'email_contacto');?>

...............................................................................

Asunto en el email :<?PHP echo _e($empleo,'email_asunto');?>

...............................................................................

______________________________________________________

<p style="color: #999;">
Documento creado a través de <a  style="color: #06C;"href="http://www.hayempleo.com">HayEmpleo.com</a> - <?PHP echo date('Y');?></p>

