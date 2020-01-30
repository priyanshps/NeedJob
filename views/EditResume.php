<div class="container mainContainer">
    <div class="row">
        <div class="col-md-8 mainContainer ">
        <h5><strong>Resume</strong></h5>
          <?php $a="s"; ?>
            <form>
                <div class="form-group">
                    <label for="formGroupExampleInput">Name</label>
                    <input type="text" class="form-control" id="userName" value=<?php echo $a; ?> >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Phone Number</label>
                    <input type="text" class="form-control" id="userNumber" placeholder="+91">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Address</label>
                    <input type="Text" class="form-control" id="userAddress" placeholder="Sun Street India">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Education</label>
                    <input type="Text" class="form-control" id="userEducation" placeholder="BE/BTECH">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">College Name</label>
                    <input type="Text" class="form-control" id="userCollege" placeholder="asd college of engg">
                </div>
                
                <div class="form-group">
                    <label for="formGroupExampleInput2">Marks</label>
                    <input type="text" class="form-control" id="userMarks" placeholder="SGAP">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Skills</label>
                    <textarea type="text" row="3" class="form-control" id="userSkills" placeholder="C++ Java ..."></textarea>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Project Link</label>
                    <input type="text" class="form-control" id="userGithub" placeholder="Github  Link">
                </div>
            </form>
        
        </div>   
        <div class="col-md-3 mainContainer Opbtn">
                <h5>Operations</h5>
                <form>
                <div class="form-group">
                    <button type="button" userid=<?php echo$_SESSION['id'];?> id="createResume" class=" form-control btn btn-secondary">Create Resume</button>
                    
                </div>
                <div class="form-group">
                    <button type="button" class=" form-control btn btn-secondary">Update</button>
                </div>
                </form>
                
        </div>
    </div>
</div>