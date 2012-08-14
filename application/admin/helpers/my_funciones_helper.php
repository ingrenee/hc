<?PHP

function _cortar($texto)

{

	$MaxLENGTH=200;

	

	$texto=strip_tags($texto);

	return substr($texto,0,strrpos(substr($texto,0,$MaxLENGTH)," "));

	

	}

function _hcache($url)
{  
	 $url=md5($url);
	 
	if(file_exists('./application/subdominios/cache/'.$url)):
	@unlink('./application/subdominios/cache/'.$url);
	@unlink('./application/web/cache/'.$url);
	
	endif;
	}
function _path()
{
	if($_SERVER['HTTP_HOST']!='127.0.0.1'):

$path='http://www.hayempleo.com/';

else:

$path='http://127.0.0.1/Bolsa2011/sistema/';

endif;
 return $path;
	}
function tiempo_detalle($timestamp)
{
	$return="";
	# Obtenemos el numero de dias
	$days=floor((($timestamp/60)/60)/24);
	if($days>0)
	{
		$timestamp-=$days*24*60*60;
		$return.=$days." días ";
	}
	# Obtenemos el numero de horas
	$hours=floor(($timestamp/60)/60);
	if($hours>0)
	{
		$timestamp-=$hours*60*60;
		$return.=str_pad($hours, 2, "0", STR_PAD_LEFT).":";
	}else
		$return.="00:";
	# Obtenemos el numero de minutos
	$minutes=floor($timestamp/60);
	if($minutes>0)
	{
		$timestamp-=$minutes*60;
		$return.=str_pad($minutes, 2, "0", STR_PAD_LEFT).":";
	}else
		$return.="00:";
	# Obtenemos el numero de segundos
	$return.=str_pad($timestamp, 2, "0", STR_PAD_LEFT);
	return $return;
}

function aplana($arr)
{	$j='';
	foreach($arr as $k => $v):
	$j.='-'.$v.'-';
	endforeach;
	return $j;
	}
	
	function desaplana($str)
	{
		$arr=explode('--',$str);
		
$arr[0]=str_replace('-','',$arr[0]);
$k=count($arr)-1;
$arr[$k]=str_replace('-','',$arr[$k]);
return $arr;
		
		}

function _vista($t)
{
return $t;
	}

function _e($t=false,$c=false)
{
	 
	
	if(isset($t[$c])):
	 return $t[$c];
	 else:
	 return set_value($c);
	endif;
	}
function ahora()
{
	return date('Y-m-d H:i:s');
	}
	
	
	function _imagen($t,$pre='logo_')
	{
		
		echo '<img src="'.base_url('uploads/'.$pre.md5($t).'.jpg?'.rand(0,9999999)).'">';
		}
function _foto($id)
{
	 $imagen=('./usuarios/fotos/usuario_'.md5($id).'.jpg');

	 if(file_exists($imagen)):

	 echo base_url('./usuarios/fotos/usuario_'.md5($id).'.jpg?'.rand(9,99999));

	 else:

//	 echo $imagen;

	 echo base_url('./usuarios/fotos/hayempleo.png');

	 endif;
	}
