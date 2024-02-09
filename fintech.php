<?php
//   session_start();

 

//   if(isset($_SESSION["userid"])){
//     $session =  'Welcome Back:' . $_SESSION["name"];
// //    echo "<br>Email : ". $_SESSION["email"];
// }
// else{
//    echo "You have not logged in Click <a href='#'>here</a> to log in";
// }
 
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fintech</title>
    <link rel="stylesheet" href="fintech.css" type="text/css">
</head>
<body >


 
    <div id="comp">

            <div class="flex">
                <img src="mayor.JPG" class="userimg">
                <h3 class="text-box"> Hi, <b>Mayor</h3>
          

            <?php
            // echo "<h1 class='wel'Welcome back:</h1>". $session;
            ?>
              </div>
          
            <div class="iconset">
                <a href="#"><img src="Img/building.svg" claSS="icon"></a>
               <a href="#"><img src="Img/bell.svg" class="icon"></a>
            </div>      
    
        <div class="firstclass">
            <div class="firstmarg">
                <p>Account Balance:</p>
                <h2 id="bal">&#8358; 500,458.25</h2>
            </div> 
        </div>


        <div class="float">
            <button id="hide" onclick="hdb()">Hide Balance</button>
            <a href="#"><button id="opn" href="#">Open a business account</button></a>
        </div>
     
  
        <div id="link">
            <h3> What did you want to do today?</h3>

            <div class="float">
                <div class="daily">
                    <img src="Img/registered.svg" class="svg" >
                    <button>Daily Rewards</button>
                </div>
        

                <div class="manage">
                    <img src="Img/user.svg" class="svg">
                    <button>Manage Account</button>
                </div>
            </div>
        
            <div class="float">
                <div class="chat">
                    <img src="Img/message.svg" class="svg">
                    <button>Chat us</button>
                </div>
        
            

                <div class="act">
                    <img src="Img/searchengin (1).svg" class="svg">
                    <button>My Activities</button>
                </div>
            </div>
       

            <div class="float">
                <div class="money">
                    <img src="Img/money-bill-1.svg"class="svg">
                    <button>Send Money</button>
                </div>

                <div class="recMoney">
                    <img src="Img/registered.svg" class="svg">
                    <button>Receive Money</button>  
                </div>
            </div>
        </div> 
          
        
        
        <div class="Third">
            <img src="Img/lightbulb.svg" class="icon1"><a class="last"href="#">Home</a>
            <img src="Img/map-location.svg" class="icon1"><a class="last" href="#">Breakdown</a>
            <img src="Img/paypal.svg" class="icon1"><a class="last" href="#">Payment</a>
            <img src="Img/credit-card.svg" class="icon1"><a class="last" href="#">Cards</a>
            <img src="Img/user.svg" class="icon1"><a class="last" href="#">More</a>
            
        </div>

<!--     
        <div class="last">
            <a href="">Home</a> 
            <a href="">Breakdown</a>
            <a href="">Payment</a>
            <a href="">Cards</a>
            <a href="">More</a>
        </div> -->
    </div>
    <script src="fintech.js"></script>             
</body>
