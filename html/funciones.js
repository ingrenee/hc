// JavaScript Document
function jsdep(t)
{
	
	if((t.value==173) || parseInt(t.value)==173)
	{
		$('#departamento').removeAttr('disabled');
			$('#distrito').removeAttr('disabled');
			
		}
		else
		{
			
			$('#departamento').val('');
			$('#distrito').val('');
			$('#distrito_callao').val('');			
			
			$('#departamento').attr('disabled','disabled');
			$('#distrito').attr('disabled','disabled');
			$('#distrito_callao').attr('disabled','disabled');			
			
			}
	
	
	}
	
	function jsdist(t)
{
	if( (t.value==7 || t.value==15) || (parseInt(t.value)==7 || parseInt(t.value)==15) )
	{
			if(t.value==7 || parseInt(t.value)==7){
			$('#distrito').hide();
			$('#distrito').attr('disabled','disabled');
			$('#distrito_callao').show();
			$('#distrito_callao').removeAttr('disabled');
			
				}
				else
				{
					
			$('#distrito_callao').hide();
			$('#distrito_callao').attr('disabled','disabled');
			$('#distrito').show();
			$('#distrito').removeAttr('disabled');
					}	
		}
		else
		{
			

			$('#distrito').val('');
			$('#distrito_callao').val('');

			$('#distrito').attr('disabled','disabled');
			$('#distrito_callao').attr('disabled','disabled');
			}
	
	
	}
	
	// JavaScript Document
function jsdep2(t,i)
{
	
	if((t.value==173) || parseInt(t.value)==173)
	{
		$('#departamento2').removeAttr('disabled');
		$('#distrito2').removeAttr('disabled');
			
		}
		else
		{
			
			$('#departamento2').val('');
			$('#distrito2').val('');
			$('#distrito_callao2').val('');			
			
			$('#departamento2').attr('disabled','disabled');
			$('#distrito2').attr('disabled','disabled');
			$('#distrito_callao2').attr('disabled','disabled');			
			
			}
	
	
	}
	
	function jsdist2(t,i)
{
	if( (t.value==7 || t.value==15) || (parseInt(t.value)==7 || parseInt(t.value)==15) )
	{
			if(t.value==7 || parseInt(t.value)==7){
			$('#distrito2').hide();
			$('#distrito2').attr('disabled','disabled');
			$('#distrito_callao2').show();
			
			$('#distrito_callao2').removeAttr('disabled');
			
				}
				else
				{
					
			$('#distrito_callao2').hide();$('#distrito_callao2').attr('disabled','disabled');
			$('#distrito2').show();
			$('#distrito2').removeAttr('disabled');
					}	
		}
		else
		{
			

			$('#distrito2').val('');
			$('#distrito_callao2').val('');

			$('#distrito2').attr('disabled','disabled');
			$('#distrito_callao2').attr('disabled','disabled');
			}
	
	
	}