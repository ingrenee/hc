<div class="formulario">
<h2>Enviar buenos comentarios | <a href="<?PHP echo site_url('feedback/listar_animos');?>">Listar buenos comentarios</a></h2> 

<div class="fila">
 
<p>El trabajo es duro, pero  si te gusta hayempleo.com, no estamos trabajando  en vano,  que esperas queremos  leer tus palabras de animos.</p>
</div>
<form method="post">


<div class="fila2">
      <div class="colu_2" style="float:left">Ingresa aqui tus  buenos comentarios. <br>
<textarea name="sugerencia" cols="50" id="sugerencia" style="height:100px"></textarea> 
      <?PHP echo form_error('sugerencia');?></div>

</div>
<input type="submit" value="Enviar buenos comentarios">


</form>
</div>
