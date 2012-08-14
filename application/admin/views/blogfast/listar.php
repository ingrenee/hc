  <link rel="stylesheet" href="<?PHP echo base_url('js/tinybox2/style.css');?>" />
<script type="text/javascript" src="<?PHP echo base_url('js/tinybox2/tinybox.js');?>"></script>

<h2>Lista de publicaciones registradas</h2>
<p class="info">
<a class="tool agregar" href="<?PHP echo site_url('blogfast/index/');?>"> Agregar publicación</a>
&nbsp;</p>
<p>
<?PHP _mensajes();?>
</p>

<div class="info barra_info">
( <?PHP echo $total; ?> ) publicaciones: 
</div>
<div id="lista">
  <table width="200" border="0" cellpadding="4" cellspacing="0">
  <tr>
    <th>Fecha de modificación</th>   <th>Imagen</th>
    <th>Título</th>
    <th>Estado</th>
     <th>Mostrar en portada</th>
    <th>Autor</th>
       <th></th><th></th>
  </tr>
  <?PHP if($filas->num_rows()>0):?>
  <?PHP foreach($filas->result_array() as $k => $v):?>
  <tr>
<td><?PHP echo $v['modificado'];?></td>
<td><?PHP echo $v['imagen'];?></td> <td><?PHP echo $v['titulo'];?></td>
<td>

<?PHP echo ($v['estado']=='publicado')?'publicado':'No publicado';?> 

<a href="<?PHP echo site_url('blogfast/estado/'.$v['ID'].'/'.$v['estado']);?>" class="tool3 cambiar">Cambiar</a>

</td>
<td><?PHP echo $v['portada'];?> 
<a href="<?PHP echo site_url('blogfast/portada/'.$v['ID'].'/'.$v['portada']);?>" class="tool3 cambiar">Cambiar</a>
</td>

    <td><?PHP echo $v['autor'];?></td>
    <td>
     
   
    <a href="<?PHP echo site_url('blogfast/editar/'.$v['ID']);?>" class="tool editar">Editar</a>

    </td>
  
    <td><a href="<?PHP echo site_url('blogfast/borrar/'.$v['ID']);?>"  onclick="return  confirm('Esta seguro de borrar esta publicado.?');"class="tool borrar">Borrar</a></td>
    
  
    </tr>
  <?PHP endforeach;?>
  <?PHP else:?>
  
  <tr>
    <td colspan="6">No has publicado ningun contenido</td>
    </tr>
  <?PHP endif;?>
  </table>

</div>
<div class="paginacion">
<?PHP echo $paginacion;?>
</div>