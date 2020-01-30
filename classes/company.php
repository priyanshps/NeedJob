<?php
    class company extends database 
    {
        public function insertCompany($email,$password,$name,$date)
        {
            try
            {
                $query="INSERT INTO company(email,password,name,date) VALUE(:email,:password,:name,:date)";
                $this->query($query);
                $this->bind(":email",$email);
                $this->bind(":password",$password);
                $this->bind(":name",$name);
                $this->bind(":date",$date);
                $this->execute();
            }
            catch(Throable $e)
            {

            }
        }
        public function loginCompany($email)
        {
            try
            {
                $query="SELECT * FROM company WHERE email=:email";
                $this->query($query);
                $this->bind(":email",$email);
                $row=$this->single();
                return $row;



            }catch(Throable $e)
            {
                echo $e;
            }
        }
        public function insertProfile($companyId,$companyUrl,$companyAddress,$companyLinkedin,$companyContact,$companyAbout)
        {
            try
            {
                $query="INSERT INTO 
                company_profile(company_id,company_link,OfficeAddress,linkdinLink,Contact_number,About) 
                VALUES
                (:company_id,:company_link,:OfficeAddress,:linkdinLink,:Contact_number,:About)";
                $this->query($query);
                $this->bind(":company_id",$companyId);
                $this->bind(":company_link",$companyUrl);
                $this->bind(":OfficeAddress",$companyAddress);
                $this->bind(":linkdinLink",$companyLinkedin);
                $this->bind(":Contact_number",$companyContact);
                $this->bind(":About",$companyAbout);
                $this->execute();

            }
            catch(Throable $e)
            {
                echo $e;
            }

        }
        public function createJob($companyId,$jobTitle,$jobSkills,$jobLocation,$jobStipend,$jobLastDate,$jobDuration,$jobKind,$jobAbout,$numJobs,$jobEli,$jobPerks)
        {
            try {
                $insertQuery="INSERT INTO jobs(company_id,job_title,job_skills,jobLocation,Stipend,Apply_by,Duration,job_kind,job_about,job_number,job_eligibilty,job_perks)
                            VALUES
                            (:company_id,:job_title,:job_skills,:jobLocation,:Stipend,:Apply_by,:Duration,:job_kind,:job_about,:job_number,:job_eligibilty,:job_perks)
                            ";
            
                $this->query($insertQuery);
                $this->bind(":company_id",$companyId);
                $this->bind(":job_title",$jobTitle);
                $this->bind(":job_skills",$jobSkills);
                $this->bind(":jobLocation",$jobLocation);
                $this->bind(":Stipend",$jobStipend);
                $this->bind(":Apply_by",$jobLastDate);
                $this->bind(":Duration",$jobDuration);
                $this->bind(":job_kind",$jobKind);
                $this->bind(":job_about",$jobAbout);
                $this->bind(":job_number",$numJobs);
                $this->bind(":job_eligibilty",$jobEli);
                $this->bind(":job_perks",$jobPerks);

                $this->execute();

            }
            catch(Throwable $e)
            {
                echo $e;
            }
            


        }

        public function showCreatedJob($id)
        {
            $query="SELECT * FROM jobs where company_id=:company_id";
            $this->query($query);
            $this->bind(":company_id",$id);
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
        public function editJob($jobId,$jobTitle,$jobSkills,$jobLocation,$jobStipend,$jobLastDate,$jobDuration,$jobKind,$jobAbout,$numJobs,$jobEli,$jobPerks)
        {
            try
            {
                $updateQuery="UPDATE jobs
                    SET job_title=:job_title,job_skills=:job_skills,jobLocation=:jobLocation,Stipend=:Stipend,
                        Apply_by=:Apply_by,Duration=:Duration,job_kind=:job_kind,job_about=:job_about,
                        job_number=:job_number,job_eligibilty=:job_eligibilty,job_perks=:job_perks
                    WHERE job_id=:job_id";
                
                    $this->query($updateQuery);
                    $this->bind(":job_id",$jobId);
                    $this->bind(":job_title",$jobTitle);
                    $this->bind(":job_skills",$jobSkills);
                    $this->bind(":jobLocation",$jobLocation);
                    $this->bind(":Stipend",$jobStipend);
                    $this->bind(":Apply_by",$jobLastDate);
                    $this->bind(":Duration",$jobDuration);
                    $this->bind(":job_kind",$jobKind);
                    $this->bind(":job_about",$jobAbout);
                    $this->bind(":job_number",$numJobs);
                    $this->bind(":job_eligibilty",$jobEli);
                    $this->bind(":job_perks",$jobPerks);
                    $this->execute();
            }
            catch(Throwable $e)
            {
                echo $e;
            }
            
        }

        public function deleteJob($jobId)
        {
            try
            {
                $query="DELETE FROM jobs WHERE job_id=:jobId";
                $this->query($query);
                $this->bind(":jobId",$jobId);
                $this->execute();

            }
            catch(Throwable $e)
            {
                echo $e;
            }

        }
        public function search($jobTitle)
        {
            try
            {
                $search="SELECT jobs.*,company.name
                FROM jobs
                INNER JOIN company
                ON jobs.company_id = company.company_id WHERE job_title=:job_title";
                
                $this->query($search);
                $this->bind(":job_title",$jobTitle);
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



    }



?>