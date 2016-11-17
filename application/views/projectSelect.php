       
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
                                    
                                
                                    
                                    	<a href="<?php echo site_url('Algorithm/run_alg/'.$names->CourseID.'/'.$subject->SubjectID); ?>"
                                    	<button type="submit" class="btn btn-info btn-small"  title="Allocate Team"/>  Allocate Team </a>
                                        <br/>
                                        <ul class ="list-projects">
                                   
                               
                                    <?php 
                                    
                                   
                                    	 foreach ($projectName as $project) 
                                  			{
                                    	 		
											if ($project->P_SubjectID == $subject->SubjectID)
                                    			{
                                    			echo '<li> <a class="load-form" id="'. $project->ProjectID  . '">'. $project->Name  . '</a></li>'; 
												
												$json = json_encode($project);
												
												setcookie($project->ProjectID, $json,  strtotime( "+ 60 seconds") );
												} 
												
											}?>
											
                                    </ul>  
                                    </tr>
   									</tbody>
 								</table>
 								
                               </article>    
								<?php   $ac++; } ?> 
                            </div> <!-- /ac-sub -->
                        </article>
                    </div> <!-- /ac -->
               
                    <?php } ?> 
                </section> <!-- /data-container -->
                <!-- .................. ACCORDIAN END  ......................... -->
                
 </section> <!-- my-courses-view -->                
          
       
	<form id="edit-project-form" action="<?php echo site_url("Update/data_submitted");?>" method="post">
           
           <div id="form-header"> <h1>Edit Project</h1> </div>
           
           <!-- TO-DO: PRE-LOAD PROJECT NAME INTO FIELD -->
           <div>
            <label class="title" for="project-name"> Project Name: </label> 
            <input type="text" name="projectnamefield" id="projectname" />
            <input type="hidden" name="projectID" id="ProjectID" value=""/>
           <br/>
           </div>
          
           <!-- SPECIFY RANGE OF MEMBERS -->
           <div>
           <span class="title">Range of Members:</span>
          
               <!-- MINIMUM -->
               <select id="min" name="minnummembers" >
               	   <option value="null"></option>
               	   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
               </select>
               <label for="min" class="shift">MIN</label>
           
        
               <!-- MAXIMUM -->
               <select id="max" name="maxnummembers" >
               	   <option value="null"></option>
               	   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
               </select>
           <label for="max" class="shift">MAX</label> <br/>
           </div>
           
           <!-- CONSIDER GPA -->
           <div>
           <span class="title"> Consider GPA? </span>
           <!-- YES -->
           <input id="yesgpa"  type="checkbox"  name="GPA"  checked=""> 
		
			<span class="title"> Gender Balance? </span>
           <!-- YES --> <br/>
           <input id="yesgender"  type="checkbox" name="Gender" checked=""> 
  
           
           <div id="buttons">

               <button class="assign-grp-btn"> Assign Group </button> <br/>
 
               <!-- SAVE CHANGES TO DB  -->
				<button  value="Submit"> Save Changes </button> <br/>

               <!-- CANCEL/RETURN, OMMIT FROM DB -->
               <button class="cancel-btn"> Cancel/Return </button>
           </div>
           </div>
                
       </form>
     
                

  </div>              

 
