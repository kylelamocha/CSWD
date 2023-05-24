<?php

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='d'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }

    //$userrow = $database->query("select * from schedule where pemail='$useremail'");
    //$userfetch=$userrow->fetch_assoc();
    //$userid= $userfetch["pid"];
    //$username=$userfetch["pname"];
    
    
    if($_POST){
        //import database
        include("../connection.php");
        
        $title=$_POST["title"];
        $docid=$_POST["docid"];
        $nop=$_POST["nop"];
        $date=$_POST["date"];
        $time=$_POST["time"];

        $query = $database->query("select * from schedule where docid='$docid' AND scheduledate='$date' AND scheduletime='$time'"); //select
        $sql="insert into schedule (docid,title,scheduledate,scheduletime,nop) values ($docid,'$title','$date','$time',$nop);";
        //$result= $database->query($sql);

        $numrows = mysqli_num_rows($query);
        if($numrows >0) {
            //echo "Appointment Exists!";
            //echo "<script> alert('Appointment Exists!')</script>";
            //header("location: appointment.php");
            echo"<script type='text/javascript'>alert('Session exists! Time or Date constraints');
            window.location.href='schedule.php';</script>";
            //header("location: appointment.php?action=booking-added");
         }else{
            $result= $database->query($sql);
            header("location: schedule.php?action=session-added&title=$title");
         }
       
        
    }


?>