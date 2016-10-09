       
        <!-- ....................... MY COURSES PANEL .......................... -->
        <section class="my-courses-view page-wrap">  
            
            <div class="my-courses-panel">
                <h2>My Courses</h2>   
            </div> <!-- my-courses-panel -->
                <!-- ................. ACCORDIAN BEGINS HERE ................... -->
                <section class="data-container">
						<?php  foreach  ($courseNames as $names)
							  {
							  	
								foreach ($subjectName as $subject)
									{
							  	//	var_dump($courseNames);
									//die();
							  	
						?>
                    <div class="ac">
						
						
						
                        <!-- FIRST LEVEL  -->
                        <!-- uses check-box's, but hidden in CSS -->  
                        <input class="ac-input" id="ac-1" name="ac-1" type="checkbox" />                       
                        <!-- ................................................... -->
                        <!--              LIST DEGREE'S/COURSES                  -->
                        <!-- ................................................... --> 
                        <!-- [PLACE HOLDER TEXT FOR DEGREE'S LISTED]  -->
                        
                        
						<label class="ac-label" for="ac-1"><?php echo  $names->CourseName; ?></label>
                        <article class="ac-text">
                            <!-- ............................................... -->
                            <!--              LIST SUBJECT/UNIT'S                -->
                            <!-- ............................................... --> 
                            <div class="ac-sub">
                                <!-- check-box hidden in CSS -->
                                <input class="ac-input" id="ac-2" name="ac-2" type="checkbox" />
                                <!-- [PLACE HOLDER TEXT FOR UNITS LISTED]  --> 
                                <label class="ac-label" for="ac-2"> <?php echo  $subject->SubjectName; ?> </label>
                                <article class="ac-sub-text">
                                    <!-- ....................................... -->
                                    <!--             LIST PROJECTS               -->
                                    <!-- ....................................... -->

                                    <!-- THIRD LEVEL (expanded when clicked) -->
                                    <h3 class="projects-header">Projects:</h3>
                                    <ul class ="list-projects">
                                        <!-- [PLACE HOLDER TEXT FOR PROJECTS LISTED TO A UNIT]  -->
                                        <li><a href="#">Super Duper Project</a></li>
                                        <li><a href="#">The Next Facebook </a></li>
                                        <li><a href="#">Team Allocation Tool</a></li>
                                    </ul>  
                               </article>    

                            </div> <!-- /ac-sub -->
                        </article>
                    </div> <!-- /ac -->
                    
                    <?php } }  ?> 
                </section> <!-- /data-container -->
                <!-- .................. ACCORDIAN END  ......................... -->
        </section> <!-- my-courses-view -->
