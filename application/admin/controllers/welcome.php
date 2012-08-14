<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Welcome extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/
	 
	 
	 
	 
	 
	 
	 
	 
	 	  function email_3($str)
	 {

		 $t=$this->db->where('email_contacto',$str)->get('empleador');
		
		 if($t->num_rows()<=0):
		 $this->form_validation->set_message('email_3', 'El email no existe.');		 
		 return false;
		 else:
		 
		 $tmp=$t->row_array();
		 
		 //   echo 45;
		 if($tmp['estado']=='pendiente'):
		 //$this->form_validation->set_message('email', 'Tu cuenta aun no ha sido activada. Revisa tu bandeja de entrada o carpeta de spam.');		 
		 $num_reenvios=$this->native_session->userdata('num_reenvios')+1;
		 if($num_reenvios<10):
		 $this->native_session->set_userdata('num_reenvios',$num_reenvios);
		 $this->native_session->set_userdata('email_reenvio',$str);
		
		 
		 redirect('../registro/reenvio_activacion');
		 else:
		 $this->form_validation->set_message('email_3', 'Tu cuenta aun no ha sido activada. Revisa tu bandeja de entrada o carpeta de spam. Intenta m&aacute;s tarde.');	
		 return false;
		 endif;
		 
		 
		 
		 elseif($tmp['estado']=='activado'):
		return true;
		 elseif($tmp['estado']=='bloqueado'):
		 $this->form_validation->set_message('email_3', 'Tu cuenta ha sido inhabilitada.');		 
		 return false;
		 endif;
		 
		 endif;

		 }
	 
	 
	function index()
	{
		redirect('welcome/status');
	}
	
	/**
	 * activate
	 * doesn't currently work
	 *
	 * @return void
	 * @author Mathew
	 **/
	function activate()
	{
	    $this->form_validation->set_rules('code', 'Verification Code', 'required');
	    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	    
	    if ($this->form_validation->run() == false)
	    {
	        $data['content'] = $this->load->view('activate', null, true);
	        $this->load->view('template', $data);
	    }
	    else
	    {
	        $code = $this->input->post('code');
			echo $code;
			
			$activate = $this->redux_auth->activate($code);
		    
			if ($activate)
			{
				$this->native_session->set_flashdata('message', '<p class="success">Your Account is now activated, please login.</p>');
	            redirect('welcome/activate');
			}
			else
			{
				$this->native_session->set_flashdata('message', '<p class="error">Your account is already activated or doesn\'t need activating.</p>');
	            redirect('welcome/activate');
			}
	    }
	}
	
	/**
	 * register
	 *
	 * @return void
	 * @author Mathew
	 **/
	function register()
	{
	    $this->form_validation->set_rules('username', 'Nombre de usuario', 'required|callback_username_check');
	    $this->form_validation->set_rules('email', 'Email ', 'required|callback_email_check|valid_email');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	    
	    if ($this->form_validation->run() == false)
	    {
	        $data['content'] = $this->load->view('register', null, true);
	        $this->load->view('template', $data);
	    }
	    else
	    {
	        $username = $this->input->post('username');
	        $email    = $this->input->post('email');
	        $password = $this->input->post('password');
	        
	        $register = $this->redux_auth->register($username, $password, $email);
	        
	        if ($register)
	        {
	            $this->native_session->set_flashdata('message', '<p class="success">You have now registered. Please login.</p>');
	            redirect('welcome/register');
	        }
	        else
	        {
	            $this->native_session->set_flashdata('message', '<p class="error">Something went wrong, please try again or contact the helpdesk.</p>');
	            redirect('welcome/register');
	        }
	    }
	}
	
	/**
	 * Username check
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function username_check($username)
	{
	    $check = $this->redux_auth_model->username_check($username);
	    
	    if ($check)
	    {
	        $this->form_validation->set_message('username_check', 'The username "'.$username.'" already exists.');
	        return false;
	    }
	    else
	    {
	        return true;
	    }
	}
	
	/**
	 * Email check
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function email_check($email)
	{
	    $check = $this->redux_auth_model->email_check($email);
	    
	    if ($check)
	    {
	        $this->form_validation->set_message('email_check', 'The email "'.$email.'" already exists.');
	        return false;
	    }
	    else
	    {
	        return true;
	    }
	}
	
	/**
	 * login
	 *
	 * @return void
	 * @author Renee
	 **/
	function login()
	{
		/*Capturamos  el dominio para mostrar acceso de dominios*/
$dominio=$this->uri->segment(3);
if(strlen($dominio)>0):
$this->native_session->set_userdata('_canal_',$dominio);
else:
$dominio=$this->native_session->userdata('_canal_');

endif;
$data['canal']=$dominio;
 
		/**/
	    $this->form_validation->set_rules('email_contacto', 'Email', 'trim|required|callback_email_3');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	    
	    if ($this->form_validation->run() == false)
	    {
			


//$wid['filas']=$this->lib_usuarios->obtener(10);


	        $data['content'] = $this->load->view('welcome/login', $data, true);
		//	if(!$dominio):

	        $this->load->view('template2', $data);
			//else:
			

				//        $this->load->view('template_dominio', $data);
			//endif;
	    }
	    else 
	    {
	        $email    = $this->input->post('email_contacto');
	        $password = $this->input->post('password');
	        
			
			//$this->db->where('email',$email)->where('');

	        $login = $this->login_auth->login($email, $password);
		     
	        //var_dump((int)$login);
			
			if((int)$login==0):
			$this->native_session->set_flashdata('mensaje','email/clave incorrectos.');
			
			$this->sucesos->guardar('login','Clave incorrecta:'.$email.'-'.$password);
			
			redirect('welcome/login/'.$dominio);
			
			elseif((int)$login==3):
			$this->native_session->set_flashdata('mensaje','Tu registro a&uacute;n no ha terminado, busca el email de confirmaci&oacute;n.');
			$this->native_session->set_userdata('email_reenvio',$email);
			$this->native_session->set_flashdata('reenvio_msg','Su cuenta esta aun sin activar. ');
			
			$this->sucesos->guardar('login','No esta activada'.$email);
			redirect('registro/reenvio_activacion');
			
			
			elseif((int)$login==4):
		$this->native_session->set_flashdata('mensaje','Tu cuenta ha sido bloqueada.');
			redirect('welcome/login/'.$dominio);
			else:
			$this->sucesos->guardar('login','Ingreso correcto '.$email.':'.$password);
			
			
			
			
redirect('home');
			endif;
			
	    }
	}
	
	/**
	 * logout
	 *
	 * @return void
	 * @author Mathew
	 **/
	function logout()
	{
		$this->login_auth->logout();

		
		redirect();
	}
	

	
	


}