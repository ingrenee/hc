<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subdominios extends CI_Controller {

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
		
		$subdominio=$this->db->where('ruc',$info['ruc'])->get('subdominios');
	
		if($subdominio->num_rows()>0):
		$data['subdominio']=$subdominio->row_array();
		else:
		$data['subdominio']=false;
		endif;
		
		

$this->load->library('form_validation');

	
$this->form_validation->set_rules('web', 'Web institucional', 'trim|required');	
	$this->form_validation->set_rules('subdominio', 'nombre de subdominio', 'trim|required');
		$this->form_validation->set_rules('acepta', 'condicion', 'trim|required');



	
	
	

			
		
		
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


		if ($this->form_validation->run() == true):
		
	
$emp['modificado']=ahora();
$emp['website']=$_POST['web'];
$tmp=$this->empresas->actualizar($emp);		

$sub['creado']=ahora();
$sub['ruc']=$info['ruc'];
$sub['estado']='pendiente';
$sub['nombre']=$_POST['subdominio'];
$sub['acepta']=$_POST['acepta'];
$sub['empleador_ID']=$info['ID'];


$num=$this->db->where('ruc',$info['ruc'])->get('subdominios')->num_rows();

if($num>0):
$this->db->where('ruc',$info['ruc'])->where('estado','pendiente')->update('subdominios',$sub);
else:
$this->db->insert('subdominios',$sub);
endif;


	$this->native_session->set_flashdata('mensaje','Se actualizaron sus datos.');
	$this->sucesos->guardar('Subdominio-peticion',$data['info']['ruc'].'-'.$data['info']['nombre'].'-'.$info['email_contacto']);
	redirect('subdominios/index');
		else:
	
	
		
		$data['content']=	$this->load->view('subdominios/index',$data,true);
		$this->load->view('panel',$data);
		
	
		endif;
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

	}
	

	
	
	

		
}