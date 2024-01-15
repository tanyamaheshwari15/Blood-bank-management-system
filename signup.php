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
        <button type="submit" value="submit" class="btn btn-outline-success"><a href="index.php" style="text-decoration:none; color:#fff;">Login</a></button>
      </form>
    </div>
  </nav>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "sql.php";

    $nameErr1 = false;
    $nameErr2 = false;
    $passerr = false;
    $termserr = false;
    $err = false;
    $fname = $_POST['name'];
    $pass = $_POST['password'];
    $terms = isset($_POST['terms']);

    if (empty($_POST["name"])) {
      $nameErr1 = true;
      echo "Name is required";
    } else {
      if (!preg_match("/^[a-zA-Z-']*$/", $fname)) {
        $nameErr2 = true;
        echo "Only letters allowed";
      }
    }
    if (empty($_POST["password"])) {
      $passerr = true;
      echo "Password is required";
    }
    if (empty($_POST["terms"])) {
      $termserr = true;
      echo "Accepts the terms and conditions";
    }
    if (!$nameErr1 && !$nameErr2 && !$passerr && !$termserr) {
      $existsql = "SELECT fname FROM signup WHERE fname='$fname'";
      $result = mysqli_query($con, $existsql);
      $numrows = mysqli_num_rows($result);

      if ($numrows > 0) {
        echo "<h4>Username Already exist </h4>";
      } else {
        $exist = false;
        $sql = "INSERT INTO signup(fname, pass, terms)
VALUES('$fname', '$pass', '$terms')";
        $result = mysqli_query($con, $sql);

        if (!empty($_POST["name"]) && !empty($_POST["password"])  && !empty($_POST["terms"])) {
          if ($result) {
            $err = true;
            session_start();
            header("location: index.php");
          }
        }
      }
    }
  }
  ?>
  <form class="container" method="post">
    <h1>SIGNUP FORM</h1>
    <br>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label" id="field">Username</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
    <button type="submit" name="submit" value="submit" class="btn btn-primary" id="exampleInputEmail1">Signup</button>
    <br> <br>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label" id="field">Already have an account?
        <a href="index.php" class="btn-primary">Login</a></label>
    </div>
  </form>
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