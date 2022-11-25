<?php 

    function connection(){
        $host = "localhost";
        $username = "id19435639_root";
        $password = "buksuGuidance@123";
        $database = "id19435639_buksu_guidance_office";

        $con = new mysqli($host,$username,$password,$database);

         if($con->connect_error){
            echo $con->connect_error;
        }else{
            return $con;
        }

    }