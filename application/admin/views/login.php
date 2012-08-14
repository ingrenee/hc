
<h2>Empresas</h2>
<h1 class="titulo02">Acceder a la plataforma</h1>






<div class="formulario">
<?php echo form_open('welcome/login'); ?>




           <div class="fila">
           <div class="caption"> Email </div>

            <?php echo form_input('email', set_value('email'),'class="largo"'); ?>
            <?PHP  echo form_error('email');?>
            </div>

     
            <div class="fila">
            <div class="caption">
            Password</div>

            <?php echo form_password('password'); ?>
                        <?PHP  echo form_error('password');?>
            </div>

    
            <div class="fila2"><input type="submit" value="Ingresar" /></div>

   

<?php echo form_close(''); ?>
</div>