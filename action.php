<?php

    include("classes/config.php");
    try
    {
        $user=new user();
        $company=new company();
    }
    catch(Throwable $e)
    {
        echo $e;
    }
    // ###################
    // ###Create Account##
    // ###################

    if($_GET["action"]=="userSignup")
    {
        global $user;
        global $company;
        $error=" ";
        $email=$_POST['email'];  
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error="$email is not a valid email address";
        }
        
        if($_POST['password']!=$_POST['password2'])
        {
            $error="password not matched";
        }
        $password=$_POST['password'];
        $username=$_POST['username'];
        $date=$_POST['date'];
        $hash=md5($password.$date);


        if($error ==" ")
        {
            if($_POST['usertype']=='recuiter')
            {
                $companyUser=$company->insertCompany($email,$hash,$username,$date);
            }
            else
            {
                $userAccount=$user->insertUser($username,$email,$hash,$date);
            }
        }
        else
        {
            echo $error;
        }
               
    }

    // ###################
    // ###Login Account###
    // ###################

    if($_GET['action']=='userLogin')
    {
        global $user;
        global $company;
        $username=$_POST['email'];
        $password=$_POST['password'];
        $type=$_POST['usertype'];

        $userData=$user->userLogin($username);
        $companyData=$company->loginCompany($username);
        
        if($type=='recuiter')
        {
            $hash=md5($password.$companyData['date']);
            if($companyData['password']==$hash)
            {
                $_SESSION['id']=$companyData['company_id'];
                $_SESSION['company_email']=$companyData['email'];
                echo 1;
            }
            else
            {
               // echo $companyData['date'];
                //echo($companyData['password']);
                //echo 0;
            }
        }
        else
        {
            $hash=md5($password.$userData['dob']);
            if($userData['password']==$hash)
            {
                $_SESSION['id']=$userData['id'];
                $_SESSION['user_email']=$userData['email'];   
                echo 1;

            }
            else
            {
                echo 0;
                
                
            }
        }
    }
    // data: "companyId=" + companyId + "&companylink=" + link + "&address=" + address + "&Linkprofile="
    // + profile+ "&contact=" + contactNumber + "&about="+about,
    if($_GET['action']=="createCompanyProfile")
    {
        global $company;
        $companyId      =   $_POST['companyId'];
        $companyUrl     =   $_POST['companylink'];
        $companyAddress =   $_POST['address'];
        $companyLinkedin=   $_POST['Linkprofile'];
        $companyContact =   $_POST['contact'];
        $companyAbout   =   $_POST['about'];
        try
        {
            $companyProfile=$company->insertProfile($companyId,$companyUrl,$companyAddress,$companyLinkedin,$companyContact,$companyAbout);

        }catch(Throwable $e)
        {
            echo $e;
        }
    }
    if($_GET['action']=='createJob')
    {
        global $company;
        $companyId  =   $_POST['companyId']; 
        $jobTitle   =   $_POST['jobTitle'];
        $jobLocation=   $_POST['jobLocation'];
        $jobSkills  =   $_POST['jobSkills'];
        $jobStipend =   $_POST['jobStipend'];
        $jobLastDate=   $_POST['jobLastDate'];
        $jobDuration=   $_POST['jobDuration'];
        $jobKind    =   $_POST['jobKind'];
        $jobAbout   =   $_POST['jobAbout'];
        $numJobs    =   $_POST['jobNum'];
        $jobEli     =   $_POST['jobEli'];
        $jobPerks   =   $_POST['jobPerks'];
        
        try{

            $insertjob=$company->createJob($companyId,$jobTitle,$jobSkills,$jobLocation,$jobStipend,$jobLastDate,
                                $jobDuration,$jobKind,$jobAbout,$numJobs,$jobEli,$jobPerks);

        }catch(Throwable $e)
        {
            echo $e;
        } 
        
    }
    
    if($_GET['action']=='createResume')
    {
        print_r($_POST);
        global $user;
        $userId       =   $_POST['userId']; 
        $userName     =   $_POST['username'];
        $userPhone    =   $_POST['userPhone'];
        $userAddress  =   $_POST['userAddress'];
        $userEdu      =   $_POST['userEducation'];
        $userColg     =   $_POST['userColg'];
        $userMarks    =   $_POST['marks'];
        $userSkills   =   $_POST['userSkill'];
        $userProject  =   $_POST['userProject'];
        
        try
        {
            
            $insert=$user->insertResume($userId,$userName,$userPhone,$userAddress,$userEdu,$userColg,$userMarks ,$userSkills,$userProject);

        }catch(Throwable $e)
        {
            echo $e;
        }
        
    }
    if($_GET['action']=='applyForJob')
    {
        global $user;
        $user_id=$_POST['user_id'];
        $job_id=$_POST['job_id'];
        $job_title=$_POST['job_title'];
        $job_company=$_POST['job_company'];
        try
        {
            $application=$user->insertApplication($user_id,$job_id,$job_title,$job_company);

        }catch(throwable $e)
        {
            echo $e;
        }

    }
    if($_GET['action']=='sendReport')
    {
        print_r($_POST);
        global $user;
        $user_id=$_POST['userid'];
        $report_heading=$_POST['heading'];
        $report_subject=$_POST['subject'];
        $report_date=$_POST['date'];
        $report_info=$_POST['info'];
        try
        {
            $report=$user->insertReport($user_id,$report_heading,$report_subject,$report_date,$report_info);
        }
        catch(Throwable $e)
        {
            echo $e;
        }

    }

    if($_GET['action']=='editJob')
    {
        global $company;
        $jobId      =   $_POST['jobId']; 
        $jobTitle   =   $_POST['jobTitle'];
        $jobLocation=   $_POST['jobLocation'];
        $jobSkills  =   $_POST['jobSkills'];
        $jobStipend =   $_POST['jobStipend'];
        $jobLastDate=   $_POST['jobLastDate'];
        $jobDuration=   $_POST['jobDuration'];
        $jobKind    =   $_POST['jobKind'];
        $jobAbout   =   $_POST['jobAbout'];
        $numJobs    =   $_POST['jobNum'];
        $jobEli     =   $_POST['jobEli'];
        $jobPerks   =   $_POST['jobPerks'];

        try{

            $editjob=$company->editJob($jobId,$jobTitle,$jobSkills,$jobLocation,$jobStipend,$jobLastDate,
                                $jobDuration,$jobKind,$jobAbout,$numJobs,$jobEli,$jobPerks);

        }catch(Throwable $e)
        {
            echo $e;
        } 

       
    }  
    if($_GET['action']=='deleteJob')
    {
        global $company;
        $jobId      =   $_POST['jobId']; 
        try
        {
            $deleteJob=$company->deleteJob($jobId);
        }
        catch(Throwable $e)
        {
            echo $e;
        }
    }
    if($_GET['action']=='editUserResume')
    {
        //print_r($_POST);
        global $user;
        $id=$_POST['id'];
        $editType=$_POST['editType'];
        $data=$_POST['data'];
        try
        {
            $editUserResume=$user->editResumeFor($id,$editType,$data);

        }catch(Throwable $e)
        {
            echo $e;
        }

    }  


    



?>