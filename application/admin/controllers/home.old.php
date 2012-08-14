<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


  function  __construct() {
        parent::__construct();        
    }

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
	
	function index()
	{
$tmp=$this->empleo->listar();
		$data['empleos']=$tmp[0];
		$data['paginacion']=$tmp[1];
		$data['content']=	$this->load->view('home/listar-empleos',$data,true);
		
		$this->load->view('panel',$data);
		}

	
	
	
	
	
	
	
	/* ------------------------------------------------------------------------------ */	
	function edada($str)
	{
		if($str>$this->input->post('edadb')):
		$this->form_validation->set_message('edada', 'El %s es mayor a la edad superior');
			return FALSE;
			else:
			return true;
		endif;
		
		}
		
	function borrar_empleo()
	{
		$empleos_id=$this->uri->segment(3);
		
		
		$w['estado']='borrado';
		$this->empleo->actualizar($empleos_id,$w);
		$this->native_session->set_flashdata('mensaje','La oferta de empleo fue borrada.');
		 redirect('home');
		}	
	function editar_empleo()
	{
		
		
	   $this->form_validation->set_rules('departamento', 'ciudad', 'required');		
	    $this->form_validation->set_rules('pais', 'pais', 'required');	
	    $this->form_validation->set_rules('nombre_empresa', 'Nombre de empresa', 'required');
		$this->form_validation->set_rules('titulo', 'Titulo del empleo', 'required');
	    $this->form_validation->set_rules('email_contacto', 'Email de contacto', 'required|valid_email');
	    $this->form_validation->set_rules('vacantes', 'vacantes', 'required|numeric|is_natural_no_zero');
	    $this->form_validation->set_rules('modalidades_ID', 'Modalidad del empleo', 'required|numeric');		

	 
	  		$this->form_validation->set_rules('email_asunto', 'Asunto en email', 'trim');	
	 
	    $this->form_validation->set_rules('experiencia', 'Tiempo de experiencia', 'numeric');				
		if(isset($_POST['experiencia']) && $_POST['experiencia']>0)
	    $this->form_validation->set_rules('experiencia_tipo', 'Tipo de experiencia', 'required');						
		
		
	    $this->form_validation->set_rules('edada', 'Rango de edades (edad inferior)', 'required|is_natural_no_zero|callback_edada');								
	    $this->form_validation->set_rules('edadb', 'Rango de edades (edad superior)', 'required|is_natural_no_zero');										
								
	    $this->form_validation->set_rules('sexo', 'genero', 'required');										
	    $this->form_validation->set_rules('salario_tipo', 'modena del salario', 'required');										
		
										
	    $this->form_validation->set_rules('salario_2', 'Tipo del salario', 'required');														
	    $this->form_validation->set_rules('descripcion', 'Descripcion del empleo', 'required');																

		if(isset($_POST['salario_2']) && $_POST['salario_2']==3):

		$this->form_validation->set_rules('salario', 'Monto del salario', 'required|numeric');												
		endif;		
		
						
	    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$data['usuario']=$tmp=$this->native_session->userdata('login_datos');	 
//		print_r($tmp);   

$empleo_ID=$data['empleo_ID']=$this->uri->segment(3);

	    if ($this->form_validation->run() == false)
	    {
			$data['empleo']=$this->empleo->get($empleo_ID)->row_array();
			
			
		
		
		
		$data['paises']=$this->pais();
		$t=(isset($_POST['pais']))?$_POST['pais']:$data['empleo']['pais'];
		$data['ciudades']=$this->ciudad($t);
			
			
			
			
			
			
			
			
			
	        $data['content'] = $this->load->view('home/editar_empleo', $data, true);
	        $this->load->view('panel', $data);
	    }
	    else
	    {
			$_POST['modificado']=ahora();
			
			
 $_POST['descripcion']=strip_tags($this->input->post('descripcion'),'<strong><p><b><br><i><ul><li><ol>');
			
			
			$_POST['titulo']=strip_tags($this->input->post('titulo',true));
	        $this->db->where('ID',$empleo_ID);
			$this->db->update('entradas',$_POST);
			$this->native_session->set_flashdata('mensaje','La oferta de empleo fue actualizada.');
	       // $register = $this->redux_auth->register($username, $password, $email);
	        redirect('home');
	     
	    }
	}
	
	
	
	
	
	
	
	
/* ------------------------------------------------------------------------------ */	
function fecha_fin($str)
{
	$tmp=explode('-',$str);

if(count($tmp)>2 && checkdate($tmp[1],$tmp[2],$tmp[0])):
$a=date('Y');
$b=date('m');
$c=date('d');


return TRUE;
else:
$this->form_validation->set_message('fecha_fin', 'El %s es incorrecto (2011-12-30)');
return FALSE;
endif;
	}
	
	function  pais()
	{
		$h=$this->db->get('country');

foreach($h->result_array() as $k => $v):
 $r[$v['ID'].':'.$v['nombre']]=$v['nombre'];
endforeach;

return $r;		
		}
		

function  ciudad($pais=167)
	{
		$h=$this->db->where('country_ID',$pais)->get('city');

$r=array(''=>'Seleccione ciudad');
foreach($h->result_array() as $k => $v):
 $r[$v['ID'].':'.$v['nombre']]=$v['nombre'];
endforeach;

return $r;		
		}		
		
		function ciudades()
		{
			$t=$this->uri->segment(3);
		
		
		$tmp=$this->ciudad($t);			
		
		echo '<label> Ciudad: '.form_dropdown('departamento',$tmp).'</label>';
		
		
			}
	function agregar()
	{
		
		$data['paises']=$this->pais();
		$t=(isset($_POST['pais']))?$_POST['pais']:'167';
		$data['ciudades']=$this->ciudad($t);
		
		
$this->form_validation->set_rules('nombre_empresa', 'Nombre de empresa', 'required');
		$this->form_validation->set_rules('titulo', 'Titulo del empleo', 'required');
	    $this->form_validation->set_rules('email_contacto', 'Email de contacto', 'required|valid_email');
	    $this->form_validation->set_rules('vacantes', 'vacantes', 'required|numeric|is_natural_no_zero');
	    $this->form_validation->set_rules('modalidades_ID', 'Modalidad del empleo', 'required|numeric');		

	    $this->form_validation->set_rules('experiencia', 'Tiempo de experiencia', 'required');	
		
		 $this->form_validation->set_rules('pais', 'pais', 'required');	
		  $this->form_validation->set_rules('departamento', 'ciudad', 'required');				
		  
		  
	    $this->form_validation->set_rules('experiencia_tipo', 'Tipo de experiencia', 'required');						
	    
		$this->form_validation->set_rules('email_asunto', 'Asunto en email', 'trim');								
		
	    $this->form_validation->set_rules('edada', 'Rango de edades (edad inferior)', 'required|is_natural_no_zero|callback_edada');								
	    $this->form_validation->set_rules('edadb', 'Rango de edades (edad superior)', 'required|is_natural_no_zero');										
								
	    $this->form_validation->set_rules('sexo', 'genero', 'required');	
		$this->form_validation->set_rules('estado', 'estado de la publicacion', 'required');										
	    $this->form_validation->set_rules('salario_tipo', 'moneda del salario', 'required');										

	    $this->form_validation->set_rules('salario_2', 'Tipo del salario', 'required');	
		if(isset($_POST['salario_2']) && $_POST['salario_2']==3):
		$this->form_validation->set_rules('salario', 'Monto del salario', 'required|numeric');												
		endif;												
	    $this->form_validation->set_rules('descripcion', 'Descripcion del empleo', 'required');	
	
		
		
		
	    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$data['usuario']=$tmp=$this->native_session->userdata('login_datos');	 
	//print_r($tmp);   
	    if ($this->form_validation->run() == false)
	    {
			$data['empleo']=array();
	        $data['content'] = $this->load->view('home/agregar-empleos', $data, true);
	        $this->load->view('panel', $data);
	    }
	    else
	    {
	     
	     $_POST['creado']=$_POST['modificado']=ahora();
		 $_POST['empleador_ID']=$tmp['ID'];   
		 $_POST['descripcion']=strip_tags($this->input->post('descripcion'),'<strong><p><b><br><i><ul><li><ol>');
			$_POST['titulo']=strip_tags($this->input->post('titulo',true));
	     $this->db->insert('entradas',$_POST);	        
	        redirect('home');
	    }
	}
	
/* ------------------------------------------------------------------------------ */		
	


	

	
	
	
	
		
			 
			 
			 
			 public function  publicado()
			 { $ofertas_id=$this->uri->segment(3);
			 $w['estado']='pendiente';
				 $this->empleo->actualizar($ofertas_id,$w);
				 
				
				 $this->native_session->set_flashdata('mensaje','Su oferta ha sido despublicada/ocultada.');
				
				 redirect('home');
				 }
			 
			 public function  pendiente()
			 { $ofertas_id=$this->uri->segment(3);
			 $w['estado']='publicado';
				$this->empleo->actualizar($ofertas_id,$w);
				
				 $this->native_session->set_flashdata('mensaje','Su oferta ha sido publicada.');
			
				 redirect('home');
				 
				 }
	
		
		
			function exportar()
			{
				$email_empresa=$this->uri->segment(3);
				$file_empresa=$this->uri->segment(4);
				$h=file_get_contents($file_empresa);
				
				$this->db->where('email_contacto',$email_empresa);
				$t=$this->db->limit(1)->get('empleador')->row_array();
				if(  isset($t['ID']) &&   ((int)$t['ID']>0)):
				$array=unserialize($h);
				$array['empleador_ID']=$t['ID'];
				unset($array['ID']);
				
				
				    $array['creado']=$array['modificado']=ahora();

		 $array['descripcion']=strip_tags($array['descripcion']);
			$array['titulo']=strip_tags($array['titulo']);
	     $this->db->insert('entradas',$array);	   
				
				
				
				
				
				
				else:
				 echo 'error';
				
				endif;
				
				
				
				
				}
		

		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */