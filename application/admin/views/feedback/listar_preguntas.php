<h2>Tus preguntas enviadas | <a href="<?PHP echo site_url('feedback/preguntas');?>"> Enviar una pregunta </a>
</h2>

<div id="lista">
<table>

<tr><th>Estado</th>
<th>Pregunta</th>
<th>Respuesta</th>


<th>Creado</th>


</tr>
<?PHP foreach($filas->result_array() as $k => $v):?>
<tr><td><?PHP echo $v['estado'];?></td>
<td><?PHP echo $v['asunto'];?></td>
<td><?PHP echo $v['respuesta'];?></td>


<td><?PHP echo $v['creado'];?></td>


</tr>
<?PHP endforeach;?>
</table>
</div>