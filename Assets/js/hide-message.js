/* 
 * hide the pop-up confirmation message upon clicking OK button.
 */


function hideMessage () {
            
            var div = document.getElementById("confirmation-message-box");
            
            if (div.style.display !== "none") {
                //hide the div
                div.style.display = "none";
                
            }
            else {
               div.style.display = "block";
            }      
            
            
        }// end func
        
