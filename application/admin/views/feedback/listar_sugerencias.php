<h2>Tus sugerencias enviadas | <a href="<?PHP echo site_url('feedback/sugerencias');?>"> Enviar una sugerencia </a>
</h2>

<div id="lista">
<table>

<tr>
<th>Estado</th>
<th>Asunto</th>
<th>Sugerencia</th>
<th>Respuesta</th>

<th>Creado</th>


</tr>
<?PHP foreach($filas->result_array() as $k => $v):?>
<tr>
<td><?PHP echo $v['estado'];?></td>
<td><?PHP echo $v['asunto'];?></td>
<td><?PHP echo $v['sugerencia'];?></td>
<td><?PHP echo $v['respuesta'];?></td>


<td><?PHP echo $v['creado'];?></td>
</tr>
<?PHP endforeach;?>
</table>
</div>