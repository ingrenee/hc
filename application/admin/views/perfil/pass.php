<h2>Información de la empresa</h2>
<div class="mensaje">
<?PHP echo $this->native_session->flashdata('mensaje');?>
</div>
<?PHP echo validation_errors();?>
<?PHP echo form_open();?>

<div class="fila2">
<div class="colu_1">Contraseña anterior</div>
<div class="colu_2"><?PHP  echo form_input('pass');?>
<?PHP echo form_error('pass');?>
</div>
</div>

<div class="fila2">
<div class="colu_1">Contraseña nueva</div>
<div class="colu_2"><?PHP  echo form_input('pass_b');?>
<?PHP echo form_error('pass_b');?>
</div>
</div>


<div class="fila2">
<div class="colu_1">Repetir contraseña nueva</div>
<div class="colu_2"><?PHP  echo form_input('re');?>
<?PHP echo form_error('re');?>
</div>
</div>







<input type="submit" value="Actualizar">
<?PHP echo form_close();?>