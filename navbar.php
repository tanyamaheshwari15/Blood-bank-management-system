<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLOOD BANK MANAGEMENT SYSTEM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    a{
      text-decoration:none; 
      color:#fff;
    }
  </style>
</head>

<body style=" background-image:url('bg.png'); background-repeat: no-repeat;
    background-size: 100% 800px;
     color: #fff;">
  <nav class="navbar bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <form class="d-flex" role="search">
        <div class="btn-group">
          <button type="button" style="text-decoration:none; color:#fff;" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            Donor
          </button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
            <li><button class="dropdown-item" type="button">Add New</button></li>
            <li><button class="dropdown-item" type="button">Update Details</button></li>
            <li><button class="dropdown-item" type="button">All Donor Details</button></li>
          </ul>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="btn-group">
          <button type="button" style="text-decoration:none; color:#fff;" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            Search Blood Donor
          </button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
            <li><button class="dropdown-item" type="button">Location</button></li>
            <li><button class="dropdown-item" type="button">Blood Group</button></li>
          </ul>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="btn-group">
          <button type="button" style="text-decoration:none; color:#fff;" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            Stock
          </button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
            <li><button class="dropdown-item" type="button">Increase</button></li>
            <li><button class="dropdown-item" type="button">Decrease</button></li>
            <li><button class="dropdown-item" type="button">Details</button></li>
          </ul>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <div class="btn-group">
          <button type="button" style="text-decoration:none; color:#fff;" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            Delete Donor
          </button>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
            <li><button class="dropdown-item" type="button">Delete Donor</button></li>
          </ul>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" value="submit" class="btn btn-outline-success"><a href="logout.php">Logout</a></button>
      </form>
    </div>
  </nav>
  <h1>
    WELCOME-<?php echo $_SESSION['fname']; ?>
  </h1>
  <p>If you want to logout , Click here- <a href="logout.php" style="text-decoration:none; color:#92b3e8;">Logout</a>
  </p>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>