<link href="<?PHP echo base_url('css/anuncios.css');?>" rel="stylesheet" type="text/css" />
<form  method="post">
<div class="formulario2">

<h2>Activar subdominio gratis</h2>
<div class="fila2">
  <p>A continuación te pediremos el nombre  para tu subdominio, y la dirección de la pagina  web de  tu  empresa, esta ultima la tomaremos como  referencia para personalizar tu subdominio, recuerda este servicio es gratis.( Creación  y personalización de tu subdominio.)</p>
</div>
<div class="fila2">
<div class="colu_1">
1. Ruc de empresa
</div>
<div class="colu_2">
<?PHP echo $info['ruc'];?>
</div>
</div>


<div class="fila2">
<div class="colu_1">
2. Empresa
</div>
<div class="colu_2">
<?PHP echo $info['nombre'];?>
</div>
</div>


<?PHP if(!$subdominio):?>
<div class="fila2">
<div class="colu_3"> 3. Ingrese el  nombre que quiere que aparesca en el subdominio (sin espacios)</div>
<div class="colu_4">
http://<?PHP echo form_input('subdominio',set_value('subdominio'));?>.hayempleo.com
<?PHP echo form_error('subdominio');?>
</div>
</div>
<?PHP else:?>
<div class="fila2">
<div class="colu_3">
3. El subdominio ya fue solicitado. <br>


</div>
<div class="colu_4">
http://<?PHP echo str_replace('.hayempleo.com','',$subdominio['nombre']);?>.hayempleo.com | (Este servicio es gratuito)
</div>
<p><strong>Estado del dominio</strong>: <?PHP echo $subdominio['estado'];?>
</p>
<p>&nbsp;</p>
<p>Una vez que terminemos de personalizar tu subdominio te enviaremos un email para que ya puedas usarlo en tu web institucional.</p>
</div>

<?PHP endif;?>

<?PHP if(!$subdominio):?>

<div class="fila2">
<div class="colu_3">
4. Web de la empresa, sera la que usaremos de referencia para crear tu subdominio.
</div>
<div class="colu_4">

<input name="web" type="text" class="" id="web" value="<?PHP  echo @$info['website'];?>" size="30">
<span style="font-size:12px;">(http://www.tupagina.com)</span><?PHP echo form_error('web');?>
</div>

</div>

<div class="fila2">
<div class="colu_3">
5. <?PHP echo form_checkbox('acepta',1,set_value('acepta'));?> Sí voy a poner el enlace del subdominio solicitado(mi_empresa.hayempleo.com) en mi web institucional, en un plazo no mayor a 2 semanas.
</div>
<div class="colu_4">


<?PHP echo form_error('acepta');?>
</div>

</div>

<?PHP endif;?>

<div class="anuncio anuncio02">
  <p>No tienes pagina web?<br />
    O tienes problemas con la que ya tienes?<br />
    El equipo de hayempleo.com te puede crear una.<br />
    <a href="<?PHP echo site_url('servicios/web');?>">M&aacute;s informes</a></p>
</div>


<?PHP if(!$subdominio):?>
<input type="submit" value="Solicitar subdominio gratis">
<?PHP endif;?>

</div>
</form>