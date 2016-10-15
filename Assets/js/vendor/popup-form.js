//script for edit projects popup form
//by Anathe Deans


$(document).ready( function () {
        
     //find the project links
     $('.load-form').click(function () {
        //once clicked, open the dialog
        $( "#edit-project-form" ).dialog("open");
         
     });
    
    
    
    //FORM ATTRIBUTES
    $( "#edit-project-form" ).dialog({
        modal: true,
        width: 800,
        height: 800,
        autoOpen: false
        
    }); 
});
         
         
      
