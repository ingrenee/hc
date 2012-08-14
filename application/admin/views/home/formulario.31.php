<?PHP header('Content-Type: text/html; charset=utf-8');?>

<script>
function desactiva(v)
{
	//document.getElementById(v).disabled=true;
	$('#'+v).hide();
	$('#'+v).val(99999);
	}
function activa(v)
{
	//document.getElementById(v).disabled=false;
		$('#'+v).show();
		$('#'+v).val('');
	}
</script>
<div align="center">
    
    
    <div class="fila2">
      <div class="colu_1"><?PHP _ayuda('estado');?>Estado de la oferta</div>
      <div class="colu_2">
        
          <label>
            <input type="radio" name="estado" 
   <?PHP if(@$empleo['estado']=='publicado'): echo 'checked="checked"';?>
   
   <?PHP else:?>
          <?PHP echo set_radio('estado','publicado');?>
          <?PHP endif;?>
   
   
            value="publicado" id="estado_0" />
            Publicado</label>
        
          <label>
            <input type="radio" name="estado" 
<?PHP if(@$empleo['estado']=='pendiente'): echo 'checked="checked"';?>            
<?PHP else:?>
          <?PHP echo set_radio('estado','pendiente');?>
          <?PHP endif;?>

             value="pendiente" id="estado_1" />
            No publicado</label>
            
            <?PHP echo form_error('estado');?>
        
      </div>
    </div>
    
    
    
    
    <div class="fila2">
      <div class="colu_1"><?PHP _ayuda('empresa');?>Empresa Solicitante</div>
      <div class="colu_2">
        <input name="nombre_empresa" type="text"  id="nombre_empresa" value="<?PHP echo $usuario['nombre'];?>"  class="caja"maxlength="80" /> <?PHP echo form_error('nombre_empresa');?>
      </div>
    </div>
    <div class="fila2">
      <div class="colu_1"><?PHP _ayuda('ubicacion');?>Ubicaci&oacute;n</div>
      <div class="colu_2">
   <?PHP 
   $js=' ID="pais" onChange="ciudad(\'ciudad\',\''.site_url('home/ciudades').'\')" ';
   if(!isset($_POST['pais'])):?>
   

 <label>Pais :<?PHP echo form_dropdown('pais',$paises,(strlen(@$empleo['pais'])==0)?167:$empleo['pais'],$js);?></label>

 <?PHP else:?>
  <label>Pais :<?PHP echo form_dropdown('pais',$paises,$_POST['pais'],$js);?></label>
 <?PHP endif;?>
 <?PHP echo  form_error('pais');?>
 <span id="ciudad">

 <?PHP if(!isset($_POST['departamento'])):?>
 <?PHP if(@$empleo['departamento']):?>
  <label>Ciudad :<?PHP echo form_dropdown('departamento',$ciudades,$empleo['departamento']);?></label>
  <?PHP else: ?>
    <label>Ciudad :<?PHP echo form_dropdown('departamento',$ciudades);?></label>
  <?PHP endif;?>
 <?PHP else:?>       
 <label>Ciudad :<?PHP echo form_dropdown('departamento',$ciudades,$_POST['departamento']);?></label> 
 <?PHP endif;?>
 </span>
  <?PHP echo  form_error('departamento');?>
     
      </div>
    </div>
    <div class="fila2">
  <div class="colu_1"><?PHP _ayuda('titulo');?>T&iacute;tulo del Puesto</div>

<div class="colu_2">
  <input name="titulo" type="text"  class="caja largo" id="titulo" value="<?PHP echo _e($empleo,'titulo');//$empleo["titulo"];?>" maxlength="50" />
   <?PHP echo form_error('titulo');?>
</div>

</div>


<?PHP 
$arr['']='Cualquiera';
$arr[1]='Administración/Oficina';
$arr[2]='Arte/Diseño/Medios';
$arr[3]='Científico/Investigación';
$arr[4]='Informática/Telecom.';
$arr[5]='Dirección/Gerencia';
$arr[6]='Economía/Contabilidad';
$arr[7]='Educación/Universidad';
$arr[8]='Hostelería/Turismo';
$arr[9]='Ingeniería/Técnico';
$arr[10]='Legal/Asesoría';
$arr[11]='Márketing/Ventas';
$arr[12]='Medicina/Salud';
$arr[13]='Recursos Humanos';
$arr[14]='Otros';

?>

<div class="fila2">
  <div class="colu_1"><?PHP _ayuda('categoria');?>Categoria del empleo</div>

<div class="colu_2">

  <?PHP echo form_dropdown('categoria',$arr,_e($empleo,'categoria'));?>
   <?PHP echo form_error('categoria');?>
</div>

</div>















<div class="fila2">
  <div class="colu_1"><?PHP _ayuda('vacantes');?>Vacantes</div>

<div class="colu_2">
  <input name="vacantes" type="text"  id="vacantes" value="<?PHP echo _e($empleo,'vacantes');?>"  maxlength="5" />
     <?PHP echo form_error('vacantes');?>
</div>
</div>



<div class="fila2">
<div class="colu_1"><?PHP _ayuda('modalidad');?>Modalidad de Empleo</div>

<div class="colu_2">
<!--
  <select name="modalidades_ID" class="required" id="modalidades_ID">
    <?PHP echo $select;?>
  </select>
  
  -->
  
  
  <select id="modalidades_ID"  name="modalidades_ID">
    <option value="">Seleccione</option> 
    <option value="1" <?php echo set_select('modalidades_ID', '1'); ?> >Tiempo Completo</option> 
    <option value="2" <?php echo set_select('modalidades_ID', '2'); ?> >Medio Tiempo</option> 
    <option value="3" <?php echo set_select('modalidades_ID', '3'); ?> >Por horas</option> 
    <option value="4" <?php echo set_select('modalidades_ID', '4'); ?> >Desde Casa</option> 
    <option value="5" <?php echo set_select('modalidades_ID', '5'); ?> >Por Proyectos</option> 
    <option value="6" <?php echo set_select('modalidades_ID', '6'); ?> >Pr&aacute;cticas Pre-Profesionales</option> 
   <!-- <option value="7" <?php echo set_select('modalidades_ID', '7'); ?> >Bolsa UNMSM</option> -->
    <option value="8" <?php echo set_select('modalidades_ID', '8'); ?> >Pr&aacute;cticas Profesionales : Egresado</option> 
    <option value="9" <?php echo set_select('modalidades_ID', '9'); ?> >Pr&aacute;cticas Profesionales</option>  
    </select>
    
       <?PHP echo form_error('modalidades_ID');?>
</div>

</div>






<div class="fila2">
<div class="colu_1"><?PHP _ayuda('experiencia');?>Experiencia</div>

<div class="colu_2">
  <div class="subfila">
<input name="experiencia" 

type="text" class="peque6" id="experiencia" value="<?PHP echo _e($empleo,'experiencia');?>" size="20" />
       
       <label>
        <input name="experiencia_tipo" type="radio" class="peque" id="experiencia_tipo_0" value="a"
  <?PHP if(@$empleo['experiencia_tipo']=='a'):
   echo 'checked="checked"';
  
  else:
   echo set_radio('experiencia_tipo','a');
   endif;
  ?>
           
             />
A&ntilde;os</label>
            <label>
        <input name="experiencia_tipo" type="radio" class="peque"
             
             id="experiencia_tipo_1" value="m"
             
  <?PHP //if(@$empleo['experiencia_tipo']=='m') echo 'checked="checked"';?>
  
  <?PHP if(@$empleo['experiencia_tipo']=='m'):
  echo 'checked="checked"';
  else:
  echo set_radio('experiencia_tipo','m');
  endif;
  ?>
  
  
             
             />

        Meses     
        </label>
           <?PHP echo form_error('experiencia');?>  <?PHP echo form_error('experiencia_tipo');?></div>
         
        </p>

</div>
</div>











<div class="fila2">
<div class="colu_1"><?PHP _ayuda('edad');?>Edad</div>

<div class="colu_2"> 
      Entre 
      <input name="edada" type="text" class="peque6"  id="edada" onkeypress="copiar();"  onkeydown="copiar();" onkeyup="copiar();" value="<?PHP
	   echo _e($empleo,"edada");?>" size="10" maxlength="2"/> 

      &nbsp;&nbsp;
y
       &nbsp;&nbsp;
     <input name="edadb" type="text" class="peque6"  id="edadb" value="<?PHP
		   echo _e($empleo,"edadb");?>" size="10" maxlength="2" /> 
     años

   
    <span class="subfila"><?PHP echo form_error('edada');?></span><span class="subfila"> <?PHP echo form_error('edadb');?></span></div>
</div>











<div class="fila2">
<div class="colu_1">Sexo</div>

<div class="colu_2">
<label>
<input name="sexo" type="radio" class="peque"
          
           id="sexo_0" value="femenino"
             
          <?PHP if(@$empleo["sexo"]=="femenino"):?> checked="checked"
          
          <?PHP else:?>
          <?PHP echo set_radio('sexo','femenino');?>
          <?PHP endif;?> />

             
      Femenino
</label>
<label>
<input name="sexo" type="radio" class="peque"
          
          id="sexo_1" value="masculino"
             
         <?PHP if(@$empleo["sexo"]=="masculino"):?> checked="checked" 
          
         <?PHP else:?>
         <?PHP echo set_radio('sexo','masculino');?>
         <?PHP endif;?> />

      Masculino</label>

<label>
<input name="sexo" type="radio" class="peque" id="sexo_2" value="ambos"
             
          
          <?PHP if(@$empleo["sexo"]=="ambos"):?> checked="checked" 
          
          <?PHP else:?>
          <?PHP echo set_radio('sexo','ambos');?>
          
          <?PHP endif;?>
          />

    Ambos
    </label>
    
    <span class="subfila"><?PHP echo form_error('sexo');?></span></div>
</div>


<div class="fila2">
<div class="colu_1">
Moneda del salario
</div>
<div class="colu_2">

<label>
<input name="salario_tipo" type="radio" id="salario_tipo_0" value="soles" 
            
            
             
    <?PHP if(@$empleo['salario_tipo']=='soles'): echo 'checked="checked"';?>
       
              <?PHP else:?>
          <?PHP echo set_radio('salario_tipo','soles');?>
          <?PHP endif;?>
            />

      Moneda nacional
      </label>
      <label>
      <input type="radio" name="salario_tipo" value="dolares"  
            
    <?PHP if(@$empleo['salario_tipo']=='dolares'): echo 'checked="checked"';?>
             <?PHP else:?>
          <?PHP echo set_radio('salario_tipo','dolares');?>
          <?PHP endif;?>
            id="salario_tipo_1" />
    
      Dolares 
</label>

    <span class="subfila"><?PHP echo form_error('salario_tipo');?></span></div>

</div>



<div class="fila2">
<div class="colu_1">Salario</div>

<div class="colu_2">
  <label>
  <input type="radio" name="salario_2"  onclick="desactiva('salario')" value="1" 
          
           
        
       <?PHP if(@$empleo['salario_2']==1): echo 'checked="checked"';?>
             <?PHP else:?>
          <?PHP echo set_radio('salario_2','1');?>
          <?PHP endif;?>
          
          id="ignorar_salario_0" />

      A tratar
   </label>
     
     <label>     
      <input type="radio" name="salario_2"   onclick="desactiva('salario')" value="2" 
           
       <?PHP if(@$empleo['salario_2']==2): echo 'checked="checked"';?>        
          
           <?PHP else:?>
          <?PHP echo set_radio('salario_2','2');?>
          <?PHP endif;?>
          
          id="ignorar_salario_1" />

      Seg&uacute;n Calificaci&oacute;n
</label>

<label>
      <input name="salario_2" type="radio" id="ignorar_salario_2" 
         onclick="activa('salario')" value="3"
<?PHP if(@$empleo['salario_2']==3): echo 'checked="checked"';?>        
 <?PHP else:?>
          <?PHP echo set_radio('salario_2','3');?>
          <?PHP endif;?>


       />

    Monto 
    
    
    </label>
<input name="salario" type="text" id="salario"

  value="<?PHP  echo  _e($empleo,"salario");?>" />
<span class="subfila"><?PHP echo form_error('salario_2');?></span> <span class="subfila"><?PHP echo form_error('salario');?></span></div>
</div>



<div class="fila2">
<div class="colu_1" style="width:90%"><?PHP _ayuda('contenido');?>Descripci&oacute;n: <span style="color:#F00;">Por favor sea ordenado, y claro separe con saltos de linea el texto que ingresar&aacute;, tratando que sea f&aacute;cil de leer.Puede utilizar negritas.</span><br />




    <textarea name="descripcion" cols="50" rows="7" class="validate[required]" id="descripcion"      
       ><?PHP  echo _e($empleo,'descripcion');?><?PHP echo _e($empleo,'requisitos');?></textarea>
    <span class="subfila"><?PHP echo form_error('descripcion');?></span>
    <div id="funciones_trabajo">
      <ul id="funciones">

</ul>
</div>
</div>
</div>
<div class="fila2">
  <div class="colu_1"><?PHP _ayuda('email_contacto');?>Email de contacto :</div>

<div class="colu_2">
  <input name="email_contacto" type="text" class="caja largo" id="email_contacto" value="<?PHP 
		
		echo _e($empleo,'email_contacto');
		
		?>" size="50" maxlength="50" />
  <span class="subfila"><?PHP echo form_error('email_contacto');?></span></div>
</div>











<div class="fila2">
  <div class="colu_1"><?PHP _ayuda('email_asunto');?>Asunto en el email :</div>

<div class="colu_2">
  <input name="email_asunto" type="text" class="caja" id="email_asunto" value="<?PHP 
		
		echo _e($empleo,'email_asunto');
		
		?>" size="50" maxlength="50" />
  <span class="subfila"><?PHP echo form_error('email_asunto');?></span></div>
</div>





<input type="submit" value="Guardar" id="guardar" />



  
  
  
  </div>
  <script type="text/javascript" src="<?PHP echo base_url('js/tiny_mce/tiny_mce.js');?>"></script>



<script type="text/javascript">



	tinyMCE.init({



		

		mode : "exact",

        elements : "descripcion",

theme : "advanced",
    plugins : "autolink,pagebreak,layer,table,contextmenu,paste,noneditable,wordcount,inlinepopups",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,paste,pastetext,pasteword,|",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true


		



	});



</script>
