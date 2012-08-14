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

	

	function index()

	{


$data=array();




	   $this->form_validation->set_rules('asunto', 'asunto', 'trim|required');		

	    //$this->form_validation->set_rules('pais', 'pais', 'required');	

	    $this->form_validation->set_rules('sugerencia', 'sugerencia', 'trim|required');

	

		

						

	    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');







	    if ($this->form_validation->run() == false):





		$data['content']=	$this->load->view('sugerencias/index',$data,true);

		

		$this->load->view('panel',$data);
else:

$tmp=$this->native_session->userdata('login_datos');	 

$_POST['empresas_ID']=$tmp['ID'];
$_POST['email']=$tmp['email_contacto'];
$_POST['nombre']=$tmp['nombre'];
$_POST['encargado']=$tmp['encargado'];
$_POST['creado']=ahora();
$_POST['tipo']='sugerencia';
endif;

		}





	

	

	

		

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */