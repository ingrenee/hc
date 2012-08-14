<div class="bloque">
<h2>Panel de administraci&oacute;n</h2>
<div class="filas">

<?PHP 

if(isset($canal)&& $canal):?>
<div class="aviso_canal">
<h1>Lea atentamente</h1>
Si deseas que tus ofertas se muestren en : <label class="canal">http://<?PHP echo $canal;?>.hayempleo.com</label><br />

Tu oferta debe de contener por lo menos una de las siguientes palabras: <?PHP echo $claves;?>
</div>

<?PHP endif;?>
</div>
<div class="fila"><p><a href="<?PHP echo site_url('home/agregar');?>" class="tool2 agregar2"> Agregar nuevo empleo</a><a href="<?PHP echo site_url('home/listar');?>" class="tool2 listar2"> Listar empleos registrados</a></p>
</div>
</div>

<?PHP 
 $t=$this->native_session->userdata('login_datos');
if($t['tipo']!='interno'):?>
<div class="bloque">
<div class="cuerpo_feed">
<h2><span style="color:#0099CC">tu_empresa</span>.hayempleo.com</h2>
<ul>
<li>Adquiere tu propio <strong>subdominio [tu_empresa.hayempleo.com]</strong> donde tendrás todas tus ofertas de empleo.<b>Es <span class="gratis">&nbsp;</span></b><br />
<a href="<?PHP echo site_url('subdominios/index');?>" class="botonsito">Ingresa aqui</a></li>
</ul>
</div>
</div>
<?PHP endif;?>

<?PHP if($t['tipo']!='interno'):?>
<?PHP if(isset($widgets3)):?>

<?PHP echo $widgets3;?>

<?PHP endif;?>
<?PHP endif;?>

<?PHP if(isset($widgets1)):?>

<?PHP echo $widgets1;?>

<?PHP endif;?>

<?PHP if(isset($widgets2)):?>
<div class="bloque">
<?PHP echo $widgets2;?>
</div>
<?PHP endif;?>