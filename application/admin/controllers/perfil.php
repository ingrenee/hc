<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function editar()
	{
			$tmp=$this->db->get('rubros');

foreach($tmp->result_array() as $k => $v):
$rubros[$v['ID']]=$v['rubro']; 
endforeach;



		$tmp=$this->login_auth->data();
		
		
		
		
		$data['info_empleador']=$info=$this->empleador->get_array($tmp['ID']);
		
		/*Si la empresa no existe la creamos*/
		
		$empresas=$this->db->where('ruc',$info['ruc'])->get('empresas');
		if($empresas->num_rows()>0):
		$data['info']=$empresas->row_array();
		else:
		$up['ruc']=$info['ruc'];
		$up['nombre']=$info['nombre'];
		$up['creado']=ahora();
		$up['rubro']=$info['rubro'];
		$up['website']=$info['website'];
		$up['descripcion']=$info['descripcion'];
		$up['direccion']=$info['direccion'];
		$up['pais']=$info['pais'];				
		$up['departamento']=$info['departamento'];
		$up['distrito']=$info['distrito'];	
		
		$this->empresas->agregar($up);		
		$data['info']=$up;
		endif;
		
		/**/
		
		
		$data['rubros']=$rubros;
		
		
		
		
		
		

$this->load->library('form_validation');

	

	$this->form_validation->set_rules('nombre', 'nombre de la empresa', 'required');



	$this->form_validation->set_rules('telefono', 'telefono', 'trim|required|numeric');	
	$this->form_validation->set_rules('rubro', 'rubro', 'required');				
	$this->form_validation->set_rules('direccion', 'direccion', 'required');	
	$this->form_validation->set_rules('descripcion', 'direccion', 'required');					
					
	$this->form_validation->set_rules('encargado', 'nombre de contacto', 'required');					
    $this->form_validation->set_rules('cargo', 'cargo en la empresa', 'required');	

	

			
		
		
		
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');


		if ($this->form_validation->run() == true):
		
		$empleador['encargado']=$_POST['encargado'];
		$empleador['cargo']=$_POST['cargo'];
		$empleador['nombre']=$_POST['nombre'];		
		
		unset($_POST['encargado']);
		unset($_POST['cargo']);		
		$_POST['modificado']=ahora();
$tmp=$this->empresas->actualizar($_POST);		
$tmp=$this->empleador->actualizar($empleador);
	$this->native_session->set_flashdata('mensaje','Se actualizaron sus datos.');
	$this->sucesos->guardar('update perfil',$data['info']['ruc'].'-'.$data['info']['nombre']);
	redirect('perfil/editar');
		else:
	
	
		
		$data['content']=	$this->load->view('perfil/index',$data,true);
		$this->load->view('panel',$data);
		
	
		endif;
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

	}
	

public function verifica_pass($p)
{
		$tmp=$this->login_auth->data();
		
		$this->form_validation->set_message('verifica_pass', 'La clave ingresada no es la correcta.');
	if($p==$tmp['pass'])
	return true;
	else
	return false;
	
	}
	
	
function t()
{
	$t=$this->db->get('country');
	

foreach($t->result_array() as $k => $v):

$this->db->where('countrycode',$v['code']);
$this->db->update('city',array('country_ID'=>$v['ID']));

 endforeach;


	
	}

	public function cambiar()
	{


		

		$this->load->library('form_validation');

	

	$this->form_validation->set_rules('pass', 'clave actual ', 'trim|required|callback_verifica_pass');
	$this->form_validation->set_rules('pass_b', 'clave nueva ', 'trim|required|matches[re]');
	$this->form_validation->set_rules('re', 'repetir clave nueva ', 'trim|required');


	

			
		
		
		
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');


		if ($this->form_validation->run() == true):
		$_POST['pass']=$_POST['pass_b'];
		unset($_POST['pass_b'],$_POST['re']);
		
		$_POST['modificado']=ahora();
		
		
$tmp=$this->empleador->actualizar($_POST);
	$this->native_session->set_flashdata('mensaje','Se actualizaron sus datos.');
	
	$this->sucesos->guardar('Cambio clave',$_POST['pass']);
	
	redirect('perfil/cambiar');
		else:
	
	
		$data=array();
		$data['content']=	$this->load->view('perfil/cambiar',$data,true);
		$this->load->view('panel',$data);
		
	
		endif;
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

	}
	
	
	
	function buscar()
	{
		$t=$this->db->select('ID,md5(ID) as id2,ruc,email_contacto,pass')->get('empleador');
		
		foreach($t->result_array() as $k => $v):
		
		if(file_exists('uploads/logo_'.md5($v['ID']).'.jpg')):
		 echo $v['id2'].'-'.md5($v['ruc']).'-'.$v['email_contacto'].'-'.$v['pass'].'||<br />
';
rename('uploads/logo_'.md5($v['ID']).'.jpg','uploads/logo_'.md5($v['ruc']).'.jpg');
		endif;
		
		endforeach;
		
		
		}
	
	function  logo()

{
	$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|gif|png';
		$config['max_size']	= '900';
		$config['max_width']  = '2024';
		$config['max_height']  = '1768';
		$config['overwrite']  = true;
		$tmp=$this->login_auth->data();

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$error['id']=$tmp['ruc'];
			$data['content']=$this->load->view('perfil/logo', $error,true);
		}
		else
		{
			
			$file=$this->upload->data();
		
	
			$config['source_image'] = $file['full_path'];
$config['new_image'] = $file['file_path'].'/logo_'.md5($tmp['ruc']).'.jpg';
$config['create_thumb'] = false;
$config['maintain_ratio'] = TRUE;
$config['width'] = 90;
$config['height'] = 180;
			
$this->load->library('image_lib', $config);

$this->image_lib->resize();
			
			unlink($file['full_path']);
			
			
			
			
			$data = array('upload_data' => $this->upload->data());
$data['id']=$tmp['ruc'];
			$data['content']=$this->load->view('perfil/logo_mensajes', $data,true);
			
			
			$this->sucesos->guardar('Sube logo',$tmp['ruc']);
		}
		$this->load->view('panel', $data);
	
	}


/*----------------------------------*/
function  banner()

{
	$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|gif|png';
		$config['max_size']	= '900';
		$config['max_width']  = '2024';
		$config['max_height']  = '1768';
		$config['overwrite']  = true;
		$tmp=$this->login_auth->data();

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$error['id']=$tmp['ruc'];
			$data['content']=$this->load->view('perfil/banner', $error,true);
		}
		else
		{
			
			$file=$this->upload->data();
		
	
			$config['source_image'] = $file['full_path'];
$config['new_image'] = $file['file_path'].'/banner_'.md5($tmp['ruc']).'.jpg';
$config['create_thumb'] = false;
$config['maintain_ratio'] = TRUE;
//$config['width'] = 90;
//$dim=getimagesize($config['source_image']);

//$config['width']=round($dim[0]*180/$dim[1]);
//$config['height'] = 180;
			
$this->load->library('image_lib', $config);

$this->image_lib->resize();
			
			unlink($file['full_path']);
			
			
			
			
			$data = array('upload_data' => $this->upload->data());
$data['id']=$tmp['ruc'];
			$data['content']=$this->load->view('perfil/banner_mensajes', $data,true);
			
			$this->sucesos->guardar('Sube banner',$tmp['ruc']);
		}
		$this->load->view('panel', $data);
	
	}




	
	
	

		
}