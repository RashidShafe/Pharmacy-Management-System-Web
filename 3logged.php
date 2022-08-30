<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS</title>
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
         
        nav a.active {
          background-color: #04AA6D;
          color: white;
        }
        
        nav a:hover {
          background-color: #555;
          color: white;
          border: 2px black;
          border-radius: 5px;
        }
        section{
          float: left;
          margin-left: 20%;
          width:80%;
        }
        .page{
          padding: 10px;
        }
        table{
          margin-top: 10px;
          width:40%;
        }
        table,th,td{
          float:center;
          border:2px outset green;
          border-collapse:collapse; 
          margin-left:2%;
          margin-right:auto;
        }
        td{
          text-align:center;

        }
        .ac{
            color: azure;
            background-color: rgb(113, 179, 179);
            border-radius: 5px;
        }
        table tr:not(:first-child){
            cursor: pointer;
            transition:all .25s ease-in-out;
        }
        table tr:not(:first-child):hover{
          background-color:#ddd;
        }
        .input{
            width: 100%;
            padding: 5px;
            font-family: cursive;
            font-size: 15px;
            color: black;
            /*background-color: rgba(255, 222, 194, 0.733);*/
        }
        input.fld{
          border-radius:15px;
          background-color: rgba(230, 222, 194, 0.733);
          padding:3px;
          margin:5px;
        }
        input.fld:hover{
          background-color:white;
        }
        .fld2{
          margin-left:40px;   
        }
        .txt{
          padding:5px;
          font-family:cursive;
          margin-left:20%;
        }
        #txtarea{
          height:150px;
          width:40%;
          margin-left:2%;
        }
        label{
          font-family:cursive;
        }
        .addbtn,.addbtn2{
          color:cyan;
          text-decoration: none;
          background: rgb(53, 53, 53);
          padding:4px 10px;
          border-radius: 15px;
          font-family:cursive;
          margin-left:112px;
          margin-top:5px;
          width:60px;
          border:2px ridge;
          border-color:cyan;
        }
        .addbtn:hover,.addbtn2:hover{
        color:  rgb(17, 17, 17);
        background: rgb(236, 227, 227);
        cursor: pointer;}

        .addbtn2{
          margin-left:50px;
        }
        .pr{
          border-style:none;
          background-color:yellow;
          width:80px;
        }
        .pbtn{
          color:cyan;
          text-decoration: none;
          background: rgb(53, 53, 53);
          padding:4px 10px;
          border-radius: 15px;
          font-family:cursive;
          margin-left:50px;
          margin-top:5px;
          width:100px;
          border:2px ridge;
          border-color:cyan;
        }
        .pbtn:hover{
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
        <a class='ac' href="#">Buy</a>
        <a href="profile.php">Profile</a>
        <a href="contact.html">Contact</a> 
        <a class='logout' href="1login.php">Log Out</a>
    </nav>
    <section>
      <div class="page">
        <form action="" method="post">
        <label for="cat">Category:</label>
        <select name="cat" id="cat">
          <option value="All">All</option>
          <option value="Tablet">Tablet</option>
          <option value="Capsule">Capsule</option>
          <option value="Syrup">Syrup</option>
          <option value="Injection">Injection</option>
          <option value="Drop">Drops</option>
        </select>
        <input type="submit" value="Select" name="submit">
        </form>

          <table class="list" id='table'>
          <tr>
              <th>Name</th>
              <th>Manufacturer</th>
              <th>Unit price(TK)</th>
          </tr>
          <!-- PHP code for table data fetch -->
          <?php
            if(isset($_POST['submit']))
            {
              $selected=$_POST['cat'];
              $servername="localhost";
              $username="root";
              $password="";
              $dbname='pm';
              $con=mysqli_connect($servername,$username,$password,$dbname);
              if(strcmp($selected,"All")==0)
              {
                $q="select name,manufacturer, `unit price` from medicine";
                $result= mysqli_query($con,$q)or trigger_error("Query Failed! SQL: $q - Error: ".mysqli_error($con), E_USER_ERROR);;
                $count=mysqli_num_rows($result);
                if ($count > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                    {
                        echo "<tr><td> ". $row["name"]. " </td><td> ". $row["manufacturer"]. "</td><td>" . $row["unit price"] ."</td></tr>";
                    }
                }
              }  
              else if (strcmp($selected,"All")!=0){   
                $q="select name,manufacturer, `unit price` from medicine where type='$selected'";
                $result= mysqli_query($con,$q)or trigger_error("Query Failed! SQL: $q - Error: ".mysqli_error($con), E_USER_ERROR);;
                $count=mysqli_num_rows($result);
                if ($count > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                    {
                        echo "<tr><td> ". $row["name"]. " </td><td> ". $row["manufacturer"]. "</td><td>" . $row["unit price"] ."</td></tr>";
                    }
                }
              }
                $con->close();
            }
          ?>
          <!--  table END -->
          </table>

      </div>
    </section>
    <section>
        <div class='input'>
          Medicine name:<input class="fld" type="text" name="mname" id="mname"> 
          Unit price:<input class="pr" type="number" id="up" value="0" readonly><br>
          <div class= "fld2">Quantity:<input class="fld" type="number" name="qn" id="qn"></div>
          <button class="addbtn" type="button" onclick="add()">Add</button>
          <button class="addbtn2" type="button" onclick="clr()">Clear</button>
        </div>
    </section>
    <section class="txt">
      <form id="f" method="post">
      <br><label for="txtarea">Order preview box:</label><br>
      <textarea id="txtarea" name="txtarea">
          Med. Name         Unit         Price
      </textarea><br>
      Total price:<input class ="pr" type="number" name="up2" id="up2" value="0" readonly><br>
      <label for="payment">Payment Method:</label>
        <select name="payment" id="payment">
          <option value="pod">On delivery</option>
        </select>
        <input class="pbtn" type="submit" onclick="order()" value="Place-Order">
      </form>
    </section>
<!-- Javascript codes -->
    <script>
      var table=document.getElementById('table'),rIndex;
      for(var i=0; table.rows.length;i++ )
      {
        table.rows[i].onclick=function()
        {
          rIndex=this.rowIndex;
          document.getElementById("mname").value=this.cells[0].innerHTML;
          document.getElementById("up").value=this.cells[2].innerHTML;
        }
      }

      function add(){
        var x=document.getElementById("mname").value;
        let y=document.getElementById("qn").value;
        let z=document.getElementById("txtarea").value;
        let p=document.getElementById("up").value;
        var pr=parseInt(y*p);
        var pr2=parseInt(document.getElementById("up2").value);
        document.getElementById("txtarea").value=z+"\n"+x+"           "+y+"           "+(y*p);
        document.getElementById("up2").value=pr+pr2;
      }
      function clr(){
        document.getElementById("txtarea").value="        Med. Name            Unit            Price";
        document.getElementById("up2").value=0;
      }
      function order(){
        document.getElementById("f").action="3order.php";
      }
    </script>
</body>
</html>