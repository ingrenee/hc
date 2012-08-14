<?php

class Lib_candidatos  {

	public $ci;


	public function __construct() {

		$this->ci =& get_instance();
	}

 public function obtener($w=array(),$select='ID')
	 {
		 return $this->ci->db->select($select)->get_where('usuarios',$w);
		 }
		 
		 
 public function obtener_vista($w=array(),$select='ID')
	 {
		 return $this->ci->db->select($select)->get_where('usuarios_listas_all',$w);
		 }		 

/*
@w1= array con condiciones clave-valor , campo-valor
@segment :   ubicacion de la variable de paginacion
@site :  destino de paginacion
*/
/* Salida:
array[0] Contiene el resultado de la consulta, listo para iterar 
array[1]  contiene los enlaces de la paginacion listo para imprimir
*/
	public function obtener_todos($w1=array(),$segment=3,$site='candidatos/listar/')
{
	
	
	
	
$config['uri_segment'] = $segment;
$config['per_page']   = 15;
$config['num_links']   = 10;
$config['base_url'] = site_url($site);
$config['total_rows'] = $this->ci->db->get_where('usuarios',$w1)->num_rows();


$this->ci->pagination->initialize($config);
$paginacion=$this->ci->pagination->create_links();
$this->ci->db->order_by('creado','desc');
$root= $this->ci->db->get_where('usuarios',$w1,$config['per_page'],$this->ci->uri->segment($segment));
	
	return array($root,$paginacion,$config['total_rows']);
	}


/*
parametro @id: id de un usuario
Salida $array[]= registro de un usuario
*/
	public function obtener_uno($id) {

		return $tmp=$this->ci->db->where('ID',$id)->limit(1)->get('usuarios')->row_array();


	}




	public function buscar($campo=false,$valor=false) {

		$this->ci->db->like($campo,$valor);
		return $this->ci->db->get('usuarios');

	}
	
	public function existe($campo=false,$valor=false){
		$this->ci->db->like($campo,$valor);
		
		
		 $tmp=$this->ci->db->limit(1)->get('usuarios')->row_array();
			
			if(count($tmp)>0):
			return $tmp['ID'];
			else:
			return false;
			endif;
	
	}
	


function  cv_general($id=false)
	{
			

			$w=array('usuarios_ID'=>$id);

		 return $this->ci->db->get_where('cv_general',$w)->row_array();
	}
	
	function cv_formacion($id=false)
	{
		
					if(!$id):
			$this->ci->db->where('usuarios_ID',$this->id);
			else:
			$this->ci->db->where('usuarios_ID',$id);
			endif;
		
		
return $this->ci->db->get('cv_formacion');
		}
		
	function cv_experiencia($id=false)
	{
		
			if(!$id):
			$this->ci->db->where('usuarios_ID',$this->id);
			else:
			$this->ci->db->where('usuarios_ID',$id);
			endif;
return $this->ci->db->get('cv_experiencia');
		}		

	
	
	function cv_general_estado()
	{
		$tmp=$this->cv_general();
		$i=0;
		(isset($tmp['nombres']))?$i++:0;
		(isset($tmp['dni']))?$i++:0;
		(isset($tmp['departamento']))?$i++:0;
		(isset($tmp['distrito']))?$i++:0;
		(isset($tmp['pais']))?$i++:0;		
		(isset($tmp['departamento2']))?$i++:0;
		(isset($tmp['distrito2']))?$i++:0;
		(isset($tmp['pais2']))?$i++:0;								
		(isset($tmp['direccion']))?$i++:0;
		(isset($tmp['celular']))?$i++:0;

		return $i;		
		}

	function  cv_formacion_estado()
	{
		$info=$this->ci->native_session->userdata('login_data_candidatos');
		 return $this->ci->db->where('usuarios_ID',$info['ID'])->get('cv_formacion')->num_rows();
		}
		
		function  cv_experiencia_estado()
	{
		$info=$this->ci->native_session->userdata('login_data_candidatos');
		 return $this->ci->db->where('usuarios_ID',$info['ID'])->get('cv_experiencia')->num_rows();
		}
		
		
		function actualizar($arr)
		{
			$info=$this->ci->native_session->userdata('login_data_candidatos');
		$this->id=$info['ID'];
			$this->ci->db->where('ID',$this->id);
			$this->ci->db->limit(1)->update('usuarios',$arr);
			}
			
			
		function actualizar_off($w,$arr)
		{
			

			$this->ci->db->where($w);
			$this->ci->db->limit(1)->update('usuarios',$arr);
			}	
		function obtener_campo($k)
		{
			$this->ci->db->where('ID',$this->id);
			$t=$this->ci->db->limit(1)->select($k)->get('usuarios')->row_array();
			return $t[$k];
			}
			
			
	function obtener_info($id=false)
	{
					if(!$id):
			$this->ci->db->where('ID',$this->id);
			else:
			$this->ci->db->where('ID',$id);
			endif;
		
return $this->ci->db->limit(1)->get('usuarios')->row_array();
		}		

}

