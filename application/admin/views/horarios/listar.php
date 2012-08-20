<div class="formulario">
<div class="nav">
<h1>Horarios</h1>
<h1><?PHP echo $info['titulo'];?></h1>
<h2>Tus horarios registrados</h2>

</div>

<a href="<?PHP echo site_url('home/agregar');?>" class="tool agregar"> Agregar nuevo curso</a>







<?PHP _mensajes();?>




<div id="lista">
<table width="200" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <th width="20">#</th>
    <th width="35">Hits</th>
    <th width="300">Titulo</th>
    <th width="30">Estado</th>

    <th>Exportar</th>
    <th>&nbsp;</th>
   
  </tr>
  <?PHP foreach($entradas->result_array() as $k => $v):?>
  <tr>
    <td><?PHP echo $v['ID'];?></td>
    <td><?PHP echo (int)$v['contador'];?></td>
    <td><a href="<?PHP echo base_url('trabajo-'._titulo($v['titulo'],'').'-'.$v['ID'].'.html');?>" target="_blank" class="linked">&nbsp;</a> <?PHP echo $v['titulo'];?> </td>
    <?PHP $tmp= $v['estado'];?>
    <td><a href="<?PHP echo site_url('home/'.$tmp.'/'.$v['ID']);?>" title="
    <?PHP  echo ($tmp=='pendiente')?'Presione para publicar la oferta.':'Presione para  no publicar/ocultar su oferta.'?>
    
    "><span class="span01 <?PHP echo $tmp;?>"><?PHP 
	
	if($tmp=='pendiente'):
	$tmp='No publicado';
	else:
	$tmp='Publicado';
	endif;
	 echo $tmp;
	?></span></a></td>

<!--
    <td><a href="<?PHP echo site_url('exportar/word/'.$v['ID']);?>"  class="herramienta word" >&nbsp;</a> | <a href="<?PHP echo site_url('exportar/txt/'.$v['ID']);?>"  class="herramienta txt" >&nbsp;</a></td>
    -->
    
    <td>
    <div class="botones">
    <a href="#">Inf. Basica</a><a href="#">Inf. de contacto</a>
    <a href="#">Horarios</a>
    <a href="#">Temario</a>
    <a href="#">Ubicacion</a>
    <a href="#">Precio</a>
    <a href="#">ponentes</a>
    </div>
    </td>
    
    <td>
     
 
    <a href="<?PHP echo site_url('home/editar_entrada/'.$v['ID']);?>" class="tool editar">Editar </a>

    </td>
 
    </tr>
  <?PHP endforeach;?>
  </table>

</div>
<div class="paginacion">
<?PHP echo $paginacion;?>
</div>

</div>