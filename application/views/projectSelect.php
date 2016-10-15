       
        <!-- ....................... MY COURSES PANEL .......................... -->
        <section class="my-courses-view page-wrap">  
            
            <div class="my-courses-panel">
                <h2>My Courses</h2>   
            </div> <!-- my-courses-panel -->
                <!-- ................. ACCORDIAN BEGINS HERE ................... -->
                <section class="data-container">
                		
						<?php $ac=1; foreach  ($courseNames as $names)
							  {
							  	
								
						?>
                    <div class="ac">
						
						
						
                        <!-- FIRST LEVEL  -->
                        <!-- uses check-box's, but hidden in CSS -->  
                        <input class="ac-input" id="ac-1" name="ac-<?php echo $ac ?>" type="checkbox" />                       
                        <!-- ................................................... -->
                        <!--              LIST DEGREE'S/COURSES                  -->
                        <!-- ................................................... --> 
                        <!-- [PLACE HOLDER TEXT FOR DEGREE'S LISTED]  -->
                        
                      
                        
						<label class="ac-label" for="ac-<?php echo $ac ?>"><?php echo  $names->CourseName; ?></label>
						 <?php $ac++; ?>
                        <article class="ac-text">
                            <!-- ............................................... -->
                            <!--              LIST SUBJECT/UNIT'S                -->
                            <!-- ............................................... --> 
                           
                              
                               
                                <!-- [PLACE HOLDER TEXT FOR UNITS LISTED]  --> 
                                <?php foreach ($subjectName as $subject) {
                                	
									?>
									 <div class="ac-sub">
									<input class="ac-input" id="ac-<?php echo $ac; ?>" name="ac-2" type="checkbox" />
									
									<?php
									
									 echo '<label class="ac-label" for="ac-'. $ac . '"> '. $subject->SubjectName .   ' </label> ';   ?>
                                  <!-- check-box hidden in CSS -->
                                 
                                <article class="ac-sub-text">
                                    <!-- ....................................... -->
                                    <!--             LIST PROJECTS               -->
                                    <!-- ....................................... -->

                                    <!-- THIRD LEVEL (expanded when clicked) -->
                                    <h3 class="projects-header">Projects:</h3>
                                    <ul class ="list-projects">
                                        
<!-- *********** GUY! ADDED A CLASS HERE TO THE <a> LINKS THAT IS USED BE JAVASCRIPT FOR AN ONCLICK EVENT ************* -->                     
                                    	 <?php foreach ($projectName as $project) 
                                  			{
                                    	 	
											if ($project->P_SubjectID == $subject->SubjectID)
                                    			{
                                    			echo '<li> <a class="load-form" id="'. $project->Name  . '">'. $project->Name  . '</a></li>'; 
												} 
												
											}?>
											
                                    </ul>  
                               </article>    
								<?php   $ac++; } ?> 
                            </div> <!-- /ac-sub -->
                        </article>
                    </div> <!-- /ac -->
               
                    <?php } ?> 
                </section> <!-- /data-container -->
                <!-- .................. ACCORDIAN END  ......................... -->
                
 </section> <!-- my-courses-view -->                
          
       
	<form id="edit-project-form" action="#" method="post">
           
           <div id="form-header"> <h1>Edit Project</h1> </div>
           
           <!-- TO-DO: PRE-LOAD PROJECT NAME INTO FIELD -->
           <div>
            <label class="title" for="project-name"> Project Name: </label> 
            <input type="text" name="project-name-field" id="project-name" />
            
           <br/>
           </div>
           
           
           <!-- SPECIFY RANGE OF MEMBERS -->
           <div>
           <span class="title">Range of Members:</span>
          
               <!-- MINIMUM -->
               <select name="min-num-members" id="min">
                   <option value="4">4</option>
                   <option value="4">5</option>
                   <option value="6">6</option>
               </select>
               <label for="min" class="shift">MIN</label>
           
        
               <!-- MAXIMUM -->
               <select name="max-num-members" id="max">
                   <option value="4">4</option>
                   <option value="4">5</option>
                   <option value="6">6</option>
               </select>
           <label for="max" class="shift">MAX</label> <br/>
           </div>
           
           
           <!-- CONSIDER GPA -->
           <div>
           <span class="title"> Consider GPA? </span>
           <!-- YES -->
           <input id="yes-gpa" type="radio" name="yes" value="1"> <!-- NOTE VALUE IS SET TO NUMERIC 1 TO INDICATE TRUE ON BOOLEAN -->
           <label for="yes-gpa" class="shift"> YES </label>
           
           <!-- NO -->
           <input id="no-gpa" type="radio" name="no" value="0">   <!-- NOTE VALUE IS SET TO NUMERIC 0 TO INDICATE FALSE ON BOOLEAN -->
           <label for="no-gpa" class="shift"> NO </label> <br/>
           </div> 
           
           
           <!-- SUBMIT FORM -->
           <div id="buttons">
           <!-- SAVE CHANGES TO DB  -->
           <button> Save Changes </button> <br/>
           
           <!-- CANCEL/RETURN, OMMIT FROM DB -->
           <button class="cancel-btn"> Cancel/Return </button>
           </div>
                
       </form>
       <!-- ==================================================================== -->
       <!--                          END POP-UP FORM                             -->
       <!-- ==================================================================== -->
                
 ?>
                
 
