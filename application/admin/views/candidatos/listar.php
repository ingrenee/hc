  <link rel="stylesheet" href="<?PHP echo base_url('js/tinybox2/style.css');?>" />
<script type="text/javascript" src="<?PHP echo base_url('js/tinybox2/tinybox.js');?>"></script>

<h2>Tus candidatos</h2>
<p class="info">Los siguientes candidatos se registraron a trav&eacute;s de tu p&aacute;gina: 
<a href="<?PHP echo base_url($ruc);?>"  target="_blank" ><?PHP echo base_url($ruc);?></a> o en tu subdominio ( 
<?PHP if($sub):
?>
<a target="_blank" href="http://<?PHP 
echo str_replace('.hayempleo.com','',$sub['nombre']);
?>.hayempleo.com">
http://<?PHP 
echo str_replace('.hayempleo.com','',$sub['nombre']);
?>.hayempleo.com
</a> <span class="span01 <?PHP echo $sub['estado'];?>"><?PHP echo $sub['estado'];?></span>
<?PHP
else:
?>
A&uacute;n no has solicitado tu subdominio, es <span class="gratis">&nbsp;</span>,<a href="<?PHP echo site_url('subdominios/index');?>" class="">Ingresa aqu&iacute;</a>.
<?PHP 
endif;
?>).</p>

<p>
<?PHP _mensajes();?>
</p>

<div class="info barra_info">
( <?PHP echo $total; ?> ) candidatos registrados: 
</div>
<div id="lista">
  <table width="200" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <th>#</th>
    <th>Candidato</th>
    <th>Ocupacion</th>
    <th>Edad</th>

    <th>Email</th>
    <th>CV</th>
   
  </tr>
  <?PHP if($filas->num_rows()>0):?>
  <?PHP foreach($filas->result_array() as $k => $v):?>
  <tr>
    <td><?PHP echo $v['ID'];?></td>
    <td><?PHP echo $v['apellido_pa'];?><?PHP echo $v['apellido_ma'];?>,<?PHP echo $v['nombres'];?></td>
    <td> <?PHP echo $v['ocupacion'];?> </td>
    <?PHP $tmp= $v['estado'];?>
    <td>
    <?PHP if(isset($v['fecha_nacimiento'])):?>
	(
	<?PHP  $diff=(time()-strtotime($v['fecha_nacimiento'])); 
	echo round($diff/(24*60*60*365))
	?> a.)
	<?PHP echo $v['fecha_nacimiento'];?>
    <?PHP endif;?>
    </td>

    <td><?PHP echo $v['email'];?></td>
    <td>
     
   
    <a href="javascript:TINY.box.show({url:'<?PHP echo site_url('candidatos/cv/'.$v['ID']);?>',width:550,height:500})" class="tool ver"><span class="span01 publicado">Ver CV</span></a>

    </td>
    <!-- 
    <td><a href="<?PHP //echo site_url('home/borrar_empleo/'.$v['ID']);?>"  onclick="return  confirm('Esta seguro de borrar esta oferta de empleo.?');"class="tool borrar">Borrar</a></td>
    
    -->
    </tr>
  <?PHP endforeach;?>
  <?PHP else:?>
  
  <tr>
    <td colspan="6">No se ha registrado ningún candidato en: <span class="info"><a href="<?PHP echo base_url($ruc);?>"  target="_blank" ><?PHP echo base_url($ruc);?></a></span>, ni <span class="info"> en tu subdominio (
        <?PHP if($sub):
?>
        <a target="_blank" href="http://<?PHP 
echo $sub['nombre'];
?>.hayempleo.com"> http://
        <?PHP 
echo $sub['nombre'];
?>
        .hayempleo.com </a> <span class="span01 <?PHP echo $sub['estado'];?>"><?PHP echo $sub['estado'];?></span>
        <?PHP
else:
?>
A&uacute;n no has solicitado tu subdominio, es <span class="gratis">&nbsp;</span>,<a href="<?PHP echo site_url('subdominios/index');?>" class="">Ingresa aqu&iacute;</a>.
<?PHP 
endif;
?>
).</span></td>
    </tr>
  <?PHP endif;?>
  </table>

</div>
<div class="paginacion">
<?PHP echo $paginacion;?>
</div>