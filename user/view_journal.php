<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <title>View Journal</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        #customers {
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        #customers tr:nth-child(even){
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }
        #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: rgb(10,118,216);
        color: white;
        }
</style>
</head>
<body>
<?php

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


//echo $userid;
//echo $username;

?>
<div class="container">
    <div class="menu">
        <table class="menu-container" border="0">
            <tr>
                <td style="padding:10px" colspan="2">
                    <table border="0" class="profile-container">
                        <tr>
                            <td width="30%" style="padding-left:20px" >
                                <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                            </td>
                            <td style="padding:0px;margin:0px;">
                                <p class="profile-title" style="font-weight: bold;"><?php echo substr($username,0,13)  ?>..</p>
                                <p class="profile-subtitle" style="font-weight: bold;"><?php echo substr($useremail,0,22)  ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="../index.html" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"  style="font-weight: bold;"></a>
                            </td>
                        </tr>
                </table>
                </td>
            </tr>
            <tr class="menu-row" >
                <td class="menu-btn menu-icon-home" >
                    <a href="index.php" class="non-style-link-menu"><div><p class="menu-text"  style="font-weight: bold;">Home</p></a></div></a>
                </td>
            </tr>
            <tr class="menu-row">
                    <td class="menu-btn menu-icon-notebook">
                        <a href="journal.php" class="non-style-link-menu"><div><p class="menu-text"  style="font-weight: bold;">Mood Journal</p></a></div>
                    </td>
            </tr>
            <tr class="menu-row">
                    <td class="menu-btn menu-icon-view menu-active menu-icon-view-active">
                        <a href="view_journal.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text"  style="font-weight: bold;">View Journal</p></a></div>
                    </td>
                </tr>
            <tr class="menu-row">
                <td class="menu-btn menu-icon-doctor">
                    <a href="doctors.php" class="non-style-link-menu"><div><p class="menu-text"  style="font-weight: bold;">Mental Health Specialists</p></a></div>
                </td>
            </tr>
            <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session">
                       <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text"> <b>Book Appointment</b></p></div></a>
                    </td>
            </tr>
            <tr class="menu-row" >
                <td class="menu-btn menu-icon-appoinment">
                    <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text" style="font-weight: bold;">My Appointments</p></a></div>
                </td>
            </tr>
            <tr class="menu-row" >
                <td class="menu-btn menu-icon-settings">
                    <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text" style="font-weight: bold;">Settings</p></a></div>
                </td>
            </tr>
            
        </table>
    </div>
    <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%" >
                    <a href="index.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">View Journal</p>
                                           
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 

                        date_default_timezone_set('Asia/Kolkata');

                        $today = date('Y-m-d');
                        echo $today;

                        
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>
                </tr>
            </table>
            <h2>View your journal entries here</h2>
            <?php
            
            include('../connection.php');
            $query = "SELECT * FROM journal WHERE 
            pid = '".$userid."' ";
            $result = mysqli_query($database, $query);
            ?>
            <table  id="customers">
            <tr>
                <th>User ID</th>   
                <!--<th>Name</th>-->
                <th>Date</th>
                <th>Subject</th>
                <th>Rate your Mood</th>
                <th>Message</th>
                <th>Delete</th>
                <!--<th>Share</th>-->
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
            $sn=1;
            while($data = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td><?php echo $data['pid']; ?> </td>
            <td><?php echo $data['j_date']; ?> </td>
            <td><?php echo $data['j_subject']; ?> </td>
            <td><?php echo $data['rating']; ?> </td>
            <td><?php echo $data['j_message']; ?> </td>
            <td>
                <!--<a href="#">Edit</a>--> 
                <a onClick="return confirm('Are you sure you want to delete?')" href="delete.php?ID=<?php echo $data["ID"]; ?>">Delete</a>
            </td>
            
            </tr>
            <?php
            $sn++;}
            } else { ?>
                <tr>
                <td colspan="8">No journal entries found</td>
                </tr>
            <?php } ?>
            </table>


</body>
</html>