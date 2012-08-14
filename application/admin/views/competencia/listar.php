<div class="fila">
<h1>Agregar  competencia</h1>
</div>

<div ID="lista">
<table width="200" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th>Categoria</th>
    <th>Nombre</th>
    <th>Tipo</th>
    <th>Comp. fecha</th>
    <th>Comp. adjunto</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>
  <?PHP  foreach($competencias->result() as $v):?>
  <tr>
    <td>Grados y titulos</td>
    <td><?PHP echo $v->nombre;?></td>
    <td> seleccion multiple</td>
    <td>Sí</td>
    <td>Sí</td>
    <td><a href="#" class="tool editar">editar</a></td>
    <td><a href="#" class="tool borrar">borrar</a></td>
  </tr>
  <?PHP endforeach; ?>
  <tr>
    <td>Grados y titulos</td>
    <td>Bachiller</td>
    <td> seleccion multiple</td>
    <td>Sí</td>
    <td>Sí</td>
    <td><a href="#" class="tool editar">editar</a></td>
    <td><a href="#" class="tool borrar">borrar</a></td>
    </tr>
</table>

</div>

<div class="paginacion">
<ul><li><a href="#">1</a></li>
  <li><a href="#">2</a></li>

<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
</ul>
</div>