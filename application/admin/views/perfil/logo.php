<h2>Informacion de la empresa : subir logo</h2>

<div onDblClick="" class="fila2">
<?PHP _imagen($id,'logo_');?>
</div>


<span class="error"><?php echo $error;?></span>
  
  
  
  <div class="fila2">
  <?php echo form_open_multipart('perfil/logo');?>
  
  <input type="file" name="userfile" size="20" />
  
  <br /><br />
  
  <input type="submit" value="upload" />


</form>
</div>