<div class="formulario">
<h2>Enviar una pregunta | <a href="<?PHP echo site_url('feedback/listar_preguntas');?>">Listar preguntas</a></h2> 

<div class="fila">
  
<p>Tienes alguna duda, sobre hayempleo.com, su formaci&oacute;n, como se solventa, quienes somos,  o quiz&aacute;s una simple pregunta de curiosidad sobre hayempleo.com, vamos  pregunta te responderemos.</p>
</div>
<form method="post">
<div class="fila2">
      <div class="colu_2" style="float:left">Tu pregunta<br>
<?PHP echo form_input('asunto',set_value('asunto'),' style="width:400px; padding-top:6px; padding-bottom:6px;" ');?><?PHP echo form_error('asunto');?></div>
      
      
</div>


<input type="submit" value="Enviar pregunta">


</form>
</div>
