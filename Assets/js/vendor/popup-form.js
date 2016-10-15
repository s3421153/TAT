//script for edit projects popup form
//by Anathe Deans


$(document).ready( function () {
        
     //find the project links
     $('.load-form').click(function () {
        //once clicked, open the dialog
		
		var projName = this.id;
		
        $( "#edit-project-form" ).dialog("open");
	
	$("#project-name").val(projName); 
	
		 
     });
    
    
    
    //FORM ATTRIBUTES
    $( "#edit-project-form" ).dialog({
        modal: true,
        width: 800,
        height: 800,
        autoOpen: false
        
    }); 
});
         
         
      
