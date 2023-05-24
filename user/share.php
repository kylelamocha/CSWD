            <style type="text/css">
                * {
                box-sizing: border-box;
                font-family: Assistant, sans-serif;
                }

                input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                resize: vertical;
                font-size: 17px;
                font-family: Assistant, sans-serif;
                }

                label {
                padding: 12px 12px 12px 0;
                display: inline-block;
                }

                input[type=submit] {
                background-color: #0A76D8;
                color: white;
                padding: 12px 20px;
                border: none;
                margin-top: 10px;
                border-radius: 4px;
                cursor: pointer;
                float: left;
                }

                input[type=submit]:hover {
                background-color: #006dd3;
                }

                .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                }

                .col-25 {
                float: left;
                width: 50%;
                margin-top: 6px;
                }

                .col-75 {
                float: left;
                width: 75%;
                margin-top: 6px;
                }

                /* Clear floats after the columns */
                .row::after {
                content: "";
                display: table;
                clear: both;
                }

                /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
                @media screen and (max-width: 600px) {
                .col-25, .col-75, input[type=submit] {
                    width: 100%;
                    margin-top: 0;
                }
                }
            </style>

<?php
                    
                include("../connection.php");
               
                $id = $_GET['ID'];
                //$d_id = $_GET['docid'];

                $result = mysqli_query($database, "SELECT * FROM journal WHERE ID=$id");
                //$result = mysqli_query($database, "SELECT * FROM doctor WHERE docname=$docname"  UNION SELECT docname FROM doctor WHERE docid=$d_id); 
                while($res = mysqli_fetch_array($result))
                {
                
                $id = $res['ID'];
                $name = $res['first_name'];
                $date = $res['j_date'];
                $subject = $res['j_subject'];
                $rate = $res['rating'];
                $message = $res['j_message'];

                //$MH= $res['docid'];


                }
?>
            

            <div class="container">
            <form>
            <a href="view_journal.php" style="margin-bottom:10px;">Back</a>
            <div class="row">
                <div class="col-25">
                <label for="ID">ID</label>
                </div>
                <div class="col-75">
                <input type="text" id="ID" name="ID" value="<?php echo $id;  ?> ">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="fname">Name</label>
                </div>
                <div class="col-75">
                <input type="text" id="fname" name="first_name" value="<?php echo $name;  ?> ">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="j_date">Date</label>
                </div>
                <div class="col-75">
                <input type="text" id="j_date" name="j_date" value="<?php echo $date; ?> ">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="j_subject">Subject</label>
                </div>
                <div class="col-75">
                <input type="text" id="j_subject" name="j_subject" value="<?php echo $subject; ?> ">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="rating">Ratings</label>
                </div>
                <div class="col-75">
                <input type="text" id="rating" name="rating" value=" <?php echo $rate; ?> ">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                <label for="j_message">Message</label>
                </div>
                <div class="col-75">
                <input type="text" j_message name="j_message" value="  <?php echo $message; ?> ">
                </div>
            </div>
            <div class="row">
                <!--<div class="col-25">
                <label for="rating"></label>
                </div>
                <div class="col-75">
                <input type="text" id="rating" name="rating" value="  ">
                </div>-->
                <div class="col-25">
                <label for="MH">Choose a Mental Health Specialist:</label>
                </div>
                <select id="MH" name="MH" class="col-75">
                    <option value="<?php echo $MH; ?>"></option>
                    <!--<option value="saab">Saab</option>
                    <option value="fiat" selected>Fiat</option>
                    <option value="audi">Audi</option>-->
                </select>
            </div>
            
            <div class="row">
                <input type="submit" value="Submit">
            </div>
            </form>
            </div>
                        
                            
                
                
               
               
                
                
                
               


