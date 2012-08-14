// JavaScript Document

function rload(div,ur)
{
	$('#'+div).load(ur);
	}
	
	
	function ciudad(div,ur)
	{
	 var pais=$('#pais').val();
		
		rload(div,ur+'/'+pais);
		}