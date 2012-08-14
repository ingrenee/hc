<h2>Informacion de la empresa : subir banner web</h2>
Para ver tu  banner puedes ingresar a : <strong>www.hayempleo.com/<span style="color:#F00">[ruc de empresa]</span></strong>, si deseas una personalización de la pagina donde se muestran todas tus ofertas, envia un email a <strong>administracion@hayempleo.com con tu RUC,y la direccion de tu sitio web</strong>, para personalizarla. Este servicio es gratis y serás atendido según el numero de publicaciones que tengas.
<div onDblClick="" class="fila2">
  <?PHP _imagen($id,'banner_');?>
</div>


<span class="error"><?php echo $error;?></span>
  
  
  
  <div class="fila2">
  <?php echo form_open_multipart('perfil/banner');?>
  
  <input type="file" name="userfile" size="20" />
  
  <br /><br />
  
  <input type="submit" value="upload" />


</form>
</div>