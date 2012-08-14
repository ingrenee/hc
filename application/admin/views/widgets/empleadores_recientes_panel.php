<div class="bloque">


    <h2>Empresas Registradas recientemente</h2>

    
<div class="cuerpo_feed" >
<span class="tuercas"></span>
<ul>
<?PHP  foreach($filas->result_array() as $k => $v):?>
<?PHP if($v['tipo']!='interno'):?>
<li class="c2">
<a target="_blank" href="<?PHP echo base_url('empresa-'._titulo($v['nombre'],'').'-'.$v['ID'].'.html');?>"><?PHP echo ucwords(strtolower($v['nombre']));?></a> | <span style="font-size:11px; color:#0d90b3;"><?PHP echo $this->empleador->rubro($v['rubro'])?></span>

</li>
<?PHP endif;?>
<?PHP endforeach;?>

</ul>
</div>
</div>
