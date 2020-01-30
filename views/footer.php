    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <!-- Login User Model -->
    <div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="userPassword">
              </div>
             
              
          </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="loginBtn" class="btn btn-primary">Login</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Login Company  -->
      <div class="modal fade" id="loginModel1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="companyEmail" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="companyPassword">
              </div>
             
          </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="companyloginBtn" class="btn btn-primary">Login</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="createAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form>
                <div class="form-group">
                  <input type="email" class="form-control" id="regEmail" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="regPassword" placeholder="Password">
                </div> 
                <div class="form-group">
                  <input type="password" class="form-control" id="regPassword2" aria-describedby="emailHelp" placeholder="re-Type password">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="regUsername" aria-describedby="emailHelp" placeholder="username">
                </div>
                  
                <div class="form-group">
                  <input type="date" class="form-control" id="regDate" aria-describedby="emailHelp" placeholder="Date of Birth">
                </div>
                <div class="form-group form-check">
                  <input  type="checkbox" class="form-check-input" id="exampleCheck2">
                <label class="form-check-label" for="exampleCheck1">recuiter</label>
              </div>
              
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
              <button id="createAccountBtn" class="btn btn-outline-primary">Create Account</button>
            
            </div>
          </div>
        </div>
      </div>
  <footer>
    <p>Footer</p>

  </footer>

<script>

  $("#createAccountBtn").click(function(){

    var userType="user";
    if ($("input[type=checkbox]").is(":checked"))
    { 
      userType="recuiter"
    }
    $.ajax({
      type: "POST",
      url: "action.php?action=userSignup",
      data: "email="+$("#regEmail").val() + "&password="+$("#regPassword").val()
        + "&password2="+$("#regPassword2").val() + "&username="+$("#regUsername").val()
        + "&date="+$("#regDate").val() + "&usertype="+ userType,
    success: function(result)
    {
      
      
        alert(result);
      
    }  

     })
    
  });
  $("#loginBtn").click(function(){

      $.ajax({
      type: "POST",
      url: "action.php?action=userLogin",
      data: "email="+$("#userEmail").val() + "&password="+$("#userPassword").val() + "&usertype="+ "user",
      success: function(result)
      {
        if(result==1)
        {
            window.location.href="?page=userhome";
        }   
      }  

      })
  });
  $("#companyloginBtn").click(function(){

    $.ajax({
      type: "POST",
      url: "action.php?action=userLogin",
      data: "email="+$("#companyEmail").val() + "&password="+$("#companyPassword").val() + "&usertype="+ "recuiter",
      success: function(result)
      {
        if(result==1)
        {
            alert("btn Clicked");
            window.location.href="?page=companyhome";
        }   
        alert(result);
      }  

      })
      //alert($("#companyPassword").val());
    
});


$("#companyProfileCreateBtn").click(function(){
  var link=$("#companyLink").val();
  var address=$("#companyAddress").val();
  var profile=$("#companyLinkdin").val();
  var contactNumber=$("#companyNum").val();
  var about=$("#companyAbout").val();
  var companyId=$(this).attr("companyid");
  
  $.ajax({
    type: "POST",
    url: "action.php?action=createCompanyProfile",
    data: "companyId=" + companyId + "&companylink=" + link + "&address=" + address + "&Linkprofile="
    + profile+ "&contact=" + contactNumber + "&about="+about,
    success: function(result)
    {
      alert(result);
    }
  })

});

$("#createJobBtn").click(function(){
  
  var companyId="companyId="+$(this).attr("companyid");
  var jobTitle="&jobTitle="+$('#jobTitle option:selected').text();
  var jobLocation="&jobLocation="+$('#jobLocation option:selected').text();
  var jobSkills="&jobSkills="+$("#jobSkill").val();
  var jobStipend="&jobStipend="+$("#jobStipend").val();
  var jobLastDate="&jobLastDate="+$("#jobApplyBy").val();
  var jobDuration="&jobDuration="+$("#jobDuration").val();
  var jobKind="&jobKind="+$('#jobKind option:selected').text();
  var jobAbout="&jobAbout="+$('#jobAbout').val();
  var numJobs="&jobNum="+$("#numJob").val();
  var jobEli="&jobEli="+$("#jobEligiblity").val();
  var jobPerks="&jobPerks="+$("#jobPerks").val();
  
  //alert(jobKind);
  $.ajax({
    type: "POST",
    url: "action.php?action=createJob",
    data: companyId + jobTitle + jobLocation 
          + jobSkills + jobStipend + jobLastDate
          +jobDuration + jobKind + jobAbout
          +numJobs + jobEli + jobPerks,
    success: function(result)
    {
      alert(result);
    } 
  })
  
});

$("#createResume").click(function(){

  var userId="userId="+$(this).attr("userid");
  var userName="&username="+$("#userName").val();
  var userPhone="&userPhone="+$("#userNumber").val();
  var userAddress="&userAddress="+$("#userAddress").val();
  var userEdu="&userEducation="+$("#userEducation").val();
  var userColg="&userColg="+$('#userCollege').val();
  var userMarks="&marks="+$("#userMarks").val();
  var userSkills="&userSkill="+$("#userSkills").val();
  var userProject="&userProject="+$("#userGithub").val();

  $.ajax({

    type:"POST",
    url: "action.php?action=createResume",
    data: userId + userName + userPhone 
          + userAddress + userEdu + userColg
          +userMarks + userSkills + userProject,
    success: function(result)
    {
      alert(result);
    } 

  })

});

$("#applyBtn").click(function(){
  var user_id=$(this).attr("userid");
  var job_id=$(this).attr("jobId");
  var job_title=$(this).attr("job_title");
  var job_company=$(this).attr("job_company");

  $.ajax({
    type:"POST",
    url: "action.php?action=applyForJob",
    data: "user_id=" + user_id + "&job_id="+job_id +"&job_title="+job_title + "&job_company="+job_company,
    success:function(result)
    {
      alert(result);
    }
    
  })


});

$("#reportBtn").click(function(){

  var user_id="userid="+$(this).attr("userReportid");
  var reportHeading="&heading="+$("#reportHeading").val();
  var reportSubject="&subject="+$("#reportSubject").val();
  var date="&date="+$("#reportDate").val();
  var Info="&info="+$("#reportInfo").val();
  $.ajax({
    type:"POST",
    url: "action.php?action=sendReport",
    data: user_id + reportHeading + reportSubject + date + Info,
    success: function(result)
    {
      alert(result);
    }
  })

});

$("#editJobBtn").click(function(){

  var jobId       ="jobId="+$(this).attr("dataid");
  var jobTitle    ="&jobTitle="+$('#editjobTitle option:selected').text();
  var jobLocation ="&jobLocation="+$('#editjobLocation option:selected').text();
  var jobSkills   ="&jobSkills="+$("#editjobSkill").val();
  var jobStipend  ="&jobStipend="+$("#editjobStipend").val();
  var jobLastDate ="&jobLastDate="+$("#editjobApplyBy").val();
  var jobDuration ="&jobDuration="+$("#editjobDuration").val();
  var jobKind     ="&jobKind="+$('#editjobKind option:selected').text();
  var jobAbout    ="&jobAbout="+$('#editjobAbout').val();
  var numJobs     ="&jobNum="+$("#editnumJob").val();
  var jobEli      ="&jobEli="+$("#editjobEligiblity").val();
  var jobPerks    ="&jobPerks="+$("#editjobPerks").val();

   $.ajax({
    type: "POST",
    url: "action.php?action=editJob",
    data: jobId + jobTitle + jobLocation 
          + jobSkills + jobStipend + jobLastDate
          +jobDuration + jobKind + jobAbout
          +numJobs + jobEli + jobPerks,
    success: function(result)
    {
      alert(result);
    } 
  })  

});

$("#deleteJobBtn").click(function(){
  var jobId="jobId="+$(this).attr("dataid");
  
  $.ajax({
    type: "POST",
    url:"action.php?action=deleteJob",
    data: jobId,
    success: function(result)
    {
      alert(result);
    }
  })



});
$(".editUserResume").click(function(){

  var editType=$(this).attr("edit");
  var dataEditId=$(this).attr("dataEditId");
  
  var data="";
  if(editType=='editphone')
  {
    var phone="&data="+$("#editUserphone").val();
    data="&editType=" + editType + phone;  
   
  }
  else if(editType=='editaddress')
  {
    var address="&data="+$("#editUseraddress").val();
    data="&editType=" + editType + address;  
    
  }
  else if(editType=='editedu')
  {
    var edu="&data="+$("#editUseredu").val();
    data="&editType=" + editType + edu;  
   
  }
  else if(editType=='editColg')
  {
    var colg="&data="+$("#editUsercolg").val();
    data="&editType=" + editType + colg;  
    
  }
  else if(editType=='editMarks')
  {
    var marks="&data="+$("#editUsermarks").val();
    data="&editType=" + editType + marks;  
    
  }
  else if(editType=='editSkills')
  {
    var skills="&data="+$("#editUserskills").val();
    data="&editType=" + editType + skills;  
    
  }
  else if(editType=='editProject')
  {
    var project="&data="+$("#editUserprojects").val();
    data="&editType=" + editType + project;  
   
  }
  $.ajax({
    type: "POST",
    url: "action.php?action=editUserResume",
    data: "id="+dataEditId + data,
    success: function(result)
    {
      alert(result);
    }
  })
  
});



</script>



</body>
</html>