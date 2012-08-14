<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Feedback extends CI_Controller {





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

	

function preguntas()
{
$data=array();
$this->form_validation->set_rules('asunto', 'pregunta', 'trim|required');		


$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
if ($this->form_validation->run() == false):
$data['content']=	$this->load->view('feedback/preguntas',$data,true);
$this->load->view('panel',$data);
else:
$this->_guardar('pregunta');
redirect('feedback/listar_preguntas');
endif;
}
function animos()
{
$data=array();
$this->form_validation->set_rules('sugerencia', 'contenido', 'trim|required');		


$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
if ($this->form_validation->run() == false):
$data['content']=	$this->load->view('feedback/animos',$data,true);
$this->load->view('panel',$data);
else:
$this->_guardar('animo');
redirect('feedback/listar_animos');
endif;
}


function sugerencias()
{
$data=array();
$this->form_validation->set_rules('asunto', 'asunto', 'trim|required');		
//$this->form_validation->set_rules('pais', 'pais', 'required');	
$this->form_validation->set_rules('sugerencia', 'sugerencia', 'trim|required');
$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
if ($this->form_validation->run() == false):
$data['content']=	$this->load->view('feedback/sugerencias',$data,true);
$this->load->view('panel',$data);
else:
$this->_guardar();
redirect('feedback/listar_sugerencias');
endif;
}

function _guardar($tipo='sugerencia')
{
$tmp=$this->native_session->userdata('login_datos');	 

$q=$_POST;
$q['empleador_ID']=$tmp['ID'];
$q['email']=$tmp['email_contacto'];
$q['nombre']=$tmp['nombre'];
$q['encargado']=$tmp['encargado'];


$q['creado']=ahora();
$q['tipo']=$tipo;
$this->db->insert('feedback',$q);	
	}


function listar_sugerencias()
{
$data['filas']=$this->_listar();
$data['content']=	$this->load->view('feedback/listar_sugerencias',$data,true);
$this->load->view('panel',$data);
	}
	
function listar_preguntas()
{
$data['filas']=$this->_listar('pregunta');
$data['content']=	$this->load->view('feedback/listar_preguntas',$data,true);
$this->load->view('panel',$data);
	}
	
function listar_animos()
{
$data['filas']=$this->_listar('animo');
$data['content']=	$this->load->view('feedback/listar_animos',$data,true);
$this->load->view('panel',$data);
	}	
	
		





function _listar($tipo='sugerencia')
{
	$w['tipo']=$tipo;
	$tmp=$this->native_session->userdata('login_datos');
	$w['empleador_ID']=$tmp['ID'];
	$r=$this->db->limit(20)->order_by('creado','desc')->get_where('feedback',$w);
	
	return $r;
	}


	

	

	

		

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */