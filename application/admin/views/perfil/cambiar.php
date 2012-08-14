<h2>Cambiar contrase&ntilde;a de acceso</h2>



<div class="mensaje">
<?PHP echo $this->native_session->flashdata('mensaje');?>
</div>

<?PHP echo form_open();?>

<div class="fila2">
<div class="colu_1">Contraseña anterior</div>
<div class="colu_2"><input name="pass" type="password" id="pass" size="20" maxlength="10" />
<?PHP echo form_error('pass');?>
</div>
</div>

<div class="fila2">
<div class="colu_1">Contraseña nueva</div>
<div class="colu_2"><input name="pass_b" type="password" id="pass_b" size="20" maxlength="10" />
<?PHP echo form_error('pass_b');?>
</div>
</div>


<div class="fila2">
<div class="colu_1">Repetir contraseña nueva</div>
<div class="colu_2"><input name="re" type="password" id="re" size="20" maxlength="10" />
<?PHP echo form_error('re');?>
</div>
</div>







<input type="submit" value="Cambiar">
<?PHP echo form_close();?>