<div class="fila">
<h1>Agregar  Nueva categoria de competencia</h1>

</div>
<form action="<?PHP echo site_url('categoria/agregar/');?>" method="post">

<div class="fila">
<span>Nombre de categoria</span>
<input name="nombre" type="text" id="nombre">
</div>

<div class="fila">
<span>Descripci&oacute;n de categoria</span>
<textarea name="descripcion" id="descripcion"></textarea>
</div>

<div class="fila">
<input type="submit" value="crear categoria" />
</div>

</form>
