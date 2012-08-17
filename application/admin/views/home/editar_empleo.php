

<script type="text/javascript" src="<?PHP echo base_url('html/jquery-1.6.4.min.js');?>"></script>






<script>




	
var funArray=new Array();
var reqArray=new Array();
var funIndice=0;



function crear(ul,campo,campo2,tipo) {



// Obtenemos el valor entrado en la caja de texto
var valor = document.getElementById(campo2).value;

if(valor!=''){
var arrayTemp=Array();
if(tipo=='fun'){
funArray[funArray.length]=valor;
arrayTemp=funArray;
}else
{

reqArray[reqArray.length]=valor;
arrayTemp=reqArray;
}
inprimir_endiv(ul,arrayTemp,campo,tipo);
if(tipo=='fun'){
funIndice=funIndice+1;
imprimir(campo,funArray);
}else
{
imprimir(campo,reqArray);
}
document.getElementById(campo2).value = "";

}else
{
alert('No deje el campo vacio.');
}


}

function inprimir_endiv(ulul,arrayTemp,campo,tipo)
{

eliminarTodo(ulul);

var ul = document.getElementById(ulul);

for(i=0;i<arrayTemp.length;i++){
if(arrayTemp[i]!=null){
var li = document.createElement("LI");
li.innerHTML = arrayTemp[i];
li.onclick = function(){eliminarf(this,ulul,campo,tipo);}
ul.appendChild(li);
}
}
}
//----------------------------------------
function imprimir(campo,funArrayTemp)
{
var obj=document.getElementById(campo);

obj.value='';
for(i=0;i<funArrayTemp.length;i++)
{

if(funArrayTemp[i]!=10000){
obj.value=obj.value+'<p>'+funArrayTemp[i]+'</p>';
}

}

}
//------------------------------

function eliminarTodo(ul)
{

var el = document.getElementById(ul);
while(el.hasChildNodes()){
  el.removeChild(el.lastChild);
}
}
//-----------------------------
function eliminarf(id,ulul,campo,tipo)
{
 if(confirm('Desea eliminar esta entrada?')){


var lis= document.getElementById(ulul).getElementsByTagName("li");

for(i=0;i<lis.length;i++)
{
if(lis[i].innerHTML==id.innerHTML)
{

if(tipo=='fun'){
funArray.splice(i,1);
}else
{
reqArray.splice(i,1);
}
}

}

if(tipo=='fun'){
imprimir(campo,funArray);
}else
{
imprimir(campo,reqArray);
}

document.getElementById(ulul).removeChild(id);
}

}

</script>

















<div class="formulario">



<h2>Editar Oferta de Empleo</h2>
<form id="form1" name="form1" method="post" action="<?PHP
site_url('home/editar_entrada/'.$entrada_ID)?>">
  
  
  <?PHP $this->load->view('home/formulario');?>
  
  
  
  
  
  
</form>

</div>

<script>
function addFun()
{

 var f=document.getElementById('ignorar_funcion').value;
 var fun=document.getElementById('descripcion');

 fun.value= fun.value +'\n - '+f;
}


function validarNum(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;

    patron = /\d|\D/;
    te = String.fromCharCode(tecla);
	
	if((tecla!=38 && tecla!=40) && (tecla!=13 && tecla!=0) ){
	
	
	if(!(e.ctrlKey)){
	return true;
	}else
	{
	alert('No puede usar Ctrl.');
	}
	
	}else
	{
	return false;
	}
}

function derecho(e)
{
if(e.button==2)
{

alert('Ingrese la informacion en el cuadro de texto inferior.');
document.getElementById('ignorar_funcion').focus();
}
}


</script>

