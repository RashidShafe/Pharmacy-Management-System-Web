<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style>
    body{
        font-family: cursive;
        background-image: url(log.jpg);
        background-size: cover;
        background-position: bottom;
        margin:auto;
        background-repeat: no-repeat;
        
    }
    .frm{
        background: rgba(0,0,0,0.5);
        width:650px;
        height:450px;
        margin:150px auto;
        text-align: center;
        border:2px ridge;
        border-radius: 15px;
        box-shadow:0 0 50px 10px  rgb(160, 135, 250);
    }
    .frm h1{
        color: blanchedalmond;
        margin:30px;
        padding: 17px 0px;
        background: rgb(58, 41, 75);
        border-radius: 15px;
    }
    .frm input[type="text"], .frm input[type="password"]{
        width:60%;
        display: block;
        margin:10px auto;
        border:2px solid rgb(247, 128, 128);
        border-radius: 30px;
        background: rgb(235, 229, 229);
        font-family: cursive;
        font-size: 20px;
        text-align: center;
        padding: 10px;
        
    }
    .frm input[type="text"]:focus, .frm input[type="password"]:focus{
        background: cornsilk;
        color:black;
    }

    .frm input[type="submit"]{
        font-weight:bold;
        font-family: cursive;
        font-size:20px;
        margin-top:3px;
        border:2px solid rgb(128, 239, 247);
        border-radius: 30px;
        padding: 5px 20px;
        background: rgb(38, 69, 105);
        color: white;
    }
    .frm input[type="submit"]:hover{
        background: cornsilk;
        cursor: pointer;
        color: black;
    }
    p{
        margin-top: 60px;
        color: blanchedalmond;
    }
    a{
        color:cyan;
        text-decoration: none;
        background: rgb(53, 53, 53);
        padding: 3px 10px;
        border-radius: 15px;
    }
    a:hover{
        color:  rgb(17, 17, 17);
        background: rgb(236, 227, 227);
    }
</style>

<body>
    <form class="frm" id="f" method="post" >
        <h1># AB Pharmacy Ltd. #</h1>
        <input  type="text" name="username" id="n1" placeholder="Username">
        <input type="password" name="password" id="n2" placeholder="Password">
        <input type="submit" onclick="chk()" value="Log-in">
        <p>Don't have an account?</p>
        <a href="2form.html" >Create an Account</a>
    </form>
</body>

<script>
    function chk(){
        var x=document.getElementById("n1").value;
	    var y=document.getElementById("n2").value;

        if(x==null || x=="")
        {
            alert("Input Username");
        }
        else if(y==null||y=="")
        {
            alert("You can't login without password");
        }
        else{
            document.getElementById("f").action="1log.php";
        }
    }
</script>
</html>