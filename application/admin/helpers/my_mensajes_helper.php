<?PHP

function _mensajes()
{
	$ci= &get_instance();
	
	$t=$ci->native_session->flashdata('mensaje');
	$tipo=$ci->native_session->flashdata('mensaje_tipo');	
	if($t):
	
	if(!$tipo):
	$tipo="error";
	endif;
	
	echo '<div class="mensaje_sistema '.$tipo.'">';
	echo $t;
	echo '</div>';
	
	endif;
	}
	
	function _set_mensajes($t,$tipo=false)
	{$ci= &get_instance();
		$ci->native_session->set_flashdata('mensaje',$t);
		if($tipo):
		$tipo='correcto';
		else:
		$tipo='error';
		endif;
		$ci->native_session->set_flashdata('mensaje_tipo',$tipo);		
		}
	
function _ayuda($id)
{

 echo '<a href="javascript:TINY.box.show({url:\''.base_url('ayuda/'.$id).'.php\',width:300,height:150})" class=ayuda>&nbsp;</a>';
	}	