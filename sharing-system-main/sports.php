<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Rental system</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Freckle+Face&family=Parisienne&family=Train+One&display=swap" rel="stylesheet">
  <style >
  table, td, th {
    border: 2px solid black;
    text-align: left;
  }
  th{
    background-color:#393e46;
    color: white;
  }
  table {
    border-collapse: collapse;
    width: 100%;
  }
  .t{
    background-color: white;
    padding: 2%;
  }
  th, td {
    padding: 15px;
  }
  td{
   background-color: #eeee;
  }
  tr:hover {background-color: #ddd ; color: black;}

  .cyclephp{
    text-align: center;
    width: 25%;
    height: 25%;
  }

  </style>
</head>

<body>
  <section id="title-section">
    <div class="container-fluid">
      <nav class="  navbar navbar-dark  navbar-expand-md navafterexpand">
        <a class="navbar-brand" href="homepage.html" style=" padding-left: 0px; ">
          <p style="color: white;font-family: 'Freckle Face', cursive;" class="titletext">Sharing System </p>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div id="ddd" class="dropdown">
                <p class="navtext navtext-dropdown">Search</p>
                <div class="dropdown-content">
                  <a href="cycles.php"><p class="drop-text">Cycles</p></a>
                  <a href="cameras.php"><p class="drop-text">Cameras</p></a>
                  <a href="sports.php"><p class="drop-text">Sports</p></a>
                  <a href="kettles.php"><p class="drop-text">kettles</p></a>
                  <a href="calculators.php"><p class="drop-text">Calculators</p></a>
                </div>
              </div>
            </li>
            <li class="nav-item"><a href="homepage.html" class="nav-link">
                <p class="navtext">Home</p>
              </a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">
                <p class="navtext">About</p>
              </a></li>
            <li class="nav-item"><a href="#contact-section" class="nav-link">
                <p class="navtext">Contact</p>
              </a></li>
            <li class="nav-item"><a href="login.php" class="nav-link">
                <p class="navtext">logout</p>
              </a></li>
          </ul>
        </div>
      </nav>
    </div>
  </section>
  <section style="text-align: center;background-color:black">
      <img class="php-image" src="images/sport.jpg"  alt="..." style="height:26%; width:26%;margin-top:5px;padding-bottom:25px;" ><br>
      <button type="button " class="btn php-button btn-dark" style="margin-bottom:15px"><a href="#php-form">Form</a></button>
  </section>
  <section id="php-form" style="padding:5%;background-color:black">
    <div class="card text-white bg-dark" style="margin-top:0px;margin-bottom:0px">
      <div class="card-header">Fill the form if u want to share</div>
      <div class="card-body">
          <form class="card-text" action="sportdata.php" method="post">
            <label for="carusername">Sport User Name:</label><br>
            <input type="text" id="carusername" name="username"><br>
            <label for="caruserpassword">Sport User Phone:</label><br>
            <input type="number" id="caruserphone" name="phonenumber"><br>
            <label for="caruseremail">Sport User Email:</label><br>
            <input type="email" id="caruseremail" name="email"><br><br>
            <input type="submit" value="Submit" name="submit">
          </form>
      </div>
    </div>
  </section>
  <div class="t" style="background-color:black;">
  <?php
  echo "<table>
<tr>
<th>name</th>
<th>Mobile</th>
<th>email</th>
</tr>";
  //Establishing Connection with server by passing server_name, user_id and pass as a patameter
  $conn = mysqli_connect("sql200.epizy.com", "epiz_28564874", "zwV9AzP1Gh");
  //Selecting Database
  $db = mysqli_select_db($conn, "epiz_28564874_Myseproject");
  //sql query to fetch information of registerd user and finds user match.
  $sql = "SELECT * FROM sports";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
      echo "<tr>";
// echo "<td>" .$row["id"]. "</td>";
echo "<td>" .$row["username"]. "</td>";
echo "<td>" .$row["phonenumber"]. "</td>";
echo "<td>" .$row["email"]. "</td>";
echo "</tr>";
    }
  } else {
    echo "0 results";
  }
  mysqli_close($conn);
 ?>
</div>
  </body>
</html>
