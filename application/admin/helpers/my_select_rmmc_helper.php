<?PHP

/* Recibe un  resultado  e itera para formar un array */
function _crea_array($obj,$valor='ID',$label="titulo",$pre=false,$pos=false)
{
	$r=array();
	$r['']='Seleccione';
	foreach($obj->result_array() as $k => $v):
	$r[$v[$valor]]=$pre.$v[$label].$pos;
	endforeach;
	
	return $r;
	}