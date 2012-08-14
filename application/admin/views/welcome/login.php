<div class="login">

<h2>Empresas</h2>
<h1 class="titulo02">Acceder a la plataforma</h1>






<div class="formulario">

<?PHP $h=$this->native_session->flashdata('mensaje');?>

<?PHP
if($h):
?>
<div class="error">
<?PHP echo $h;?>
</div>
<?PHP
endif;
?>
<?php echo form_open('welcome/login'); ?>




           <div class="fila">
           <div class="caption"> Email </div>

            <?php echo form_input('email_contacto', set_value('email_contacto'),' class="largo" '); ?>
            <?PHP  echo form_error('email_contacto');?>
            </div>

     
            <div class="fila">
            <div class="caption">
            Password</div>

            <?php echo form_password('password'); ?>
                        <?PHP  echo form_error('password');?>
            </div>

    
            <div class="fila2"><input type="submit"  class="button large orange"value="Ingresar" /></div>

   

<?php echo form_close(''); ?>
</div>
</div>