<?php
    class user extends database 
    {

        public function insertUser($username,$email,$password,$dob)
        {
            try
            {
                $query="INSERT INTO user(username,email,password,dob) VALUE(:username,:email,:password,:dob)";
                $this->query($query);
                $this->bind(":username",$username);
                $this->bind(":email",$email);
                $this->bind(":password",$password);
                $this->bind(":dob",$dob);
                $this->execute();
            }
            catch(Throable $e)
            {

            }
        }
        public function userLogin($email)
        {
            try
            {
                $query="SELECT * FROM user WHERE email=:email";
                $this->query($query);
                $this->bind(":email",$email);
                $row=$this->single();
                return $row;

            }catch(Throable $e)
            {
                echo $e;
            }
        }
        public function insertResume($user_id,$user_name,$user_phone,$user_Address,$user_Edu,$user_Colg,$user_Marks,$user_Skills,$user_Projects)
        {
            $insert="INSERT INTO resume(user_id,user_name,user_phone,user_Address,user_Edu,user_Colg,user_Marks,user_Skills,user_Projects)
            VALUES
            (:user_id,:user_name,:user_phone,:user_Address,:user_Edu,:user_Colg,:user_Marks,:user_Skills,:user_Projects)
            ";

            try{
                $this->query($insert);
                $this->bind(":user_id",$user_id);
                $this->bind(":user_name",$user_name);
                $this->bind(":user_phone",$user_phone);
                $this->bind(":user_Address",$user_Address);
                $this->bind(":user_Edu",$user_Edu);
                $this->bind(":user_Colg",$user_Colg);
                $this->bind(":user_Marks",$user_Marks);
                $this->bind(":user_Skills",$user_Skills);
                $this->bind(":user_Projects",$user_Projects);
                $this->execute();
            }catch(Throwable $e)
            {
                echo $e;
            }


        }
        public function showJobs()
        {
            try
            {
            
                $show="SELECT jobs.*,company.name
                FROM jobs
                INNER JOIN company
                ON jobs.company_id = company.company_id";
                
                $this->query($show);
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row);
                    }
                }
             
            }catch(Throwable $e)
            {
                echo $e;
            }
        }
        public function showJob($id)
        {
            try
            {
                $query ="SELECT jobs.*,company.name
                FROM jobs
                INNER JOIN company
                ON jobs.company_id = company.company_id WHERE job_id=:job_id";
               
                $this->query($query);
                $this->bind(":job_id",$id);
                $row=$this->single();
                return $row;

            }
            catch(Throwable $e)
            {
                echo $e;
            }
        }
        public function insertApplication($user_id,$job_id,$job_title,$job_company)
        {
            try
            {
                $query="INSERT INTO apply_job(user_id,job_id,job_title,company_name) VALUES(:user_id,:job_id,:job_title,:company_name)";
                $this->query($query);
                $this->bind(":user_id",$user_id);
                $this->bind(":job_id",$job_id);
                $this->bind(":job_title",$job_title);
                $this->bind(":company_name",$job_company);
                $this->execute();

            }
            catch(throwable $e)
            {
                echo $e;
            }
        }
        public function applyJob($id)
        {
            try
            {
                $query="SELECT *FROM apply_job WHERE user_id=:user_id";
                $this->query($query);
                $this->bind(":user_id",$id);
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row);
                    }
                }
            }
            catch(throwable $e)
            {

            }
        }
        public function getApplications($id)
        {
            try
            {
               $query ="SELECT resume.*,apply_job.application_id,apply_job.job_id,apply_job.user_id 
                        FROM resume INNER JOIN apply_job ON apply_job.user_id = resume.user_id 
                        WHERE apply_job.job_id=:job_id";
                $this->query($query);
                $this->bind(":job_id",$id);
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row);
                    }
                }


            }
            catch(Throwable $e)
            {
                echo $e;
            }   
        }
        public function displayUserResume($id)
        {
            try
            {
                $query="SELECT * FROM resume WHERE resume_id=:resume_id";
                $this->query($query);
                $this->bind(":resume_id",$id);
                $row=$this->single();
                return $row;
            }
            catch(Throwable $e)
            {
                echo $e;
            }
        }
        public function ViewUserResume($id)
        {
            try
            {
                $query="SELECT * FROM resume WHERE user_id=:user_id";
                $this->query($query);
                $this->bind(":user_id",$id);
                $row=$this->single();
                return $row;
            }
            catch(Throwable $e)
            {
                echo $e;
            }
        }
        public function insertReport($user_id,$report_heading,$report_subject,$report_date,$report_info)
        {
            try
            {
                $query="INSERT INTO user_report(user_id,report_heading,report_subject,report_date,report_info)
                        VALUES(:user_id,:report_heading,:report_subject,:report_date,:report_info)";
                $this->query($query);
                $this->bind(":user_id",$user_id);
                $this->bind(":report_heading",$report_heading);
                $this->bind(":report_subject",$report_subject);
                $this->bind(":report_date",$report_date);
                $this->bind(":report_info",$report_info);
                $this->execute();

            }
            catch(Throwable $e)
            {
                echo $e;
            }
        }
        public function editResumeFor($id,$editType,$data)
        {
           try
           {
                if($editType=='editphone')
                {
                    $query="UPDATE resume SET user_phone=:user_phone WHERE user_id=:user_id";
                    $this->query($query);
                    $this->bind(":user_id",$id);
                    $this->bind(":user_phone",$data);
                    $this->execute();
                }
                else if($editType=='editaddress')
                {
                    $query="UPDATE resume SET user_Address=:user_Address WHERE user_id=:user_id";
                    $this->query($query);
                    $this->bind(":user_id",$id);
                    $this->bind(":user_Address",$data);
                    $this->execute();
                }
                else if($editType=='editedu')
                {
                    $query="UPDATE resume SET user_Edu=:user_Edu WHERE user_id=:user_id";
                    $this->query($query);
                    $this->bind(":user_id",$id);
                    $this->bind(":user_Edu",$data);
                    $this->execute();
                }
                else if($editType=='editColg')
                {
                    $query="UPDATE resume SET user_Colg=:user_Colg WHERE user_id=:user_id";
                    $this->query($query);
                    $this->bind(":user_id",$id);
                    $this->bind(":user_Colg",$data);
                    $this->execute();
                }
                else if($editType=='editMarks')
                {
                    $query="UPDATE resume SET user_Marks=:user_Marks WHERE user_id=:user_id";
                    $this->query($query);
                    $this->bind(":user_id",$id);
                    $this->bind(":user_Marks",$data);
                    $this->execute();
                }
                else if($editType=='editSkills')
                {
                    $query="UPDATE resume SET user_Skills=:user_Skills WHERE user_id=:user_id";
                    $this->query($query);
                    $this->bind(":user_id",$id);
                    $this->bind(":user_Skills",$data);
                    $this->execute();
                }
                else if($editType=='editProject')
                {
                    $query="UPDATE resume SET user_Projects=:user_Projects WHERE user_id=:user_id";
                    $this->query($query);
                    $this->bind(":user_id",$id);
                    $this->bind(":user_Projects",$data);
                    $this->execute();
                }
            
           }
           catch(Throwable $e)
           {
                echo $e;
           }
        }

        public function reports($id)
        {
            try
            {
                $query="SELECT * FROM user_report WHERE user_id=:user_id";
                $this->query($query);
                $this->bind(":user_id",$id);
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row);
                    }
                }
            }
            catch(Throwable $e)
            {
                echo $e;
            }
        }
        public function searchJob($title)
        {
            try
            {
                $query="SELECT * FROM jobs WHERE job_title=:job_title";
                $this->query($query);
                $this->bind(":user_id",$id);
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row);
                    }
                }
            }
            catch(Throwable $e)
            {
                echo $e;
            }
        }


    }



?>