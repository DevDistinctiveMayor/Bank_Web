
<?php

// $connection = mysqli_connect("localhost", "root", "", "mayor4");



// // if (!$connection) {
// //     die("Error". mysqli_connect_error());
// // }echo "Connect successfully";
// if ($connection->connect_error) {
//     die("Error! " .
//         $connection->connect_error);
// } else {
//     // echo "Connect Succesfully";
// }


    function sanitize($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);
        $data =filter_var($data);

        return $data; 
    }
    function isValidPassword($pwd) {
        if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $pwd))
            return FALSE;
        return TRUE; 
    }

    $fnameError = "";
    $lnameError = "";
    $emailError = "";
    $passwdError = "";
    $phoneError = "";
    $addrError = "";
    $countryError = "";
    $stateError = "";
    $zipError = ""; 
    $dobError = "";
    
    $fname = $email = $pwd = $phone = $addr = $country = $state
    = $zip = $lname = $dob = $filetoupload = 
    $password = $dup_entry_email = $dup_entry_phone = $password_Error = "";




  


    $connection = mysqli_connect("localhost", "root", "", "Customer_Reg_Info");


    if(!$connection){
        die("Error". mysqli_connect_error());
    }echo "";
    

        if(isset($_POST["submit"])){
            $fname = sanitize($_POST["name"]);
            $lname = sanitize($_POST["lname"]);
            $email = sanitize($_POST["email"]);
            $pwd = sanitize($_POST["pwd"]);   

            //$password = sanitize($_POST["pwd"]);
            $phone = sanitize($_POST["phone"]);
            $addr = sanitize($_POST["addr"]);
            $password = ($_POST["pwd"]);
            $dob = ($_POST["dob"]);
            $country = sanitize($_POST["country"]);
            $state = sanitize($_POST["state"]);
            $zip = sanitize($_POST["zip"]);


            //  if(mysql_num_rows($check) != 0)
            //  {
            //      echo "Already in Exists<br/>";
            //  }else
     
            if(empty($_POST['name'])){
                $fnameError = "<span class='eop'>Full Name is compulsory!</span>";
            }
            elseif (empty($_POST["lname"])){
                $lnameError = "<span class='eop'>Lastname is required</span>";
            }
            elseif (empty($_POST['email'])){
                $emailError = "<span class='eop'>Email is required</span>"; 

            } elseif (empty($_POST['phone'])){
                $phoneError = "<span class='eop'>Phone No is required</span>";

            } elseif (empty($_POST['addr'])){
                $addrError = "<span class='eop'>Address is required</span>";


            } elseif (empty($_POST['pwd'])){
                $passwdError = "<span class='eop'>Password is required!</span>";

            } elseif (empty($_POST['dob'])){
                $dobError = "<span class='eop'>Date of birth is required</span>";

            }elseif (empty($_POST['country'])){
                $countryError = "<span class='eop'>country is required</span>";

            } elseif (empty($_POST['state'])){
                $stateError = "<span class='eop'>state No is required</span>";

            } elseif (empty($_POST['zip'])){
                $zipError = "<span class='eop'>zip is required</span>";    
            }
            
            else{
                $sql = "INSERT INTO `customer_details`(`SrNo`, `FirstName`, 
                `LastName`, `Email`, `PhoneNo`, `Address`, 
                `Password`, `DOB`, `Country`, `State`, `Zip`) 
                VALUES ('','".$fname."','".$lname."','".$email."',
                '".$phone."','".$addr."','".$pwd."','".$dob."',
                '".$country."','".$state."','".$zip."')";

               

                $query = "SELECT * FROM customer_details WHERE Email = '$email'";
                $query_phone = "SELECT * FROM customer_details WHERE  PhoneNo = '$phone'";
                $result = $connection->query($query);
                $result_phone = $connection->query($query_phone);
            
                if($result){ 
                    if (mysqli_num_rows($result) > 0) {
                        // echo 'found!';
                         $dup_entry_email =  "<span class='eop'>ERROR! This email already exist - Duplicate Record </span>"; 
                         $result->num_rows; 
                        //  return;
                         

                    }elseif(mysqli_num_rows($result_phone) > 0){
                         $dup_entry_phone =  "<span class='eop'>ERROR! This Phone Number already exist - Duplicate Record </span>"; 
                         $result_phone->num_rows; 
                    
                    }elseif(!isValidPassword($password)) { 
                        
                        $password_Error ="<span class='eop'> $password not a valid password!</span>";
                    }
                     else {
                        $result = $connection->query($sql);
                        // echo 'not found';
                        header("Location: loginpage.php");
                    }
                } else {
                    echo 'Error: ' . mysqli_error();
                }
                
                error_reporting(E_ALL);
                ini_set("display_errors", 1);
            }


        

       




}

      
    
    ?>









<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="form.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css"/> -->
</head>
<body>
    <div>
        <!-- <div id="comp"><h1>Daily_Pay</h1></div> -->
        <div id="link">
            <h3 class="secondclass">Enter your details</h3>
            <p class="customer">Customer Details</p>
            <form method="post" action="fintechform.php" enctype="multipart/form-data">



                <label class="label">FirstName: <br>
                    <input class="firstclass" type="text" name="name" placeholder="FirstName" value="<?php echo $fname ?>"/>*
                    <div><?php echo $fnameError; ?></div>
                </label> <br>

                <label class="label">LastName: <br>   
                    <input class="firstclass" type="text" name="lname" placeholder="LastName" value="<?php echo $lname ?>"/>* <br>
                    <div><?php echo $lnameError; ?></div>
                </label>
    

                <label class="label">Email:<br>
                    <input class="firstclass" type="email" name="email" placeholder="@gmail.com" value="<?php echo $email ?>"/>*
                    <div><?php echo $emailError .$dup_entry_email;?></div>
                </label><br>

                <label class="label">Phone:<br>
                    <input class="firstclass" type="number" name="phone" placeholder="+234" size="40" value="<?php echo $phone ?>"/>*<br>
                    <div><?php echo $phoneError .$dup_entry_phone;?></div>
                </label>

                
                <label class="label" >Adrress:<br>
                    <input class="firstclass" type="text" name="addr" value="<?php echo $addr ?>"/>*
                    <div><?php echo $addrError; ?></div>
                </label><br>

                <label class="label">Password:<br>
                    <input class="firstclass" name="pwd" value="<?php echo $pwd ?>"/>*
                    <div><?php echo $passwdError.$password_Error;?></div>
                    <div class="pinfo">password must contain character, lowecase, uppercase, number and special charcater.</div>

               
                </label><br>

                <label class="label">Date Of Birth:<br>
                    <input type="date" name="dob"  class="state1" value="<?php echo $dob ?>"/>
                    <div><?php echo $dobError; ?></div>
                </label><br>

                <label  class="label">Country: </label> <label class="label1 label">State:</label><br>
                <select class="state1" name="country">
                    <option>Nigeria</option>
                    <option>Ghana</option>
                    <option>United Kingdom</option>
                    <option>Kenya</option>
                    <option>United State Of America</option>
                    <option>Spain</option>
                    <option>Germany</option>
                    <div><?php echo $countryError; ?></div>
                </select>
                
                <select class="state2" name="state">
                    <option>Lagos</option>
                    <option>Abuja</option>
                    <option>England</option>
                    <option>Barcelona</option>
                    <option>Washington, D.C.</option>
                    <option>New York city</option>
                </select>
                <div><?php echo $stateError; ?></div>
                

                <label class="label">Zip Code:</label><br>
                <input class="firstclass" type="text" name="zip" value="<?php echo $zip ?>"/><br>
                <div><?php echo $zipError; ?></div>

                <label class="label">Upload Valid Document:
                    <input type="file" name="fileToUpload" class="filemarg"/>
                </label>
                


                <button class="thirdclass" type="submit" name="submit">Create My Account


    
            </form>
        </div>
    </div>

</body>

</html>