<div class="bloque">
<h2>Panel de administraci&oacute;n</h2>
<div class="fila">
<p><a href="<?PHP echo site_url('home/agregar');?>" class="tool agregar"> Agregar nuevo empleo</a></p>
<?PHP 

if(isset($canal)&& $canal):?>
<div class="aviso_canal">
<h1>Lea atentamente</h1>
Si deseas que tus ofertas se muestren en : <label class="canal">http://<?PHP echo $canal;?>.hayempleo.com</label><br />

Tu oferta debe de contener por lo menos una de las siguientes palabras: <?PHP echo $claves;?>
</div>
<p><a href="<?PHP echo site_url('home/agregar');?>" class="tool agregar"> Agregar nuevo empleo</a></p>
<?PHP endif;?>
</div>
<div class="fila">
<p><a href="<?PHP echo site_url('home/listar');?>" class="tool listar"> Listar ofertas publicadas</a></p>
</div>
</div>


<?PHP if(isset($widgets1)):?>

<?PHP echo $widgets1;?>

<?PHP endif;?>

<?PHP if(isset($widgets2)):?>
<div class="bloque">
<?PHP echo $widgets2;?>
</div>
<?PHP endif;?>