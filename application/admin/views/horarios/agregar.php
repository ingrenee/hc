<div class="formulario">
<div class="nav">
<h1>Horarios</h1>
<h1><?PHP echo $info['titulo'];?></h1>
<h2>Nuevo horario</h2>

</div>
<form action="" method="post">
<input class="boton" type="submit" value="Guardar horario">
<table width="200" border="0" cellpadding="0" cellspacing="0" class="horario">
  <tr>
    <td>&nbsp;</td>
    <th align="center" class="sup">Lu</th>
    <th align="center" class="sup">Ma</th>
    <th align="center"class="sup">Mi</th>
    <th align="center"class="sup">Ju</th>
    <th align="center"class="sup">Vi</th>
    <th align="center"class="sup">Sa</th>
    <th align="center"class="sup">Do</th>
  </tr>
  <!--
  1 8:00  - 8:30
  2 8:30  - 9:00
  3 9:00  - 9:30
  4 9:30  - 10:00
  5 10:00 - 10:30
  -->
  <?PHP 
  $j=8;
  $str='8:00-8:30-9:00-9:30-10:00-10:30-11:00-11:30-12:00-12:30-13:00-13:30-14:00-14:30-15:00-15:30-16:00-16:30-17:00-17:30-18:00-18:30-19:00-19:30-20:00-20:30-21:00-21:30-22:00-22:30-23:00';
  
  $tmp=explode('-',$str);
  
  for($i=0;$i<count($tmp)-1;$i++):
  ?>
  <tr>
    
    <th align="left" class="izq"><?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?> </th>
    
    <td align="center"><label><input class="ch" id="lunes_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"
    name="horario[]" type="checkbox" value="lunes_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"></label></td>
    <td align="center"><label><input  class="ch"id="martes_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>" 
   name="horario[]" type="checkbox" value="martes_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"></label></td>
    <td align="center"><label><input  class="ch"
    id="miercoles_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"
  name="horario[]"type="checkbox" value="miercoles_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"></label></td>
    <td align="center"><label><input  class="ch"
    id="jueves_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"
    name="horario[]" type="checkbox" value="jueves_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"></label></td>
    <td align="center"><label><input  class="ch"
    id="viernes_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"
   name="horario[]" type="checkbox" value="viernes_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"></label></td>
    <td align="center"><label><input  class="ch"
    
    id="sabado_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"
    name="horario[]" type="checkbox" value="sabado_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"></label></td>
    <td align="center"><label><input  class="ch"
    id="domingo_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"
    name="horario[]" type="checkbox" value="domingo_<?PHP echo $tmp[$i]?>-<?PHP echo $tmp[$i+1];?>"></label></td>
  </tr>
  <?PHP endfor;?>

</table>
</form>
</div>
<script>

$(document).ready(function() {
$('input.ch').click(function(){
  if (this.checked){ 
 // alert(0);
  //alert(this.parent());
  $(this).parent().css("background", "#2882D0");
  }
  else { $(this).parent().css("background", "");}    
});
});



</script>