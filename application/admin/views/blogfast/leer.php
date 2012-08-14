<?PHP header('Content-Type: text/html; charset=utf-8');?>



<div class="noticia">
<div class="fila2">
  
  
  
  
  
  <h2>
  <?PHP echo _e($info,'titulo');//$info["titulo"];?>
    
  </h2>
  
  
</div>

<div class="fila2">
  
  
  
  
  
 
 Fecha:<?PHP echo _e($info,'creado');//$info["titulo"];?>
    
 
  
  
</div>
























<div class="fila2">
  <?PHP  echo _e($info,'descripcion');?>
  

</div>

<div class="fila2">

  <div class="colu_1">Autor :   <?PHP  echo _e($info,'autor');?></div>





</div>






</div>

<div class="historial_noticias">
<h3>Historial de publicaciones</h3>
<p>(<?PHP echo $tmp[2];?>) publicaciones</p>
<ul>
<?PHP  foreach($tmp[0]->result_array() as $k => $v):?>
<li><a href="<?PHP echo site_url('blogfast/leer/'.$v['ID']);?>"><?PHP echo $v['titulo'];?></a></li>
<?PHP endforeach;?>
</ul>
<div class="paginacion">
<?PHP echo $tmp[1];?>
</div>
</div>