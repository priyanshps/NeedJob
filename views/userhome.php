
<div class="container mainContainer">
    <div class="row">
        <div class="col-md-3 mainContainer filter">
        <h5><strong>Operations</strong></h5>
          
            <form class="form" method="POST"> 
                    <input type="text" class="form-control mb-2 mr-sm-2" name="searchTxt" placeholder="Search">
                    <button type="submit" name="searchBtn" id="searchBtn" class="btn btn-sm btn-primary mb-2">Search</button>
             </form>
           
        </div>  
        
        <div class="col-md-8 mainContainer ">
            <h5>Jobs/Internships</h5>

            <?php 
            
                    if(isset($_POST['searchBtn']))
                    {
                        searchJob($_POST['searchTxt']);
                    }
                    else
                    {
                        showInternships();
                    }
            
                
                    
                    
                ?>
           
           <?php ?> 
                
        
        </div>
    </div>
</div>
