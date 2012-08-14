<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exportar extends CI_Controller {


  function  __construct() {



        parent::__construct();        



    }


	function word()
	{

$empleo_ID=$data['empleo_ID']=$this->uri->segment(3);

$data['empleo']=$this->empleo->get($empleo_ID)->row_array();
   header("Content-Type: application/vnd.ms-word");
   header("Expires: 0");
   header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
   header("Content-disposition: attachment; filename=\"oferta_empleo-".@$data['empleo']['titulo'].".doc\"");

 

$t=(isset($_POST['pais']))?$_POST['pais']:$data['empleo']['pais'];


$data['ciudades']=$this->ciudad($t);



   $tmp=$this->load->view('exportar/word',$data,true);
 
 //$tmp="<html><body><h1>hola</h1></body></html>";
 echo ($tmp);
 exit();
}

function txt()
	{

$empleo_ID=$data['empleo_ID']=$this->uri->segment(3);

$data['empleo']=$this->empleo->get($empleo_ID)->row_array();$t=(isset($_POST['pais']))?$_POST['pais']:$data['empleo']['pais'];


$data['ciudades']=$this->ciudad($t);



   $tmp=$this->load->view('exportar/txt',$data,true);
header("Content-Type: application/force-download");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".strlen($tmp));
header("Pragma: no-cache");
   header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
   header("Content-disposition: attachment; filename=\"oferta_empleo-".@$data['empleo']['titulo'].".txt\"");

 


 $tmp=str_replace('  ',' ',$tmp);

$tmp= strip_tags($tmp);
 //$tmp="<html><body><h1>hola</h1></body></html>";
 echo utf8_decode($tmp);
 exit();
}




function  ciudad($pais=167)



	{ 



		$h=$this->db->where('country_ID',$pais)->order_by('nombre','asc')->get('city');







$r=array(''=>'Seleccione ciudad');



$r['888888:extranjero']='Fuera del pais';



$r['999999:todas']='Todas las ciudades';







foreach($h->result_array() as $k => $v):



 $r[$v['ID'].':'.$v['nombre']]=$v['nombre'];



endforeach;







return $r;		



		}		



		

/*-----------------------------------------------------*/

		function ciudades()

		{

			$t=$this->uri->segment(3);

		$tmp=$this->ciudad($t);			

		echo '<label> Ciudad: '.form_dropdown('departamento',$tmp).'</label>';

			}


	}



	



	



	



	



	



	



