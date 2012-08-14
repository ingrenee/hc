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
class Empleo
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
		
		
public function get($id)
	{
		$tmp=$this->ci->native_session->userdata('login_datos');
		//print_r($tmp);
		return $this->ci->empleo_model->get($tmp['ID'],$id);
		
		}
		
		
		
	public function actualizar($id,$w)
	{
		$tmp=$this->ci->native_session->userdata('login_datos');
		//print_r($tmp);
		
		$this->ci->db->where('ID',$id);
		$this->ci->db->where('empleador_ID',$tmp['ID']);

		return $this->ci->db->limit(1)->update('entradas',$w);
		
		}	
	

	
}
