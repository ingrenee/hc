<link href="<?PHP echo base_url('css/anuncios.css');?>" rel="stylesheet" type="text/css" />
 <form name="form1" method="post" action="">
<div class="formulario2">
<h2>Servicios web</h2>
<?PHP _mensajes();?>
<div class="fila2">

<div class="anuncio anuncio02 sin_hector">
  <p>El equipo de hayempleo.com tiene mucha  experiencia en el desarrollo web, si deseas contar con nuestras habilidades  puedes hacer tus consultas sin compromisos a través del siguiente formulario  y/o comunicarte <br>
    - <strong>vía email   hayempleo@gmail.com</strong>  <br>
    - <strong>vía skype: hayempleo</strong></p>
</div>


</div>


<div class="fila2">
<div class="colu_1">
1.Estoy interesado en:
</div>
<div class="colu_2">
 
    <p>
      <label>
        <input type="checkbox" name="intereses[]" value="hosting" 
		<?php echo set_checkbox('intereses[]', 'hosting'); ?> id="intereses_0">
        Hosting</label>
      <br>
      <label>
        <input type="checkbox" name="intereses[]" value="dominio"
        
        <?php echo set_checkbox('intereses[]', 'dominio'); ?>  id="intereses_1">
        Dominio</label>
      <br>
      <label>
        <input type="checkbox" name="intereses[]" value="crear_pagina_web" <?php echo set_checkbox('intereses[]', 'crear_pagina_web'); ?> id="intereses_2">
        Crear pagina web</label>
      <br>
      <label>
        <input type="checkbox" name="intereses[]" value="crear_aula_virtual"<?php echo set_checkbox('intereses[]', 'crear_aula_virtual'); ?> id="intereses_3">
        Crear un aula virtual</label>
      <br>
      <label>
        <input type="checkbox" name="intereses[]" value="Crear_una_tienda_virtual" <?php echo set_checkbox('intereses[]', 'Crear_una_tienda_virtual'); ?>id="intereses_4">
        Crear una tienda virtual</label>
      <br>
      <label>
        <input type="checkbox" name="intereses[]" value="Desarrollar_una_aplicacion_web" <?php echo set_checkbox('intereses[]', 'Desarrollar_una_aplicacion_web'); ?> id="intereses_5">
        Desarrollar una aplicacion web</label>
      <br>
      <label>
        <input type="checkbox" name="intereses[]" value="desarrollar_un_proyecto_web" <?php echo set_checkbox('intereses[]', 'desarrollar_un_proyecto_web'); ?>id="intereses_6">
        Desarrollar un proyecto web</label>
      <br> 
      
       <label>
        <input type="checkbox" name="intereses[]" value="Consultoria_web"<?php echo set_checkbox('intereses[]', 'Consultoria_web'); ?> id="intereses_7">
        Consultoria web</label>
      <br>
      
       <label>
        <input type="checkbox" name="intereses[]" value="Otros_intereses"<?php echo set_checkbox('intereses[]', 'Otros_intereses'); ?> id="intereses_8">
        Otros requerimientos</label>
      <br>
    </p>
<?PHP echo form_error('intereses[]');?>
</div>

</div>
<div class="fila2">
<div class="colu_3">
2. Escribe aqui tu consulta:
</div>

<div class="colu_4">
<textarea name="sugerencia" id="sugerencia">
</textarea>
</div>
<?PHP echo form_error('sugerencia');?>
</div>
<div class="fila2">
<input  type="submit"value="Enviar consulta">
</div>
</div>  </form>