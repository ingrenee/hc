<div class="fila">
<h1>Agregar  competencia</h1>
</div>

<form action="<?PHP echo site_url('competencia/agregar/');?>" method="post">

<div class="fila">
<span>Categoria de competencia</span>
<select name="categorias_id" id="categorias_id"></select>
</div>

<div class="fila">
<span>Nombre de competencia</span>
<input name="nombre" type="text" id="nombre">
</div>


<div class="fila">
<span>Descripci&oacute;n de competencia</span>
<textarea name="descripcion" id="descripcion"></textarea>
</div>


<div class="fila">
<span>Tipo de competencia</span>
<select name="tipo" id="tipo">
  <option value="1">Campo de texto</option>
  <option value="2">Lista de opciones</option>
  <option value="3">Boton de opcion</option>
  <option value="4">Seleccion multiple</option>

</select>
</div>

<div class="fila">
<span>Valores de competencia</span>
<input name="valores" type="text" id="valores" value="{etiqueta1:valor1,etiqueta2:valor2}">
</div>

<div class="fila">
<span>Componente de fecha</span>
<label for="comp_fecha"></label>
<select name="comp_fecha" id="comp_fecha">
  <option value="1">Fecha unica</option>
  <option value="2">Rango de fechas</option>
  <option value="3">No mostrar fecha</option>
</select>
</div>


<div class="fila">
<span>Componente de referencia</span>
<label>
    <input type="radio" name="comp_referencia" value="1" id="referencia_0" />
  Si</label>
  
  <label>
    <input type="radio" name="comp_referencia" value="2" id="referencia_1" />
  No</label>
  
<input name="comp_referencia_texto" type="text" id="comp_referencia_texto">

</div>

<div class="fila">
<span>Componente de archivo adjunto</span>
<label>
    <input type="radio" name="comp_adjunto" value="1" id="referencia_0" />
  Si</label>
  
  <label>
    <input type="radio" name="comp_adjunto" value="2" id="referencia_1" />
  No</label>
</div>

<div class="fila">
  <input type="submit" value="Crear competencia" />
</div>
</form>