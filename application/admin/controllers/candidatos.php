<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidatos extends CI_Controller {

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

$subdominio=$this->db->where('ruc',$tmp['ruc'])->get('subdominios');

if($subdominio->num_rows()>0):
$tmp['sub']=$subdominio->row_array();
else:
$tmp['sub']=false;
endif;

$w['empresa_ruc']=$tmp['ruc'];
		$data[]=$this->listar_op('',$w,$tmp);
		
		//$data['content']=	$this->load->view('subdominios/',$data,true);
		//$this->load->view('panel',$data);
		
		
		
		

	}
	
	function listar()
	{$tmp=$this->login_auth->data();


$subdominio=$this->db->where('ruc',$tmp['ruc'])->get('subdominios');

if($subdominio->num_rows()>0):
$tmp['sub']=$subdominio->row_array();
else:
$tmp['sub']=false;
endif;
$w['empresa_ruc']=$tmp['ruc'];
		$data[]=$this->listar_op('',$w,$tmp);
		
		}
	
	 function listar_op($template='',$tmp=array(),$data=array())
	 {
		// $tmp['sede_ID']=$this->lib_access->data_user('sede_ID');
		
	/*	$anio=date('Y');
		$mes=date('m');		
		$dia=date('d');				
		//$tmp['year(fecha) >=']=$anio;
		//$tmp['month(fecha) >=']=$mes;
		//$tmp['day(fecha) >=']=$dia;		
		
		$tmp['(fecha) >=']=date('Y-m-d');
		*/
		$t=$this->lib_candidatos->obtener_todos($tmp);
		$data['paginacion']=$t[1];
		$data['filas']=$t[0];
		$data['total']=$t[2];
	
			$data['content']=$this->load->view('candidatos/listar'.$template,$data,true);
			$this->load->view('panel',$data);
		 }

	
	
	function cv()
	{
		$id=$this->uri->segment(3);
		
		$w['ID']=$id;
		//$w['empresas_ruc']=$tmp['ruc'];
		
		
		if(false):
		$data=$this->lib_usuarios->obtener_info($id);

		$data['general']=$this->lib_usuarios->cv_general($id);	
		$data['formacion']=$this->lib_usuarios->cv_formacion($id);
		$data['experiencia']=$this->lib_usuarios->cv_experiencia($id);		
		$this->load->library('lib_aptitudes');
		$data['informatica']=$this->lib_aptitudes->corta($data['aptitudes'],1);			
		$data['idiomas']=$this->lib_aptitudes->corta($data['aptitudes'],2);			
		
		else:


		$data=$this->lib_candidatos->obtener_info($id);

		$data['general']=$this->lib_candidatos->cv_general($id);	
		
		
		$data['formacion']=$this->lib_candidatos->cv_formacion($id);
		$data['experiencia']=$this->lib_candidatos->cv_experiencia($id);		
		$this->load->library('lib_aptitudes');
		$data['informatica']=$this->lib_aptitudes->corta($data['aptitudes'],1);			
		$data['idiomas']=$this->lib_aptitudes->corta($data['aptitudes'],2);	
		endif;

		
	$this->load->view('candidatos/index',$data);
		
		//$this->load->view('panel',$data);

		}
	
	

		
}