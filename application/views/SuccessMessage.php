

        <script src="Assets/js/hide-message.js"></script>   

     
        <?php 
		successMessage();

        function successMessage () {
             $success_message = '<h2>Project Updated Successfully!</h2>'
                . '<img alt="tick mark" src="Assets/img/tick.png">'
                . '<input type="button"  name="ok"  value="OK" id="ok-button" onclick="hideMessage()" />';
        
        echo '<div id="confirmation-message-box" class= "page-wrap">' . $success_message . '</div>';
            
        }
        
        ?>
  