$(document).ready(function()
 {
	var grade=document.getElementById("grade").value;
	
	if(grade==="Grade 12")
	{
		$("#matricType").show();
	}
        else
        {
            $("#matricType").hide();
        }
});

function decide()
{
	var grade=document.getElementById("grade").value;
	
	if(grade==="Grade 12")
	{
		$("#matricType").show();
	}
        else
        {
            $("#matricType").hide();
        }
}

