 <?php
if (!defined('BASEPATH'))
                exit('No direct script access allowed');
class Home extends CI_Controller
        {
                function __construct()
                        {
                                parent::__construct();
                        }
                /**
  
                
                */
                function index()
                        {
                                $data             = array();
                                $data['filas']    = $this->empleador->obtener(10);
                                $data['widgets1'] = '';
                                $data['widgets3'] = $this->load->view('widgets/empleadores_noticias_panel', NULL, true);
                                //$data['widgets1']=$data['widgets3'].$data['widgets1'];
                                $canal            = $this->native_session->userdata('_canal_');
                                if ($canal):
                                                $t= $this->db->select('claves')->limit(1)->where('nombre', $canal)->get('subdominios_base')->row_array();
                                                $claves= '<label class="tag">' . str_replace(',', '</label><label class="tag">', $t['claves']) . '</label>';
                                                $data['canal']  = $canal;
                                                $data['claves'] = $claves;
                                                $this->native_session->set_userdata('_claves_', $claves);
                                endif;
                                $data['content'] = $this->load->view('home/index', $data, true);
                                $this->load->view('panel', $data);
                        }
                function listar()
                        {
                                $tmp                = $this->entradas->listar();
                                $data['empleos']    = $tmp[0];
                                $data['paginacion'] = $tmp[1];
                                $data['content']    = $this->load->view('home/listar-empleos', $data, true);
                                $this->load->view('panel', $data);
                        }
                /* ------------------------------------------------------------------------------ */
                function borrar_empleo()
                        {
                                $empleos_id  = $this->uri->segment(3);
                                $w['estado'] = 'borrado';
                                $this->empleo->actualizar($empleos_id, $w);
                                $this->native_session->set_flashdata('mensaje', 'La oferta de empleo fue borrada.');
                                redirect('home');
                        }
                function editar_entrada()
                        {
								$this->load->library('lib_tipos');
								$data['tipos']=_crea_array($this->lib_tipos->obtener());
															
                                $this->form_validation->set_rules('tipos_ID', 'tipos', 'required');
                                $this->form_validation->set_rules('departamento', 'ciudad', 'required');
                                $this->form_validation->set_rules('titulo', 'Titulo del empleo', 'required');
                                $this->form_validation->set_rules('categoria', 'categoria del empleo', 'required');
                                $this->form_validation->set_rules('duracion', 'duración del curso', 'trim|required|numeric');
                                $this->form_validation->set_rules('duracion_tipo', 'duración tipo', 'trim|required');		
                                $this->form_validation->set_rules('precio', 'precio', 'trim|required|numeric');
                                $this->form_validation->set_rules('igv', 'IGV', 'trim|required');
                                $this->form_validation->set_rules('descripcion', 'Descripcion del empleo', 'required');
                                $this->form_validation->set_rules('fecha_inicio', 'fecha de inicio', 'trim|required|callback_fecha_inicio');
                                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                                $data['usuario'] = $tmp = $this->native_session->userdata('login_datos');
                                //        print_r($tmp);  
                                $entrada_ID      = $data['entrada_ID'] = $this->uri->segment(3);
                                $tags            = '<br><br><span class="tags_system">' . $this->native_session->userdata('_tags_') . '</span>';
                                if ($this->form_validation->run() == false)
                                        {
                                                $data['empleo']                = $this->entradas->get($entrada_ID)->row_array();
                                                $data['empleo']['descripcion'] = $descripcion = str_replace($tags, '', $data['empleo']['descripcion']);
                                                //$data['paises']=$this->pais();
                                                
                                                /* s e fija el pais que ya estab predefinido*/
                                                $t                             = (isset($_POST['pais'])) ? $_POST['pais'] : $data['empleo']['pais'];
                                                //echo $t;
                                                $data['ciudades']              = $this->ciudad($t);
                                                $data['content']               = $this->load->view('home/editar_empleo', $data, true);
                                                $this->load->view('panel', $data);
                                        }
                                else
                                        {
                                                $_POST['modificado'] = ahora();
                                                $descripcion         = strip_tags($this->input->post('descripcion'), '<strong><p><b><br><i><ul><li><ol>');
                                                $descripcion         = $this->input->post('descripcion');
                                                /*borrando tags*/
                                                $descripcion         = str_replace($tags, '', $descripcion);
                                                $descripcion         = str_replace("  ", " ", htmlentities(utf8_decode($descripcion)));
                                                $descripcion         = str_replace('&nbsp;', ' ', $descripcion);
                                                $descripcion         = utf8_encode(html_entity_decode($descripcion));
                                                //$descripcion=str_replace('&lt;','<',$descripcion);
                                                //$descripcion=str_replace('&gt;','>',$descripcion);        
                                                //$descripcion=str_replace('\s','x',$descripcion);
                                                //$descripcion = ereg_replace( "([ ]+)", " ", $descripcion );
                                                //$descripcion=preg_replace("/\s+/"," ",$descripcion);
                                                //$descripcion = ereg_replace( "\s", "", $descripcion );        
                                                //$descripcion=strip_tags($descripcion,'<strong><p><b><br><i><ul><li><ol>');
                                                $t                   = eregi_replace('<li[^>]*>', "<li>", $descripcion);
                                                $t                   = eregi_replace('<ul[^>]*>', "<ul>", $t);
                                                $descripcion         = eregi_replace('<p[^>]*>', "<p>", $t);
                                                $descripcion .= $tags;
                                                $_POST['descripcion'] = $descripcion;
                                                $_POST['categoria']   = aplana($_POST['categoria']);
                                                $_POST['titulo']      = strip_tags($this->input->post('titulo', true));
                                                $this->db->where('ID', $entrada_ID);
                                                $this->db->update('entradas', $_POST);
                                                $this->native_session->set_flashdata('mensaje', 'La oferta de empleo fue actualizada.');
                                                // $register = $this->redux_auth->register($username, $password, $email);
                                                //         echo BASEPATH;
                                                //       echo "--";
                                                //$this->output->clear_page_cache(NULL,md5(base_url('')));
                                                actualizar_index_cache();
                                                actualizar_oferta_cache($_POST['titulo'], $entrada_ID);
                                                redirect('home/listar');
                                        }
                        }
                /* ------------------------------------------------------------------------------ */
                function fecha_inicio($str)
                        {
                                $tmp = explode('/', $str);
                                if (count($tmp) > 2 && checkdate($tmp[1], $tmp[0], $tmp[2])):
                                                $a = (int)date('Y')*10000;
                                                $b = (int)date('m')*100;
                                                $c = (int)date('d');
												
												//echo ((int)$tmp[2])*10000 + ((int)$tmp[1])*100+(int)$tmp[0].':'.($a+$b+$c);
												$fecha=((int)$tmp[2])*10000 + ((int)$tmp[1])*100+(int)$tmp[0];//.':'.($a+$b+$c);
												if(($fecha)<=((int)$a+$b+$c)):
												$this->form_validation->set_message('fecha_inicio', 'La %s  debe ser mayor a la fecha actual. '); 
												return  false;
												else:
												return TRUE;
												endif;
												
                                                
                                else:
                                                $this->form_validation->set_message('fecha_inicio', 'El %s es incorrecto (dd/mm/aaaa)');
                                                return FALSE;
                                endif;
                        }
                /*------------------------------------------*/
                function pais()
                        {
                                $h = $this->db->get('country');
                                foreach ($h->result_array() as $k => $v):
                                                $r[$v['ID'] . ':' . $v['nombre']] = $v['nombre'];
                                endforeach;
                                return $r;
                        }
                /*------------------------------*/
                function ciudad($pais = 167)
                        {
                                $h                      = $this->db->where('country_ID', $pais)->order_by('nombre', 'asc')->get('city');
                                $r                      = array(
                                                '' => 'Seleccione ciudad'
                                );
                                $r['888888:extranjero'] = 'Fuera del pais';
                                $r['999999:todas']      = 'Todas las ciudades';
                                foreach ($h->result_array() as $k => $v):
                                                $r[$v['ID'] . ':' . $v['nombre']] = $v['nombre'];
                                endforeach;
                                return $r;
                        }
                /*-----------------------------------------------------*/
                function ciudades()
                        {
                                $t   = $this->uri->segment(3);
                                $tmp = $this->ciudad($t);
                                echo '<label> Ciudad: ' . form_dropdown('departamento', $tmp) . '</label>';
                        }
                /*-*------------------------------------------------------------------------------------------*/
                function agregar()
                        {
                                $canal = $this->uri->segment(3);
                                if ($canal):
                                                $t              = $this->db->select('claves')->limit(1)->where('nombre', $canal)->get('subdominios_base')->row_array();
                                                $claves         = '<label class="tag">' . str_replace(',', '</label><label class="tag">', $t['claves']) . '</label>';
                                                $data['canal']  = $canal;
                                                $data['claves'] = $claves;
                                                $this->native_session->set_userdata('_canal_', $canal);
                                                $this->native_session->set_userdata('_claves_', $claves);
                                endif;
                                //$data['paises']=$this->pais();
                                
								/* obteniendo  lista de tipos*/
								$this->load->library('lib_tipos');
								$data['tipos']=_crea_array($this->lib_tipos->obtener());
								
                                /* se fija el pais*/
                                $t                = (isset($_POST['pais'])) ? $_POST['pais'] : '167';
                                $data['ciudades'] = $this->ciudad($t);
                                $this->form_validation->set_rules('tipos_ID', 'Tipo', 'trim|required');								
                                $this->form_validation->set_rules('titulo', 'Titulo del empleo', 'required');
                                $this->form_validation->set_rules('email_contacto', 'Email de contacto', 'required|valid_email');
                                $this->form_validation->set_rules('categoria', 'categoria del empleo', 'required');
                                $this->form_validation->set_rules('duracion', 'duración del curso', 'trim|required|numeric');
                                $this->form_validation->set_rules('duracion_tipo', 'duración tipo', 'trim|required');		
                                $this->form_validation->set_rules('precio', 'precio', 'trim|required|numeric');
                                $this->form_validation->set_rules('igv', 'IGV', 'trim|required');																
                                //  $this->form_validation->set_rules('experiencia', 'Tiempo de experiencia', 'required');    
                                // $this->form_validation->set_rules('pais', 'pais', 'required');    
                                $this->form_validation->set_rules('fecha_inicio', 'fecha de inicio', 'trim|required|callback_fecha_inicio');
                                //  $this->form_validation->set_rules('experiencia_tipo', 'Tipo de experiencia', 'required');                        
                                $this->form_validation->set_rules('descripcion', 'Descripcion del empleo', 'required');
                                $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                                $data['usuario'] = $tmp = $this->native_session->userdata('login_datos');
                                //print_r($tmp);  
                                if ($this->form_validation->run() == false)
                                        {
                                                $data['empleo']  = array();
                                                $data['content'] = $this->load->view('home/agregar-empleos', $data, true);
                                                $this->load->view('panel', $data);
                                        }
                                else
                                        {
                                                $_POST['creado']       = $_POST['modificado'] = ahora();
                                                $_POST['empleador_ID'] = $tmp['ID'];
                                                $_POST['categoria']    = aplana($_POST['categoria']);
                                                //$_POST['descripcion']=strip_tags($this->input->post('descripcion'),'<strong><p><b><br><i><ul><li><ol>');
                                                $descripcion           = $this->input->post('descripcion');
                                                $descripcion           = str_replace("  ", " ", htmlentities(utf8_decode($descripcion)));
                                                $descripcion           = str_replace('&nbsp;', ' ', $descripcion);
                                                $descripcion           = utf8_encode(html_entity_decode($descripcion));
                                                //$descripcion=str_replace('&lt;','<',$descripcion);
                                                //$descripcion=str_replace('&gt;','>',$descripcion);        
                                                //$descripcion=str_replace('\s','x',$descripcion);
                                                //$descripcion = ereg_replace( "([ ]+)", " ", $descripcion );
                                                //$descripcion=preg_replace("/\s+/"," ",$descripcion);
                                                //$descripcion = ereg_replace( "\s", "", $descripcion );        
                                                $descripcion           = strip_tags($descripcion, '<strong><p><b><br><i><ul><li><ol>');
                                                $t                     = eregi_replace('<li[^>]*>', "<li>", $descripcion);
                                                $t                     = eregi_replace('<ul[^>]*>', "<ul>", $t);
                                                $descripcion           = eregi_replace('<p[^>]*>', "<p>", $t);
                                                /*agregando_tags*/
                                                $tags                  = '<br><br><span class="tags_system">' . $this->native_session->userdata('_tags_') . '</span>';
                                                $descripcion .= $tags;
                                                /**/
                                                $_POST['descripcion'] = $descripcion;
                                                $_POST['titulo']      = strip_tags($this->input->post('titulo', true));
                                                $this->db->insert('entradas', $_POST);
                                                //actualizar_index_cache();
                                                redirect('home/listar');
                                        }
                        }
                /* ------------------------------------------------------------------------------ */
                public function publicado()
                        {
                                $ofertas_id  = $this->uri->segment(3);
                                $w['estado'] = 'pendiente';
                                $this->empleo->actualizar($ofertas_id, $w);
                                $this->native_session->set_flashdata('mensaje', 'Su oferta ha sido despublicada/ocultada.');
                                actualizar_index_cache();
                                redirect('home/listar');
                        }
                public function pendiente()
                        {
                                $ofertas_id  = $this->uri->segment(3);
                                $w['estado'] = 'publicado';
                                $this->empleo->actualizar($ofertas_id, $w);
                                $this->native_session->set_flashdata('mensaje', 'Su oferta ha sido publicada.');
                                actualizar_index_cache();
                                redirect('home/listar');
                        }
                function exportar()
                        {
                                $email_empresa = $this->uri->segment(3);
                                $file_empresa  = $this->uri->segment(4);
                                $h             = file_get_contents($file_empresa);
                                $this->db->where('email_contacto', $email_empresa);
                                $t = $this->db->limit(1)->get('empleador')->row_array();
                                if (isset($t['ID']) && ((int) $t['ID'] > 0)):
                                                $array                 = unserialize($h);
                                                $array['empleador_ID'] = $t['ID'];
                                                unset($array['ID']);
                                                $array['creado']      = $array['modificado'] = ahora();
                                                $array['descripcion'] = strip_tags($array['descripcion']);
                                                $array['titulo']      = strip_tags($array['titulo']);
                                                $this->db->insert('entradas', $array);
                                else:
                                                echo 'error';
                                endif;
                        }
        }
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */ 