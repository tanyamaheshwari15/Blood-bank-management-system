<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLOOD BANK MANAGEMENT SYSTEM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css" />
  <style>
    #password {
      position: relative;
      left: 400px;
      width: 500px;
    }
  </style>
</head>

<body>
  <nav class="navbar bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <form class="d-flex" role="search">
        <h2 style="color:#fff;">BLOOD BANK MANAGEMENT SYSTEM</h2>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="submit" class="btn btn-outline-success"><a href="signup.php" style="text-decoration:none; color:#fff;">Signup</a></button>
      </form>
    </div>
  </nav>


  <?php
  $login = false;
  $Showerror = false;
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "sql.php";
    $fname = $_POST['name'];
    $pass = $_POST['password'];
    $terms = isset($_POST['terms']);

    $sql = "SELECT * FROM signup WHERE fname='$fname' and pass='$pass' and terms='$terms'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
      $login = true;
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['fname'] = $fname;
      $_SESSION['pass'] = $pass;
      $_SESSION['terms'] = $terms;
      header("location: navbar.php");
      echo "Login Successful";
    } else
      echo $Showerror = "Login failed";
  }
  ?>


  <form class="container" method="post">
    <h1>LOGIN FORM</h1>
    <br>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" id="field">Username</label>
      <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp">
    </div>
    <br>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label" id="field">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
      <label for="chk2" class="form-label" id="field">Show Password</label>
      <input type="checkbox" id="chk2" onclick="myFunction()">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label" id="field">Accept terms and conditions</label>
      <input type="checkbox" name="terms" id="chk">
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary" id="exampleInputEmail1">Login</button>
    <br> <br>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label" id="field">Don't have an account?
        <a href="signup.php" class="btn-primary">Signup</a></label>
    </div>
  </form>
  <br>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script>
    let x = document.getElementById("password");
    let y = document.getElementById("chk2");

    y.onclick = function() {
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
</body>

</html>