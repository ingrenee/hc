<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogfast extends CI_Controller {

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
	public function index()
	{
			



		$tmp=$this->login_auth->data();
		
$this->form_validation->set_rules('estado', 'estado', 'trim|required');			
$this->form_validation->set_rules('titulo', 'titulo', 'trim|required');	
	$this->form_validation->set_rules('autor', 'autor', 'trim|required');	
	$this->form_validation->set_rules('descripcion', 'contenido', 'trim|required');	

    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	
		
		 if ($this->form_validation->run() == false):
	$data['info']=array();
		 $data['content'] = $this->load->view('blogfast/agregar', $data, true);
		 $this->load->view('panel', $data);
		 else:
		 
		 $_POST['creado']=ahora();
		 $_POST['usuario_ID']=$tmp['ID'];
		 $_POST['empresa_ID']=$tmp['ruc'];
		 $_POST['descripcion']=strip_tags($this->input->post('descripcion',true),'<a><p><span><ul><li><ol><b><i><strong><table><tr><td><th><tbody><thead><tfoot><caption>');
		 
		 
		 $this->load->library('blogfast_entradas');
		 $this->blogfast_entradas->agregar($_POST);
		 _set_mensajes('Se agrego correctamente la publicación.',true);
		 redirect('blogfast/listar');
		 endif;
		
			
		
		

	}
	
	public function editar()
	{
			


		$id=$this->uri->segment(3);
		$tmp=$this->login_auth->data();
		
$this->form_validation->set_rules('estado', 'estado', 'trim|required');			
$this->form_validation->set_rules('titulo', 'titulo', 'trim|required');	
	$this->form_validation->set_rules('autor', 'autor', 'trim|required');	
	$this->form_validation->set_rules('descripcion', 'contenido', 'trim|required');	

    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	
		 $this->load->library('blogfast_entradas');
		 if ($this->form_validation->run() == false):


		//$w['usuario_ID']=$tmp['ID'];
		//$w['ID']=$id;

		$info=$this->blogfast_entradas->obtener_uno($id);
		 if(isset($info) && ($info['usuario_ID']==$tmp['ID'])):
		 $data['info']=$info;
		 $data['content'] = $this->load->view('blogfast/editar', $data, true);
		 else:
		 _set_mensajes('No tienes permisos para modificar la publicacion['.$id.']');
//		 $data['content'] = $this->load->view('blogfast/sin_permiso', NULL, true);
redirect('blogfast/listar');
		 endif;
		 $this->load->view('panel', $data);
		 else:
		 
		 $_POST['modificado']=ahora();
		 $_POST['usuario_ID']=$tmp['ID'];
		 $_POST['empresa_ID']=$tmp['ruc'];
	 $_POST['descripcion']=strip_tags($this->input->post('descripcion',true),'<a><p><span><ul><li><ol><b><i><strong><table><tr><td><th><tbody><thead><tfoot><caption>');
		 
		 
		
		 $this->blogfast_entradas->actualizar($id,$_POST);
		 _set_mensajes('Se editó correctamente la publicación.',true);
		 redirect('blogfast/listar');
		 endif;
		
			
		
		

	}
	
	function listar()
	{
		$tmp=$this->login_auth->data();
		 $this->load->library('blogfast_entradas');
		//$w['estado']='publicado';
		$w['empresa_ID']=$tmp['ruc'];
		
		$temp=$this->blogfast_entradas->obtener_todos($w,3,'blogfast/listar');
		
		$data['filas']=$temp[0];
		$data['paginacion']=$temp[1];		
		$data['total']=$temp[2];		
		 $data['content'] = $this->load->view('blogfast/listar', $data, true);
		 $this->load->view('panel', $data);
		}



function subir_imagen()
{
	
	$id=$this->uri->segment(3);
	
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
			$error['id']=$id;
			$data['content']=$this->load->view('blogfast/subri_imagen', $error,true);
		}
		else
		{
			
			$file=$this->upload->data();
		
	
			$config['source_image'] = $file['full_path'];
$config['new_image'] = $file['file_path'].'/contenido_'.md5($tmp['id']).'.jpg';
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
	
	
public function portada()
	{
			


		$id=$this->uri->segment(3);
		$portada=$this->uri->segment(4);
		$tmp=$this->login_auth->data();
		

		 $this->load->library('blogfast_entradas');
	


		//$w['usuario_ID']=$tmp['ID'];
		//$w['ID']=$id;

		$info=$this->blogfast_entradas->obtener_uno($id);
		 if(isset($info) && ($info['usuario_ID']==$tmp['ID'])):
		 
		$_POST['modificado']=ahora();
		
		$valor=($portada=='si')?'no':'si';
		
		 $_POST['portada']=$valor;
		
		 
		 
		
		 $this->blogfast_entradas->actualizar($id,$_POST);
		 _set_mensajes('La publicación '.$valor.' se mostrara en la portada.',true);
		 redirect('blogfast/listar');
		
		 else:
		 _set_mensajes('No tienes permisos para modificar la publicacion['.$id.']');
//		 $data['content'] = $this->load->view('blogfast/sin_permiso', NULL, true);
redirect('blogfast/listar');
		 
		 
		 
		 endif;
		
			
		
		

	}	


public function estado()
	{
			


		$id=$this->uri->segment(3);
		$portada=$this->uri->segment(4);
		$tmp=$this->login_auth->data();
		

		 $this->load->library('blogfast_entradas');
	


		//$w['usuario_ID']=$tmp['ID'];
		//$w['ID']=$id;

		$info=$this->blogfast_entradas->obtener_uno($id);
		 if(isset($info) && ($info['usuario_ID']==$tmp['ID'])):
		 
		$_POST['modificado']=ahora();
		
		$valor=($portada=='publicado')?'pendiente':'publicado';
		
		 $_POST['estado']=$valor;
		
		 
		 
		
		 $this->blogfast_entradas->actualizar($id,$_POST);
		 _set_mensajes('La publicación esta '.$valor.' .',true);
		 redirect('blogfast/listar');
		
		 else:
		 _set_mensajes('No tienes permisos para modificar la publicacion['.$id.']');
//		 $data['content'] = $this->load->view('blogfast/sin_permiso', NULL, true);
redirect('blogfast/listar');
		 
		 
		 
		 endif;
		
			
		
		

	}	


		public function borrar()
	{
			


		$id=$this->uri->segment(3);
		$portada=$this->uri->segment(4);
		$tmp=$this->login_auth->data();
		

		 $this->load->library('blogfast_entradas');
	


		//$w['usuario_ID']=$tmp['ID'];
		//$w['ID']=$id;

		$info=$this->blogfast_entradas->obtener_uno($id);
		 if(isset($info) && ($info['usuario_ID']==$tmp['ID'])):
		
		
		 
		 
		
		 $this->blogfast_entradas->borrar($id);
		 _set_mensajes('La publicación '.$id.' fue borrada.',true);
		 redirect('blogfast/listar');
		
		 else:
		 _set_mensajes('No tienes permisos para modificar la publicacion['.$id.']');
//		 $data['content'] = $this->load->view('blogfast/sin_permiso', NULL, true);
redirect('blogfast/listar');
		 
		 
		 
		 endif;
		
			
		
		

	}	
function configurar()
{$data=array();

$tmp=$this->login_auth->data();
				
		
		
				
$this->form_validation->set_rules('mostrar_noticias', 'titulo', 'trim|required');	
	

    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	
		
		 if ($this->form_validation->run() == false):
		 
		 
		 $this->db->where('ruc',$tmp['ruc']);
		$this->db->where('opcion','widget_noticias');		
		$tmp=$this->db->get('config_empresa')->row_array();
		 $data['info']=@unserialize($tmp['valor']);
		//print_r($data['info']);
		 $data['content'] = $this->load->view('blogfast/configurar', $data, true);
		 $this->load->view('panel', $data);
		 
		 else:
	//	 $this->db->where('ruc',$tmp['ruc']);
//		$this->db->where('opcion','widget_noticias');
		$w['ruc']=$tmp['ruc'];
		$w['opcion']='widget_noticias';		
		$w['valor']=serialize($_POST);
		$w['opcion']='widget_noticias';
		$w['ruc']=$tmp['ruc'];
		$this->db->replace('config_empresa',$w);
		if($tmp['tipo']=='interno'):
		$sub=$this->db->where('ID',$tmp['ruc'])->get('subdominios_base')->row_array();
			
		_hcache('http://'.$sub['nombre'].'.hayempleo.com/');
	_hcache(base_url('subdominios/'.$sub['nombre'].'/').'/');
		endif;
		
		_set_mensajes('Se guardo la  configuracion.',true);
		
		redirect('blogfast/configurar');
		 endif;
		
		
		
		
		
		
		
	}
	
	function leer()
	{
		
		$id=$this->uri->segment(3);

$tmp=$this->login_auth->data();
		 $this->load->library('blogfast_entradas');
		


		//$w['usuario_ID']=$tmp['ID'];
		//$w['ID']=$id;
$w['empresa_ID']=999999;
$w['estado']='publicado';

$data['tmp']=$this->blogfast_entradas->obtener_todos($w,4);
		$data['info']=$this->blogfast_entradas->obtener_uno($id);
		$this->sucesos->guardar('LeyendoNota['.$id.':'.$data['info']['titulo'].']',$tmp['ID'].':'.$tmp['ruc'].':'.$tmp['email_contacto']);
		$data['content'] = $this->load->view('blogfast/leer', $data, true);
		 $this->load->view('panel', $data);
		}

}