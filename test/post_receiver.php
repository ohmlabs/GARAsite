
       <?php
           //$name = $_POST['field3'];
           //$email = $_POST['field4'];
           $plays = $_POST['field5'];
           $subscribers = $_POST['field6'];
           $records = $_POST['field7'];
           $signed = $_POST['field9'];
           $songs = $_POST['field10'];
           $chartpos = $_POST['field11'];
           $twitter = $_POST['field12'];
           $fb = $_POST['field13'];
           $sc = $_POST['field14'];
           $venue = $_POST['field15'];
           $press = $_POST['field16'];
           $tv = $_POST['field17'];
           $product = $_POST['field18'];
           $cosigns = $_POST['field19'];
           $gScore = $_POST['gScore']; 

         if ($plays > 8944) {
             $plays = 8944;
         } 
         if ($subscribers > 1005555) {
             $subscribers = 100555;
         }
         if ($records > 19937500) {
             $records = 19937500;
         }

         if ($chartpos <= 10) {
             $chartpos = 8.33;
         } elseif ($chartpos <= 20 ) {
             $chartpos = 7.33;
         } elseif ($chartpos <= 40) {
             $chartpos = 6.33;
         } elseif ($chartpos <= 100) {
            $chartpos = 5.33;
         } elseif ($chartpos <= 200) {
           $chartpos = 4.33;
         } else {
           $chartpos = 0;
         }
         
         if ($twitter > 4888888) {
             $twitter = 4888888;
         }
         
         if ($fb > 17222222) {
            $fb = 17222222;
         }
  
         if ($sc > 641111) {
            $sc = 641111;
        }
        if ($venue > 29.9) {
           $venue = 29.9; 
        }
        if ($press > 13.9) {
           $press = 13.9;
        }
        if ($tv > 10.8) {
          $tv = 10.8;
        }
        if ($product > 2.11) {
          $product = 2.11;
        }
         if ($cosigns > 2.11) {
          $cosigns = 2.11;
        }

        $wtdPlays = ((($plays/8944)*100)*0.15);
        $wtdSubs = ((($subscribers/100555)*100)*0.1633);
        $wtdRecords = ((($records/19937500)*100)*0.16556);
        $wtdTwitter = ((($twitter/4888888.889)*100)*0.08667);
        $wtdFB = ((($fb/17222222.222)*100)*0.05444);
        $wtdSC = ((($sc/641111.111)*100)*0.05778);
        $wtdVenue = ((($venue/29.889)*100)*.06000);
        $wtdPress = ((($press/13.889)*100)*.05000);
        $wtdTV = ((($tv/10.778)*100)*.10333);
        $wtdProduct = ((($product/2.111)*100)*.01889);
        $wtdCosign = ((($cosigns/2.111)*100)*0.006670);
        $total =  ($wtdPlays + $wtdSubs + $wtdRecords + $wtdTwitter + $wtdFB + $wtdSC + $wtdVenue + $wtdPress + $wtdTV + $wtdProduct + $wtdCosign +$chartpos);
        if ($signed = "No") {
            $gScore = ($total*8);
        } else  {
           $gScore = (($total*8)*1.618);
        }
        //echo "<pre>";
                 //print_r($_POST);
        //echo "</pre>";
        echo"<p><b> Your Final G-Score (/800) is: </b></p>";
        echo"<br> <b> $gScore </b> <br> <br>"; 
        echo"<b> Score Breakdown: </b> <br>";
        echo"Radio Score: $wtdPlays /15 <br>";
        echo"Billboard Score: $chartpos /8.33 <br>";
        echo"Youtube/Vevo Score: $wtdSubs /16.33 <br>";
        echo"Record Sales Score: $wtdRecords /8.333 <br>";
        echo"Twitter Score: $wtdTwitter /8.667 <br>";
        echo"Facebook Score: $wtdFB /5.44 <br>";
        echo"Soundcloud Score: $wtdSC /5.78 <br>";
        echo"Live Performance Score: $wtdVenue /6 <br>";
        echo"Press Score: $wtdPress /5 <br>";
        echo"TV Score: $wtdTV /10.33 <br>";
        echo"Product Score: $wtdProduct /1.889 <br>";
        echo"Co-Sign Score: $wtdCosign /0.667 <br>";

    //ENTERING stuff into DB- to do later!!

        //$mysqli= new mysqli("fdb5.biz.nf","username","password","database");

        //mysqli_select_db($mysqli,"database");

        //$sql = "INSERT INTO Locations (name, email) VALUES " .
         //  "('$routeID','$custID','$stopnumber','$customer','$latitude','$longitude','$timestamp')";
        //mysqli_query($mysqli, $sql); 

        //$error = mysqli_error($mysqli);  

       ?>