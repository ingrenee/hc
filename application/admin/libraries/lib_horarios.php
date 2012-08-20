<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
/**
 * Redux Authentication 2
 */
class Lib_horarios
  {
    /**
     * CodeIgniter global
     *
     * @var string
     **/
    protected $ci;
    /**
     * account status ('not_activated', etc ...)
     *
     * @var string
     **/
    protected $status;
    /**
     * __construct
     *
     * @return void
     * @author Mathew
     **/
	 	public function __construct() {

		$this->ci =& get_instance();
	}
	function listar($id)
	{
		
//$tmp=$this->ci->native_session->userdata('login_datos');		
$this->ci->load->library('pagination');

$w1=array('entradas_ID'=>$id);
//$w1['estado !=']='borrado';



	$segment=3;
$config['uri_segment'] = $segment;
$config['per_page']   = 15;
$config['num_links']   = 2;
$config['base_url'] = site_url('home/listar');
$config['first_link'] = 'Inicio';
$config['last_link'] = 'Final';
 $config['total_rows'] = $this->ci->db->get_where('horarios',$w1)->num_rows();


$this->ci->pagination->initialize($config);
$paginacion=$this->ci->pagination->create_links();
$this->ci->db->order_by('creado','desc');
$root= $this->ci->db->get_where('horarios',$w1,$config['per_page'],$this->ci->uri->segment($segment));
	
	return array($root,$paginacion, $config['total_rows']);
		
		
	//	return $this->db->where('empleador_ID',$id)->order_by('modificado','desc')->get('entradas');
		
		
		} 
	 

 
    public function actualizar($p)
      {
        $tmp = $this->ci->native_session->userdata('login_datos');
        //print_r($temp);
        $this->ci->db->where('ID', $tmp['ID']);
        $this->ci->db->update('horarios', $p);
        $t = $this->get($tmp['ID'])->row_array();
        ;
        unset($t['descripcion']);
        $this->ci->login_auth->set($t);
      }
    public function get_array($id)
      {
        $w['ID'] = $id;
        //print_r($tmp);
        return $this->ci->db->get_where('horarios', $w)->row_array();
      }
    function obtener($w = false)
      {
        if ($w):
            $this->ci->db->where($w);
        endif;
        return $this->ci->db->order_by('titulo', 'desc')->get('horarios');
      }
	  
	
	
    function rubro($id)
      {
        $tmp = $this->ci->db->select('rubro')->limit(1)->where('ID', $id)->get('rubros')->row_array();
        return $tmp['rubro'];
      }
  }
