<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" :
 * <thepixeldeveloper@googlemail.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Mathew Davies
 * ----------------------------------------------------------------------------
 */
 
/**
* redux_auth_model
*/
class Entradas_model extends CI_Model
{
	/**
	 * Holds an array of tables used in
	 * redux.
	 *
	 * @var string
	 **/
	public $tables = array();
	
	/**
	 * activation code
	 *
	 * @var string
	 **/
	public $activation_code;
	
	/**
	 * forgotten password key
	 *
	 * @var string
	 **/
	public $forgotten_password_code;
	
	/**
	 * new password
	 *
	 * @var string
	 **/
	public $new_password;
	
	/**
	 * Identity
	 *
	 * @var string
	 **/
	public $identity;
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	function listar($id)
	{
		
		
$this->load->library('pagination');

$w1=array('empleador_ID'=>$id);
//$w1['estado !=']='borrado';



	$segment=3;
$config['uri_segment'] = $segment;
$config['per_page']   = 15;
$config['num_links']   = 2;
$config['base_url'] = site_url('home/listar');
$config['first_link'] = 'Inicio';
$config['last_link'] = 'Final';
 $config['total_rows'] = $this->db->get_where('entradas',$w1)->num_rows();


$this->pagination->initialize($config);
$paginacion=$this->pagination->create_links();
$this->db->order_by('creado','desc');
$root= $this->db->get_where('entradas',$w1,$config['per_page'],$this->uri->segment($segment));
	
	return array($root,$paginacion);
		
		
	//	return $this->db->where('empleador_ID',$id)->order_by('modificado','desc')->get('entradas');
		
		
		}
	
	function get($user_id,$id)
	{  
				return $this->db->where('empleador_ID',$user_id)->where('ID',$id)->limit(1)->get('entradas');
		}
	
}
