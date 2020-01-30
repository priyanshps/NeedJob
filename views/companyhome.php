<div class="container mainContainer">
<div class="row">
  <div class="col-md-3 mainContainer operations">
  <h5>Task</h5>
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Create Job</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Send Report
      
      </a>
     
    </div>
  </div>
  <div class="col-md-9 mainContainer operations ">
    <h5>Operations</h5>
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        
        
      <div class="">  
          <form>
          <div class="form-group">
              <label for="exampleFormControlSelect1">Internship Title</label>
              <select class="form-control" id="jobTitle">
                <option>Software developmeny</option>
                <option>Web Development</option>
                <option>UI/UX</option>
                <option>ML engineer</option>
                <option>Mumbai</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Location</label>
              <select class="form-control" id="jobLocation">
                <option>Bangalore</option>
                <option>Delhi</option>
                <option>Hyderabad</option>
                <option>Puna</option>
                <option>Mumbai</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Skills</label>
              <textarea class="form-control" id="jobSkill" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Stipend</label>
              <input type="number" class="form-control" id="jobStipend" placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Last Date</label>
            <input type="date" class="form-control" id="jobApplyBy" placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Duration</label>
            <input type="number" class="form-control" id="jobDuration" placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Kind</label>
              <select class="form-control" id="jobKind">
                <option>Full-Time</option>
                <option>Part-Time</option>
                <option>work From home</option>
                <option>Full time with job Offer</option>
                <option>Mumbai</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">About Internship</label>
              <textarea class="form-control" id="jobAbout" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Number Of Jobs</label>
            <input type="number" class="form-control" id="numJob" placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Who can Apply</label>
              <textarea class="form-control" id="jobEligiblity" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Perks</label>
              <textarea class="form-control" id="jobPerks" rows="3"></textarea>
            </div>
            <button type="button" id="createJobBtn" companyid=<?php echo$_SESSION['id'];?> class="btn btn-outline-primary">Create Job</button>
        </form>

    </div>



        
      <!-- Profile -->
      
      
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

        <form>
    <div class="form-group">
      <label for="exampleFormControlInput1">Company Link</label>
      <input type="Text" class="form-control" id="companyLink" placeholder="xyx.com">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">HeadOffice Address</label>
      <input type="text" class="form-control" id="companyAddress" placeholder="name@example.com">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Linkdin Profile</label>
      <input type="text" class="form-control" id="companyLinkdin" placeholder="name@example.com">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Contact Number</label>
      <input type="text" class="form-control" id="companyNum" placeholder="name@example.com">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">About</label>
      <textarea class="form-control" id="companyAbout" rows="3"></textarea>
    </div>
  </form>

  <button type="button" companyid=<?php echo$_SESSION['id'];?> id="companyProfileCreateBtn" class="btn btn-outline-primary">Create Profile</button>
  </div>
        
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        
        <?php companyJobs($_SESSION['id']); ?>
        
      
        
        
        
        
        
        
      </div>
      
      
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
      </div>
    </div>
  </div>

  </div>