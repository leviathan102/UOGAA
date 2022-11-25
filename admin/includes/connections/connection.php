<?php 

    function connection(){
        $host = "localhost";
        $username = "root";
        $password = "buksuguidance";
        $database = "buksu_guidance_system";

        $con = new mysqli($host,$username,$password,$database);

         if($con->connect_error){
            echo $con->connect_error;
        }else{
            return $con;
        }

    }