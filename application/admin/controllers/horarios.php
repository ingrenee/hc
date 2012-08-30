<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
class Horarios extends CI_Controller {

	/**
	 * index
	 *
	 * @return void
	 * @author Mathew
	 **/
	  //var $lib_horarios=NULL;
	 
	 
	 
	  function __construct()
                        {
                                parent::__construct();
     					$this->load->library('lib_horarios');				
	                    }

	 
	 
	function index()
	{
		
			
		$entrada_ID=$this->uri->segment(3);
		
		$info=$this->entradas->obtener_uno($entrada_ID);
		//var_dump($info);
		if(($info->num_rows())<=0):
		 echo "Error";
		exit();
		endif;
		
								$data['info']=$info->row_array();
								$tmp                = $this->lib_horarios->listar($entrada_ID);
                                $data['entradas']    = $tmp[0];
                                $data['paginacion'] = $tmp[1];
								$data['total']		= $tmp[2];
								if($data['total']<=0):
								redirect('horarios/agregar/'.$entrada_ID);
								endif;
								
                                $data['content']    = $this->load->view('horarios/listar', $data, true);
                                $this->load->view('panel', $data);
	}
	
	
	function  agregar()
	{
		$entrada_ID=$this->uri->segment(3);
		/*obteniendo informacion del curso*/
		$info=$this->entradas->obtener_uno($entrada_ID);
		//var_dump($info);
		if(($info->num_rows())<=0):
		 echo "Error";
		exit();
		endif;
		
		
		$data=array();
		
								$data['horario']=$this->input->post('horario');
		      					/*informacion del curso*/
			  					$data['info']=$info->row_array();
			                    $data['content']    = $this->load->view('horarios/agregar', $data, true);
                                $this->load->view('panel', $data);
		}
	/**
	 * activate
	 * doesn't currently work
	 *
	 * @return void
	 * @author Mathew
	 **/
	

	
	


}