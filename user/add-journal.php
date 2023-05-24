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
               
                if($_POST)
                {   
                   
                    include("../connection.php");
                    $userrow = $database->query("select * from patient where pemail='$useremail'");
                    $userfetch=$userrow->fetch_assoc();
                    $userid= $userfetch["pid"];
                
                    //$first = $_POST['first_name'];
                    $last = $_POST['last_name'];
                    $date = $_POST['j_date'];
                    $subject = $_POST['j_subject'];
                    $rating = $_POST['rating'];
                    $message= $_POST['j_message'];
                    $sql = "INSERT INTO journal (pid,j_date,j_subject,rating, j_message)
                    VALUES ('$userid','$date', '$subject', '$rating', '$message')";
                    if (mysqli_query($database, $sql)) {
                        //echo '<script>alert("Thank you for writing to us!")</script>';
                        echo '<script language="javascript">';
                        echo 'alert("Successfully created a journal entry!")';
                        echo '</script>';
                        //$error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Thank you for writing to us!</label>';
                    }else {
                        echo "Error: " . $sql . "
                " . mysqli_error($database);
                     }
                   header('location: journal.php');
                   exit;

                }
?>