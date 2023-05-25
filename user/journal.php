<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <title>Mood Journal</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
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
                                    <p style="font-weight: bold;" class="profile-title"><?php echo substr($username,0,13)  ?>..</p>
                                    <p style="font-weight: bold;" class="profile-subtitle"><?php echo substr($useremail,0,22)  ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../index.html" ><input type="button" value="Log out" style="font-weight: bold;" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home " >
                        <a href="index.php" class="non-style-link-menu"><div><p class="menu-text"  style="font-weight: bold;">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-notebook menu-active menu-icon-notebook-active">
                        <a href="journal.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text" style="font-weight: bold;">Mood Journal</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-view">
                        <a href="view_journal.php" class="non-style-link-menu" ><div><p class="menu-text" style="font-weight: bold;">View Journal</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor">
                        <a href="doctors.php" class="non-style-link-menu"><div><p class="menu-text" style="font-weight: bold;">Mental Health Specialists</p></a></div>
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
                        <a href="settings.php" class="non-style-link-menu"><div><p class="menu-text"  style="font-weight: bold;">Settings</p></a></div>
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
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;">Mood Journal</p>
                                           
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
            <h2>Create your journal here</h2>
         
            <form action="add-journal.php" method="post">
            <ul class="form-style-1 sub-table">
                <!--<li>
                    <label>Full Name <span class="required">*</span></label>
                    <input type="text" name="first_name" class="field-divided" placeholder="First" required/> <input type="text" name="last_name" class="field-divided" placeholder="Last" required/>
                </li>-->
                <li>
                    <label>Date <span class="required">*</span></label>
                    <!--<input type="email" name="field3" class="field-long" />-->
                    <input id="datefield" type="date" name="j_date" class="field-long" required />
                </li>
                <li>
                    <label>Subject <span class="required">*</span></label>
                    <input type="text" name="j_subject" class="field-divided" placeholder="Subject" required/> 
                </li>
                <li>
                    <label>Please rate your mood on a scale of 1-5 stars.<span class="required">*</span></label>
                    <p>                 5 = Cheerful,
                                                4 = Satisfied,
                                                3 = Neutral,
                                                2 = Upset,
                                                1 = Miserable.</p>
                    <div class="rated" style="margin:10px;">
                    <input type="radio" id="star5" class="rated" name="rating" value="Cheerful"/>
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" checked id="star4" class="rated" name="rating" value="Satisfied"/>
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" class="rated" name="rating" value="Neutral"/>
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" class="rated" name="rating" value="Upset">
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" class="rated" name="rating" value="Miserable"/>
                    <label for="star1" title="text">1 star</label>
                    </div>
                </li><br>
                <li><br>
                <br><label>Write here <span class="required">*</span></label>
                    <textarea name="j_message" rows="auto" cols="50%" placeholder="Write your thoughts and feelings here..." required ></textarea>
                </li>
                <li>
                    <input type="submit" value="Submit" />
                </li>
            </ul>
            </form>
        </div>
</div>
</div>

    <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("datefield").setAttribute("max", today);
    </script>



</body>

</html>