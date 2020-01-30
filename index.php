<?php
    
    include("function.php");
    
    include("views/header.php");


   
   
        if($_GET['page']=="userhome")
        {
            include("views/userhome.php");
        }
        else if($_GET['page']=="companyhome")
        {
            include("views/companyhome.php");
        }
        else if($_GET['page']=='EditResume')
        {
            include("views/EditResume.php");   
        }
        else if($_GET['page']=='myapplication')
        {
            include("views/myapplication.php");   
        }
        else if($_GET['page']=='viewJob')
        {
            include("views/viewJob.php");   
        }
        else if($_GET['page']=='showApplicant')
        {
            include("views/showApplicant.php");
        }
        else if($_GET['page']=='showUserResume')
        {
            include("views/showUserResume.php");
        }
        else if($_GET['page']=='viewEditJobs')
        {
            include("views/viewEditJob.php");
        }
        else if($_GET['page']=='viewResume')
        {
            include("views/viewResume.php");
        }
        else if($_GET['page']=='showReports')
        {
            include("views/showReports.php");
        }
    

        
    
    // include("views/companyhome.php");

    include("views/footer.php");
?>