<?php
class Categoria extends CI_Controller{
    
    function  __construct() {
        parent::__construct();        
    }
    
    function index(){
		
		$data['categorias']=$this->db->get('categorias');
		
		
		$this->load->view('superior');
        $this->load->view('categoria/listar',$data);
		$this->load->view('inferior');
		
		
		
    }
	function listar()
	{
		$this->index();
		}

function form_agregar(){

$this->load->view('superior');
		$this->load->view('categoria/comp_agregar');
		$this->load->view('inferior');
}


    function agregar(){
        $this->db->insert('categorias', $_POST);
        redirect('categoria/index/');
		
		
		
    }
    
}
?>
