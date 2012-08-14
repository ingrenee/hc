<div class="formulario">
<h2>Enviar Sugerencias | <a href="<?PHP echo site_url('feedback/listar_sugerencias');?>">Listar sugerencias</a></h2> 

<div class="fila">
  <p>Sabemos que tienes varias sugerencias para nosotros, vamos! dilas, <b>nosotros si las vamos a leer </b>, queremos mejorar.</p>
</div>
<form method="post">
<div class="fila2">
      <div class="colu_2" style="float:left">Asunto<br>
<?PHP echo form_input('asunto');?><?PHP echo form_error('asunto');?></div>
      
      
</div>

<div class="fila2">
      <div class="colu_2" style="float:left">Tu sugerencia <br>
<textarea name="sugerencia" cols="50" id="sugerencia" style="height:100px"></textarea> 
      <?PHP echo form_error('sugerencia');?></div>

</div>
<input type="submit" value="Enviar sugerencia">


</form>
</div>
