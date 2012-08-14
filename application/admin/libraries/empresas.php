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
* Redux Authentication 2
*/
class Empresas
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
	public function __construct()
	{
		$this->ci =& get_instance();
	}
	
	public function listar()
	{
		$tmp=$this->ci->native_session->userdata('login_datos');
		//print_r($tmp);
		return $this->ci->empleo_model->listar($tmp['ID']);
		
		}
		
		
			
	public function actualizar($p)
	{
		$tmp=$this->ci->native_session->userdata('login_datos');
		//print_r($temp);
		
		$this->ci->db->where('ruc',$tmp['ruc']);
	 $this->ci->db->update('empresas',$p);
	 
	//$t=$this->get($tmp['ID'])->row_array();;
	//unset($t['descripcion']);
	 ///$this->ci->login_auth->set($t);
		
		}
		
		public function agregar($p)
	{

		//print_r($temp);
		

	 $this->ci->db->insert('empresas',$p);
	 
	//$t=$this->get($tmp['ID'])->row_array();;
	//unset($t['descripcion']);
	 ///$this->ci->login_auth->set($t);
		
		}
		
		
		
public function get($id)
	{
		$w['ruc']=$id;
		//print_r($tmp);
		return $this->ci->db->get_where('empresas',$w);
		
		}
	

	
	public function get_array($id)
	{
		$w['ruc']=$id;
		//print_r($tmp);
		return $this->ci->db->get_where('empresas',$w)->row_array();
		
		}
		
		
			function obtener($limit)
	{
		return $this->ci->db->limit($limit)->where('estado','activo')->order_by('ID','desc')->get('empleador');
		
		}
		function rubro($id)
		{
			$tmp=$this->ci->db->select('rubro')->limit(1)->where('ID',$id)->get('rubros')->row_array();
			 return $tmp['rubro'];
			}
		
	
	
}
