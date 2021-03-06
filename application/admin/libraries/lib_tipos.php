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
class Lib_tipos
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
        $tmp = $this->ci->native_session->userdata('login_datos');
        //print_r($tmp);
        return $this->ci->empleo_model->listar($tmp['ID']);
      }
    public function actualizar($p)
      {
        $tmp = $this->ci->native_session->userdata('login_datos');
        //print_r($temp);
        $this->ci->db->where('ID', $tmp['ID']);
        $this->ci->db->update('tipos', $p);
        $t = $this->get($tmp['ID'])->row_array();
        ;
        unset($t['descripcion']);
        $this->ci->login_auth->set($t);
      }
    public function get_array($id)
      {
        $w['ID'] = $id;
        //print_r($tmp);
        return $this->ci->db->get_where('tipos', $w)->row_array();
      }
    function obtener($w = false)
      {
        if ($w):
            $this->ci->db->where($w);
        endif;
        return $this->ci->db->order_by('titulo', 'desc')->get('tipos');
      }
	  
	
	
    function rubro($id)
      {
        $tmp = $this->ci->db->select('rubro')->limit(1)->where('ID', $id)->get('rubros')->row_array();
        return $tmp['rubro'];
      }
  }
