<?PHP if($info_empleador['tipo']!='interno'):?>
<h2>Información de la empresa</h2>
<?PHP else:?>
<h2>Información de la Intitución formadora</h2>
<?PHP endif;?>
<div class="mensaje">
<?PHP echo $this->native_session->flashdata('mensaje');?>
</div>
<?PHP //echo validation_errors();?>
<?PHP echo form_open();?>

<div class="fila2">
<div class="colu_1">Nombre de la empresa</div>
<div class="colu_2"><?PHP  echo form_input('nombre',_e($info,'nombre'));?>
<?PHP echo form_error('nombre');?>
</div>

</div>



<div class="fila2">
<div class="colu_1">RUC/CÓDIGO</div>
<div class="colu_2"><?PHP  echo $info['ruc'];?>

</div>
</div>

<div class="fila2">
<div class="colu_1">Descripci&oacute;n/biograf&iacute;a</div>
<div class="colu_2">
<?PHP

if(!isset($_POST['descripcion'])):
$val=_e($info,'descripcion');
else:
$val=$_POST['descripcion'];
endif;
?>
<?PHP  echo form_textarea('descripcion',$val);?>
<?PHP echo form_error('descripcion');?>
</div>
</div>


<div class="fila2">
<div class="colu_1">Dirección</div>
<div class="colu_2"><?PHP  echo form_input('direccion',_e($info,'direccion'));?>
<?PHP echo form_error('direccion');?>
</div>
</div>


<div class="fila2">
<div class="colu_1">Télefono</div>
<div class="colu_2"><?PHP  echo form_input('telefono',_e($info,'telefono'));?>
<?PHP echo form_error('telefono');?>
</div>
</div>

<div class="fila2">
<div class="colu_1">Pagina web</div>
<div class="colu_2"><?PHP  echo form_input('website',_e($info,'website'));?>
<?PHP echo form_error('web');?></div>
</div>


<div class="fila2">
<div class="colu_1">Rubro</div>
<div class="colu_2">

<?PHP if(!isset($_POST['rubro'])):?>
<?PHP  echo form_dropdown('rubro',$rubros,$info['rubro']);?>
<?PHP else:?>
<?PHP  echo form_dropdown('rubro',$rubros,$_POST['rubro']);?>
<?PHP endif;?>
<?PHP echo form_error('rubro');?>
</div>
</div>


<br />
<br />


<div class="fila2">
<div class="colu_1">Nombre de contacto(Su nombre)</div>
<div class="colu_2"><?PHP  echo form_input('encargado',_e($info_empleador,'encargado'));?>
<?PHP echo form_error('encargado');?>
</div>
</div>



<div class="fila2">
<div class="colu_1">Cargo en la empresa</div>
<div class="colu_2"><?PHP  echo form_input('cargo',_e($info_empleador,'cargo'));?>
<?PHP echo form_error('cargo');?>
</div>
</div>






<input type="submit" value="Actualizar">
<?PHP echo form_close();?>