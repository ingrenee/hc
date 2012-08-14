<link rel="stylesheet" href="<?PHP echo base_url('js/tinybox2/style.css');?>" />
<script type="text/javascript" src="<?PHP echo base_url('js/tinybox2/tinybox.js');?>"></script>
<h2>Configuración de publicaciones</h2>

<?PHP echo _mensajes();?>
<form method="post">
<div class="fila2">

      <div class="colu_1"><?PHP _ayuda('widget_noticias');?>Cuadro de noticias</div>

      <div class="colu_2">

        <?PHP 
		$op[1]='SI Mostrar cuadro de noticias';
		$op[2]='NO Mostrar cuadro de noticias';
		?>

         <?PHP echo form_dropdown('mostrar_noticias',$op,_e($info,'mostrar_noticias'));?>

         

        

      </div>

</div><input type="submit" value="Guardar opciones y actualizar página">
</form>