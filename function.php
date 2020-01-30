<?php

    //session_start();
    include("classes/config.php");
    if (isset($_GET['function'])=='logout')
    {
        session_unset();
    }
    function showInternships()
    {
        $userJob=new user();
        $Jobs=$userJob->showJobs();

        foreach($Jobs as $job)
        {
            echo
            '<div class="card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title  text-primary">'.$job['job_title'].'</h4>
                    <p class=" mb-0 font-bold"><a href="?page=company&id='.$job['company_id'].'">'.$job['name'].'</a></p>
                    <p class=" text-muted font-italic"> Location:  '.$job['jobLocation'].'</p>
                    <div>
                        <table style="width:100%">
                            <tr>
                                <th scope="col">Duration</th>
                                <th scope="col">Stipend</th>
                                <th scope="col">Posted On</th>
                                <th scope="col">Apply By</th>
                            </tr>
                            <tr>
                                <td>'.$job['Duration'].' Months</td>
                                <td>'.$job['Stipend'].' /Months</td>
                                <td>'.$job['post_date'].'</td>
                                <td>'.$job['Apply_by'].'</td>
                            </tr>
                        </table> 
                    </div>
                </div>
                <div class="card-footer text-muted">
                        <p class="card-text"> <a href="?page=viewJob&id='.$job['job_id'].'"> View Details </a> </p>
                </div>
                </div>
            </div>
            '; 
        }
    }
    function showInternship($id)
    {
        $userJob=new user();
        $Job=$userJob->showJob($id);

        echo
        '
            <div class="card">
                <div class="card-body">
                <h4 class="mb-1 card-title text-primary">'.$Job['job_title'].'</h4>
                <p class=" mb-0 font-bold"><a href="?page=company&id='.$Job['company_id'].'">'.$Job['name'].'</a></p>
                <p class="card-text text-muted font-italic">Location : '.$Job['jobLocation'].'</p>
                
                    <table style="width:100%">
                        <tr>
                            <th scope="col">Duration</th>
                            <th scope="col">Stipend</th>
                            <th scope="col">Posted On</th>
                            <th scope="col">Apply By</th>
                        </tr>
                        <tr>
                            <td>'.$Job['Duration'].' Months</td>
                            <td>'.$Job['Stipend'].' /Months</td>
                            <td>'.$Job['post_date'].'</td>
                            <td>'.$Job['Apply_by'].'</td>
                        </tr>
                    </table> 
            </div>
            <div class="card-footer text-muted">
                    <p class="card-text"> '.$Job['job_kind'].' </p>
                    
            </div>
            </div>
            </div>
            
            <div class="card fluid-container mainContainer">
                <div class="card-body">
                    <p class="font-weight-bold">About the Internship/Job</p>
                    <p>'.$Job['job_about'].'</p>
                    <p class="font-weight-bold">Number Of Internships</p>
                    <p>'.$Job['job_number'].'</p>
                    <p class="font-weight-bold">Who can Apply</p>
                    <p>'.$Job['job_eligibilty'].'</p>
                    <p class="font-weight-bold">Perks</p>
                    <p>'.$Job['job_perks'].'</p>
                    <p jobId='.$Job['job_id'].' userid='.$_SESSION['id'].'  job_company='.$Job['name'].' job_title='.$Job['job_title'].'  id="applyBtn" class="btnp btn btn-primary">APPLY NOW</p>
                    
                </div>
                
             </div>
           

        
        ';
    }   
    function myApplication($id)
    {
        $userJob=new user();
        $applyJobs=$userJob->applyJob($id);
        
        foreach($applyJobs as $applyJob)
        {
            echo '
            
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Date</th>
                <th scope="col">Profile</th>
                <th scope="col">Company </th>
                <th scope="col">Application Status</th>
                <th scope="col">Respond</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'.$applyJob['date'].'</td>
                    <td>'.$applyJob['job_title'].'</td>  
                    <td>'.$applyJob['company_name'].'</td>
                    <td>'.$applyJob['status'].'</td>
                    <td><a href="">View Report</a></td>
                  
                </tr>
                
            </tbody>
            </table>
            
        
        
        
        ';
        }
    }
    function companyJobs($id)
    {
        $company=new company();
        $companyJobs=$company->showCreatedJob($id);
       
       foreach($companyJobs as $companyJob)
       {
            echo '

            <div class="card shadow-sm mt-2">
                <p class="card-header"> Job Id: '.$companyJob['job_id'].' </p>
                <div class="card-body">
                <p class="card-title">Job title :  '.$companyJob['job_title'].'</p>
                <p class="card-text">Job About : '.$companyJob['job_about'].'</p>
                <p class="card-text">Job Posted Date : '.$companyJob['post_date'].'</p>
                <a href="?page=showApplicant&id='.$companyJob['job_id'].'" job_id='.$companyJob['job_id'].' id="showApplicants" class="btn  btn-sm btn-outline-primary">Show Applicants</a>
                <a href="?page=viewEditJobs&id='.$companyJob['job_id'].'" id="editJob" class="btn  btn-sm btn-outline-primary">Edit Job</a>
                </div>
            </div>
        
            
            
            ';
       }
    }
    function userApplyForJob($id)
    {
        //echo $id;
        $userApply=new user();
        $userApplications=$userApply->getApplications($id);
        
        echo 
        '
        <table class=" table">
        <thead>
            <tr>
            <th scope="col">User Id</th>
            <th scope="col">Degree</th>
            <th scope="col">College Name</th>
            <th scope="col">Marks</th>
            <th scope="col">Resume</th>
            
            </tr>
        </thead>
        ';

        foreach($userApplications as $userApplication)
        {
        
            echo '
                
                
                <tbody>
                    <tr>
                    <td>'.$userApplication['user_id'].'</td>
                    <td>'.$userApplication['user_Edu'].'</td>
                    <td>'.$userApplication['user_Colg'].'</td>
                    <td>'.$userApplication['user_Marks'].'</td>
                    <td><a href="?page=showUserResume&id='.$userApplication['resume_id'].'">Open Resume</a></td>
                   
                    
                    </tr>
                    
                
            
            
            
            ';
        }
        echo 
        '
            </tbody>
            </table>
        
        ';
    }

    function showUserResume($id)
    {
       $user=new user();
       $userResume=$user->displayUserResume($id);

        echo '
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">'.$userResume['user_name'].'</h5>
                <p class="card-text font-weight-bolder">Phone Number</p>
                <p class="card-text font-weight-normal">'.$userResume['user_phone'].'</p>
                <p class="card-text font-weight-bolder">Address</p>
                <p class="card-text font-weight-normal">'.$userResume['user_Address'].'</p>
                <p class="card-text font-weight-bolder">Education</p>
                <p class="card-text font-weight-normal"> Degree : '.$userResume['user_Edu'].' College name : '.$userResume['user_Colg'].' Marks : '.$userResume['user_Marks'].'</p>
                <p class="card-text font-weight-bolder">Skills</p>
                <p class="card-text font-weight-normal">'.$userResume['user_Skills'].'</p>
                <p class="card-text font-weight-bolder">Project Link</p>
                <p class="card-text font-weight-normal">'.$userResume['user_Projects'].'</p>
            </div>
        </div>
        
        
        
        ';
    }
    function  sendUserReport($id)
    {
        $user=new user();
        $userResume=$user->displayUserResume($id);

        echo
        '
            <h5>Report Form</h5>
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Report Heading</label>
                    <input type="Text" class="form-control" id="reportHeading" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Report Subject</label>
                    <input type="Text" class="form-control" id="reportSubject" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Interview Date</label>
                    <input type="date" class="form-control" id="reportDate" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Interview Information</label>
                    <textarea class="form-control" id="reportInfo" rows="3"></textarea>
                </div>
            </form>
            
            <button userReportid='.$userResume['user_id'].' id="reportBtn" type="button" class="btn btn-outline-primary btn-sm">Send Report</button>
            <button userReportid='.$userResume['user_id'].' type="button" class="btn btn-outline-danger btn-sm">Delete</button>
        ';

    }


    function showInternshipForEdit($id)
    {
        $userJob=new user();
        $Job=$userJob->showJob($id);

        echo
        '
        <form>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Internship Title</label>
            <select class="form-control" id="editjobTitle">
             <option selected>'.$Job['job_title'].'</option>
             
              <option>Software developmeny</option>
              <option>Web Development</option>
              <option>UI/UX</option>
              <option>ML engineer</option>
              <option>Mumbai</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Location</label>
            <select class="form-control" id="editjobLocation">
            <option selected>'.$Job['jobLocation'].'</option>
              <option>Bangalore</option>
              <option>Delhi</option>
              <option>Hyderabad</option>
              <option>Puna</option>
              <option>Mumbai</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Skills</label>
            <textarea class="form-control" id="editjobSkill" rows="3">'.$Job['job_skills'].'</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Stipend</label>
            <input type="number" class="form-control" id="editjobStipend" value='.$Job['Stipend'].' placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Last Date</label>
          <input type="date" class="form-control" id="editjobApplyBy" value='.$Job['Apply_by'].' placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Duration</label>
          <input type="number" class="form-control" id="editjobDuration" value='.$Job['Duration'].' placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Kind</label>
            <select class="form-control" id="editjobKind">
              <option>'.$Job['job_kind'].'</option>
              <option>Full-Time</option>
              <option>Part-Time</option>
              <option>work From home</option>
              <option>Full time with job Offer</option>
              <option>Mumbai</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">About Internship</label>
            <textarea class="form-control" id="editjobAbout"  rows="3">'.$Job['job_about'].'</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Number Of Jobs</label>
          <input type="number" class="form-control" id="editnumJob" value='.$Job['job_number'].' placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Who can Apply</label>
            <textarea class="form-control" id="editjobEligiblity" rows="3">'.$Job['job_eligibilty'].'</textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Perks</label>
            <textarea class="form-control" id="editjobPerks" rows="3">'.$Job['job_number'].'</textarea>
          </div>
          <button dataid='.$id.' id="editJobBtn" type="button" class="btn btn-sm btn-outline-primary">Edit</button>
          <button dataid='.$id.' id="deleteJobBtn" type="button" class="btn btn-sm btn-outline-danger">Delete</button>
      </form>   

        
        ';
    }   
    function viewUserResume($id)
    {
       $user=new user();
       $userResume=$user->viewUserResume($id);

        echo '
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">'.$userResume['user_name'].'</h5>
                <p class="card-text font-weight-bolder">Phone Number </p>
                <p class="card-text font-weight-normal"></p>
                
                <div class="input-group mb-3">
                    <input type="text" id="editUserphone" class="form-control" value="'.$userResume['user_phone'].'" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button dataEditId='.$id.' class="editUserResume btn btn-sm  btn-outline-secondary" edit="editphone" type="button" id="button-addon2">Edit</button>
                    </div>
                </div>

                <p class="card-text font-weight-bolder">Address</p>
                
                <div class="input-group mb-3">
                    <input type="text" id="editUseraddress" class="form-control" value="'.$userResume['user_Address'].'" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button  dataEditId='.$id.' class="editUserResume btn btn-sm btn-outline-secondary" edit="editaddress" type="button" id="button-addon2">Edit</button>
                    </div>
                </div>

                <p class="card-text font-weight-bolder">Education</p>
               
                <p>Degree</p>
                <div class="input-group mb-3">
                    <input type="text" id="editUseredu" class="form-control" value="'.$userResume['user_Edu'].'" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button  dataEditId='.$id.' class="editUserResume btn btn-sm btn-outline-secondary" edit="editedu" type="button" id="button-addon2">Edit</button>
                    </div>
                </div>

                <p>College Name</p>
                <div class="input-group mb-3">  
                    <input type="text" id="editUsercolg" class="form-control" value="'.$userResume['user_Colg'].'" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button  dataEditId='.$id.' class="editUserResume btn btn-sm btn-outline-secondary" edit="editColg" type="button" id="button-addon2">Edit</button>
                    </div>
                </div>

                <p>Marks</p>
                <div class="input-group mb-3">
                
                    <input type="text" id="editUsermarks" class="form-control" value="'.$userResume['user_Marks'].'" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button  dataEditId='.$id.' class="editUserResume btn btn-sm btn-outline-secondary" edit="editMarks" type="button" id="button-addon2">Edit</button>
                    </div>
                </div>
                
                
                
                
                <p class="card-text font-weight-bolder">Skills</p>
                <div class="input-group mb-3">  
                    <input type="text" id="editUserskills" class="form-control" value="'.$userResume['user_Skills'].'" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button  dataEditId='.$id.' class="editUserResume btn btn-sm btn-outline-secondary" edit="editSkills" type="button" id="button-addon2">Edit</button>
                    </div>
                </div>
                <p class="card-text font-weight-bolder">Project Link</p>
                <div class="input-group mb-3">  
                    <input type="text" id="editUserprojects" class="form-control" value="'.$userResume['user_Projects'].'" aria-label="" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button  dataEditId='.$id.' class="editUserResume btn btn-sm btn-outline-secondary" edit="editProject" type="button" id="button-addon2">Edit</button>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        ';
    }
    function showAllReports($id)
    {
        $user=new user();
        $reports=$user->reports($id);
        foreach($reports as $report)
        {
            echo 
            '
                <div class="card">
                    <div class="card-header">
                    Report Id   '.$report['report_id'].'
                    </div>
                    <div class="card-body">
                    <p class="font-weight-bold card-title">Report :- '.$report['report_heading'].'</p>
                    <p class="font-italic"> Report Subject :- '.$report['report_subject'].'</p>
                    <p class="card-text">Report info :- '.$report['report_info'].'</p>
                    <p class="card-text">Interview Date :- '.$report['report_date'].'</p>
                    
                    </div>
                </div>
            ';
        }
    }
    function searchJob($jobTitle)
    {
        try
        {
            $search=new company();
            $Jobs=$search->search($jobTitle);
            foreach($Jobs as $job)
            {
            echo
            '<div class="card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title  text-primary">'.$job['job_title'].'</h4>
                    <p class=" mb-0 font-bold"><a href="?page=company&id='.$job['company_id'].'">'.$job['name'].'</a></p>
                    <p class=" text-muted font-italic"> Location:  '.$job['jobLocation'].'</p>
                    <div>
                        <table style="width:100%">
                            <tr>
                                <th scope="col">Duration</th>
                                <th scope="col">Stipend</th>
                                <th scope="col">Posted On</th>
                                <th scope="col">Apply By</th>
                            </tr>
                            <tr>
                                <td>'.$job['Duration'].' Months</td>
                                <td>'.$job['Stipend'].' /Months</td>
                                <td>'.$job['post_date'].'</td>
                                <td>'.$job['Apply_by'].'</td>
                            </tr>
                        </table> 
                    </div>
                </div>
                <div class="card-footer text-muted">
                        <p class="card-text"> <a href="?page=viewJob&id='.$job['job_id'].'"> View Details </a> </p>
                </div>
                </div>
            </div>
            '; 
        
            }

        }catch(Throwable $e)
        {
            echo $e;
        }
    }
 
?>