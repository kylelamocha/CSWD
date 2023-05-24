<?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];

    
    if(isset($_POST["booknow"])){
        //$userid= $userfetch["pid"];
        $apponum=$_POST["apponum"];
        $docid=$_POST["docid"];
        $scheduleid=$_POST["scheduleid"];
        $date=$_POST["date"];
        $mode=$_POST["Mode_of_consultation"];
        $scheduleid=$_POST["scheduleid"];
        
        //$result= $database->query($sql2);
        
        $query = $database->query("select * from appointment where docid='$docid' AND pid='$userid'"); //select
        $sql2="insert into appointment(pid,docid,apponum,scheduleid,Mode_of_consultation,appodate) values ($userid,$docid,$apponum,$scheduleid,'$mode','$date')"; //Insert query
        //$resultinsert = mysqli_query($sql2);
      
        $numrows = mysqli_num_rows($query);
        if($numrows >0) {
            //echo "Appointment Exists!";
            //echo "<script> alert('Appointment Exists!')</script>";
            //header("location: appointment.php");
            echo"<script type='text/javascript'>alert('Appointment exists! Can only set on one mental health specialist');
            window.location.href='appointment.php';</script>";
            //header("location: appointment.php?action=booking-added");
         }else{
            $result= $database->query($sql2);
            header("location: appointment.php?action=booking-added&id=".$apponum."&titleget=none");
         }
    
        //echo"<script type='text/javascript'>alert('Appointment Exists!');window.location.href='appointment.php';</script>";

    }
   

      
         
        
 ?>