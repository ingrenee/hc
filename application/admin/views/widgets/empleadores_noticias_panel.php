<?PHP 
$this->db->where('empresa_ID',999999);
$this->db->where('portada','si');
$this->db->select('ID,titulo,imagen');
$this->db->select('SUBSTRING( descripcion , 1,350) as descripcion',false);
$not=$this->db->where('estado','publicado')->order_by('creado','desc')->limit(5)->get('cont_entradas');
if($not->num_rows()>0):
?>


<!--   incio  buscador -->
<script type="text/javascript" src="<?PHP echo base_url('js/jquery-1.7.1.min.js');?>"></script>

<script type="text/javascript" src="<?PHP echo base_url('js/slide02/jquery.bxSlider.min.js');?>"></script>
<link href="<?PHP echo base_url('css/publicaciones/wid_estilos_01.css');?>" rel="stylesheet" type="text/css" />


<div  class="wid_noticias" style="width:480px; margin-left:0px; margin-right:0px; padding-bottom:5px;">
<div >
<ul id="demo">
<?PHP foreach($not->result_array() as $k => $v):?>
<div class="wid_noticia">
<div class="imagen">
<img src="<?PHP echo base_url('/images/publicaciones/'.$v['imagen']);?>">
</div>
<div class="contenido">
<h1><?PHP echo $v['titulo'];?></h1>
<div class="texto">
<?PHP echo _cortar($v['descripcion']);?>... | 
<a href="<?PHP echo site_url('blogfast/leer/'.$v['ID']);?>" class="leer">Leer más</a>
</div>
</div>
</div>


<?PHP endforeach;?>
</ul>
</div>
</div>
<script>
$(document).ready(function(e) {
    $('#demo').bxSlider({
    auto: true,
    pager: true,
	controls: false,	
	speed: 500,
	pause:4000
			
	
  });
});
</script>
<?PHP endif;?>