<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        body {
          margin: 0;
        }
        .imgleft{
          position: absolute;
          left:10px;
          top:10px;
          padding: 0px;
        }
        .imgleft img{
          padding: 0px;
          width: 80px;
        } 
        header{
          border:1px solid grey;
          border-radius:3px;  
            text-align: center;
            font-size: 30px;
            font-weight:bolder;
            padding-top: 0.1px;
            padding-bottom: 0.1px;
            color:rgb(255, 255, 153);
            /* background-color: aqua; */
            background-image:url(https://images.pexels.com/photos/208512/pexels-photo-208512.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=75&w=126);
        }
        nav {
          width: 20%;
          background-color: #f1f1f1;
          position: fixed;
          height: 100%;
          text-align: center;
          font-weight: bolder;
          font-size: larger;
        }
        nav a {
          display: block;
          color: black;
          padding: 16px;
          text-decoration: none;
        }
        nav a:hover {
          background-color: #555;
          color: white;
          border: 2px black;
          border-radius: 5px;
        }
        .ac{
            color: azure;
            background-color: rgb(113, 179, 179);
            border-radius: 5px;
        }
        section{
          float: left;
          margin-left: 20%;
          width:80%;
        }
        #regs{
            margin-left:35px;
            margin-top:20px;
        }
        .cls{
            background-color: rgba(230, 222, 194, 0.733);
            border-radius:3px;
            width:30%;
        }
        .cls:hover{
            background-color:white;
        }
        .btn{
          color:cyan;
          text-decoration: none;
          background: rgb(53, 53, 53);
          padding:4px 10px;
          border-radius: 15px;
          font-family:cursive;
          margin-left:40px;
          margin-top:5px;
          width:90px;
          border:2px ridge;
          border-color:cyan;
        }
        .btn:hover{
        color:  rgb(17, 17, 17);
        background: rgb(236, 227, 227);
        cursor: pointer;}
        .logout{
          text-decoration:none;
          background-color:white;
          padding:3px;
          margin-top:150px;
          border:2px black;
          border-radius:5px;
          color:red;
      }
        </style>
</head>

<body>
    <header>
      <div class="imgleft">
        <img src="https://images.pexels.com/photos/7411935/pexels-photo-7411935.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="fdgd">
     </div>
        <p>Welcome to AB Pharmacy</p>
    </header>
    <nav>
        <a href="3logged.php">Buy</a>
        <a class="ac" href="#">Profile</a>
        <a href="contact.html">Contact</a> 
        <a class='logout' href="1login.php">Log Out</a>
    </nav>
    <section>
    <form method="post" id="regs">
    <p>!You can't change your username-</p><br>
        <label  for="name">Name:</label><br>
        <input class="cls" type="text" name="name" id="name" value='<?php echo $_SESSION["name"]; ?>' required><br><br>
        <label for="mail">E-mail:</label><br>
        <input class="cls" type="email" name="mail" id="mail" value='<?php echo $_SESSION["mail"]; ?>' required><br><br>
        <label for="phone">Phone:</label><br>
        <input class="cls" type="text" name="phone" id="phone" value='<?php echo $_SESSION["phone"] ?>' required><br><br>
        <label for="username">Username:</label><br>
        <input class="cls" type="text" name="username" id="username" value='<?php echo $_SESSION["username"]; ?>' readonly><br><br>
        <label for="passwprd">Password:</label><br>
        <input class="cls" type="password" name="password" id="password" value='<?php echo $_SESSION["password"]; ?>' required>
        <br><br>

        <label for="address">Address:</label><br>
        <input class="cls" type="text" name="address" id="address" value='<?php echo $_SESSION["address"]; ?>' required>
        <br><br>
        <input class="btn" type="submit" onclick="update()" name="submit" id="submit" value="Update">
        
        </form>
    </section>

    <!-- javascript -->
    <script>
        function update(){
          document.getElementById("regs").action="profile2.php";
        }
    </script>
</body>
</html>