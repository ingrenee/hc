<h2>Tus empleos registrados</h2>
<a href="<?PHP echo site_url('home/agregar');?>" class="tool agregar"> Agregar nuevo empleo</a>








<?PHP _mensajes();?>




<div id="lista">
<table width="200" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <th>#</th>
    <th>Visitas</th>
    <th>Titulo</th>
    <th>Estado</th>

    <th>Exportar</th>
    <th>&nbsp;</th>
   
  </tr>
  <?PHP foreach($empleos->result_array() as $k => $v):?>
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
	endif;
	 echo $tmp;
	?></span></a></td>

    <td><a href="<?PHP echo site_url('exportar/word/'.$v['ID']);?>"  class="herramienta word" >&nbsp;</a> | <a href="<?PHP echo site_url('exportar/txt/'.$v['ID']);?>"  class="herramienta txt" >&nbsp;</a></td>
    <td>
     
    <?PHP 
//	 echo $v['creado'];
	//$creado=explode('-',$v['creado']);
	$diff=(time()-strtotime($v['creado']));
	if( $diff  < 2*24*60*60 ):?>
    <a href="<?PHP echo site_url('home/editar_empleo/'.$v['ID']);?>" class="tool editar">Editar <span style="font-size:10px">(<?PHP echo tiempo_detalle(2*24*60*60-$diff);?>)</span></a>
   <?PHP else:?>
  Edici&oacute;n cerrada hace <?PHP echo round($diff/(24*60*60)-2)?> dias
   <?PHP endif;?>
    </td>
    <!-- 
    <td><a href="<?PHP //echo site_url('home/borrar_empleo/'.$v['ID']);?>"  onclick="return  confirm('Esta seguro de borrar esta oferta de empleo.?');"class="tool borrar">Borrar</a></td>
    
    -->
    </tr>
  <?PHP endforeach;?>
  </table>

</div>
<div class="paginacion">
<?PHP echo $paginacion;?>
</div>