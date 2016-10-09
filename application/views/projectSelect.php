       
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
                                    	 <?php foreach ($projectName as $project) 
                                  			{
                                    	 	
											if ($project->P_SubjectID == $subject->SubjectID)
                                    			{
                                    			echo '<li><a href="'. $project->ProjectID .'">'. $project->Name  . '</a></li>'; 
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
