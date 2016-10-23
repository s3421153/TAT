//script for edit projects popup form
//by Anathe Deans


$(document).ready( function () {
        
     //find the project links
     $('.load-form').click(function () {
        //once clicked, open the dialog
		
	var projName = this.id;
	
	var json=($.cookie(projName));
	var obj = $.parseJSON(json);
//  console.log("my object: %o", obj);
	
//	console.log ("Name: %o", obj.Name);
	
    $( "#edit-project-form" ).dialog("open");
	
	$("#projectname").val(obj.Name); 
	
//	var e = document.getElementById("min");
	var minval =obj.StudentMin;
	
//	console.log (minval);
//	var min = e.options[e.selectedIndex].minval;
	
	$("#min").val(minval);
	$("#max").val(obj.StudentMax);
	
	if (obj.TakeGPAintoAccount == 1)
		{
			
		$("#yesgpa").attr('checked', true);
		
		}
	else
		{
		$("#yesgpa").removeAttr("checked");
		}
		
	if (obj.GenderBalance == 1)
		{
			
		$("#yesgender").attr('checked', true);
	
		}
	else
		{
		$("#yesgender").removeAttr("checked");
		}		

	$('#ProjectID').val(obj.ProjectID);
		 
     });
    
    
    
    //FORM ATTRIBUTES
    $( "#edit-project-form" ).dialog({
        modal: true,
        width: 800,
        height: 800,
        autoOpen: false
        
    }); 
});
         
  $(function(){
	//acknowledgement message
    var message_status = $("#status");
    $("td[contenteditable=true]").blur(function(){
        var field_userid = $(this).attr("id") ;
        var value = $(this).text() ;
        $.post('ajax.php' , field_userid + "=" + value, function(data){
            if(data != '')
			{
				message_status.show();
				message_status.text(data);
				//hide the message
				setTimeout(function(){message_status.hide()},3000);
			}
        });
    });
});
      
