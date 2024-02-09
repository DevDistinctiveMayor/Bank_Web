<?php 

// $cookiename = "User";
// $cookievalue = ($_POST["name"]);

// setcookie($cookiename, $cookievalue,  time()+86400, "/" );

//    $name = $_POST["name"] = "";
 
    // $_SESSION["pwd"] = "mayor@gmail.com";
$connection = mysqli_connect("localhost", "root", "", "Customer_Reg_Info");

if(!$connection){
    die("Error". mysqli_connect_error());
}echo "";

function sanitize($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

    $emailError = "";
    $pwdError = "";

    $email = $pwd = $password = $invalid_pwd = $invalid_email ="";
    
function isValidPassword($password) {
    if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $password))
        return FALSE;
    return TRUE; 
}

 if(isset($_POST["submit"])){
    // session_start();
  
    // $_SESSION["userid"] = "Apt01";
    // $_SESSION["name"] = $_POST["name"];

    $email = sanitize($_POST["email"]);
    $pwd = sanitize($_POST  ["pwd"]);
    $password = sanitize($_POST["pwd"]);

    if(empty($_POST['email'])){
        $emailError = "<span style='color:red; font-size:14px;'>Email is compulsory!</span>";
    }else{
        $email = $_POST['email'];
    }
    if(empty($_POST["pwd"])){
        $pwdError = "<span style='color:red; font-size:14px'>password is compulsory!</span>";
    }else{
         
         $query = "SELECT Email, `Password` FROM customer_details WHERE Email = '$email' AND `Password` = '$pwd'";
        //  $query_pwd = "SELECT * FROM customer_details WHERE  `Password` = '$pwd'";


         $result = $connection->query($query);
        //  $result_pwd= $connection->query($query_pwd);
         
    if($result){
        if(mysqli_num_rows($result) !== 1){
            // echo $result->num_rows;
             
            $invalid_email =  "<span class='eop'>ERROR! Not a valid email/username or Password - Invalid  Record </span>";
           

        // echo 'not found';
      
    // }elseif(mysqli_num_rows($result_pwd) === 0){
    //     // echo $result_pwd->num_rows; 
                  
    //     $invalid_pwd =  "<span class='eop'>ERROR! Incorrect Password - Invalid Record</span>"; 
    //     // echo "error unable to login_in";

    }
    else {
        echo 'not found';
        header("Location: fintech.php");
        // echo $result_pwd->num_rows; 
   
    } }
    else {
        echo 'Error: ' . mysqli_error();
    }
    

    

  
    }
} 
    
//     if(isValidPassword($password)) { 
//         $password ="<span class='pwda'>$password </span>";
//     }else {
//         $password ="<span class='eop'> $password not a valid password!</span>";
//    }
// }
// $password = '6myP@ssword01'; //valid password
// if(isValidPassword($password)) {
//   echo "$password is a valid password<br />";
// } else {
//   echo "$password is not a valid password<br />";
// }

    // $link = "<script>window.open('fintech.php')</script>";
    // echo $link;

    // $sql = "INSERT INTO `user_login_info`(`SrNo`, `username_email`, `Password`) VALUES ('','$fname',' $pwd')";
    

    

 

 

// $name = $_POST["name"];
// $cookiesname = "user";
// $cookiesvalue = $name;
// // echo $name;
// // $cookiesvalue = $name;
// setcookie($cookiesname, $cookiesvalue,  time()+86400, "/" );
// // $name = $_POST['name'];


 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Paget</title>
    <link rel="stylesheet" type="text/css" href="login.css"/>
    
  
</head>

<body>

    <div id="comp">
   
        <div id="link">
    
            <h2>SIGN IN</h2>
            <form method="post" action="loginpage.php">
                <label>Email/Username:</label><br>
                <input type="email"  class="firstclass" id="user" size="30" name="email" value="<?php echo $email ?>"><br>
                <?php echo $emailError?><br>

                
                <label>Password:</label><br>
                <input class="firstclass" id="txt" size="30" name="pwd" value="<?php echo $pwd ?>"><br>
                <?php echo $pwdError;?><br>

                <div><?php echo $invalid_email?></div>

                <div>password must contain character, lowecase, uppercase, number and special charcater.</div>
               <button  class="seconclass" onclick="login()" name="submit">Login</button>
            </form>
        </div>
   
    </div>
    <script src="login1.js"></script>

</body>
 
</html>
 