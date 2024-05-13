<?php
 
require_once('classes/classes/database.php');
$con = new database();
 
$id=$_POST['id'];
 
if(empty($id)) {
    header('location:index2.php');
}else{
    $rows = $con->viewdata($id);
}if (isset($_POST['update'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $birthday = $_POST['birthday'];
  $sex = $_POST['sex'];
  $username = $_POST['user'];
  $password = $_POST['pass'];
  $confirm = $_POST['confirm'];
  $street = $_POST['street'];
  $barangay = $_POST['barangay'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $user_id= $_POST['id'];

if($password == $confirm){
 if($con->updateuser($user_id, $firstname, $lastname, $birthday, $sex, $username, $password)){
  if($con->updateuseradress($user_id, $street, $barangay, $city, $province)){
    header('location:index2.php');
    exit();
  }else{
    $error = "Ërror occured while updating user address. Please Try Again";
  }
}else{
  $error = "Error occured while updating user information. Please Try Again";
    }
  }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Page</title>
  <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 
  <style>
    body{
      background-color: grey;
    }
    .custom-container{
        width: 800px;
    }
    body{
    font-family: 'Roboto', sans-serif;
    }
  </style>
 
</head>
<body>
 
<div class="container custom-container rounded-3 shadow my-5 p-3 px-5">
  <h3 class="text-center mt-4"> Registration Form</h3>
  <form method ="post">
    <!-- Personal Information -->
    <div class="card mt-4">
      <div class="card-header bg-dark text-white">Personal Information</div>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6 col-sm-12">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" value="<?php  echo $rows['firstname'];?>" name="firstname" placeholder="Enter first name" required>
          </div>
          <div class="form-group col-md-6 col-sm-12">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" value="<?php  echo $rows['lastname'];?>" name="lastname" placeholder="Enter last name" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" name="birthday" id="birthday" value="<?php  echo $rows['birthday'];?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="sex">Sex:</label>
            <select class="form-control" name="sex" id="sex"required>
              <option selected>Select Sex</option>
              <option value="Male" <?php if ($rows['sex'] == 'Male') echo 'selected';?>>Male</option>
              <option value="Female" <?php if ($rows['sex'] == 'Female') echo 'selected';?>>Female</option>
              <option value="Bading" <?php if ($rows['sex'] == 'Bading') echo 'selected';?>>Bading</option>
              <option value="Yobmot" <?php if ($rows['sex'] == 'Yobmot') echo 'selected';?>>Yobmot</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="user" value="<?php  echo $rows['user'];?>" placeholder="Enter username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="pass" value="<?php  echo $rows['pass'];?>" placeholder="Enter password" required>
        </div>
        <div class="form-group">
      <label for="confirm">Confirm Password:</label>
      <input type="confirm" class="form-control" id="confirm" placeholder="Re-Enter password" name="confirm" value="<?php  echo $rows['pass'];?>">
    </div>
      </div>
    </div>
   
    <!-- Address Information -->
    <div class="card mt-4">
      <div class="card-header bg-dark text-white">Address Information</div>
      <div class="card-body">
        <div class="form-group">
          <label for="street">Street:</label>
          <input type="text" class="form-control" id="street" name="street" value="<?php  echo $rows['user_street'];?>" placeholder="Enter street" required>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="barangay">Barangay:</label>
            <input type="text" class="form-control" id="barangay" name="barangay" value="<?php echo $rows['user_barangay'];?>" placeholder="Enter barangay" required>
          </div>
          <div class="form-group col-md-6">
            <label for="city">City:</label>
            <input type="text" class="form-control" id="city" name="city" value="<?php echo $rows['user_city'];?>" placeholder="Enter city" required>
          </div>
        </div>
        <div class="form-group">
          <label for="province">Province:</label>
          <input type="text" class="form-control" id="province" name="province" value="<?php echo $rows['user_province'];?>" placeholder="Enter province" required>
        </div>
      </div>
    </div>
   
    <!-- Submit Button -->
   
    <div class="container">
    <div class="row justify-content-center gx-0">
        <div class="col-lg-3 col-md-4">
           <input type="hidden" name="id" value ="<?php echo $rows['user_id'];?>">
            <input type="submit" name="update" class="btn btn-outline-light btn-block mt-4" value="Update">
        </div>
        <div class="col-lg-3 col-md-4">
            <a class="btn btn-outline-light btn-block mt-4" href="login.php">Go Back</a>
        </div>
    </div>
</div>
 
 
  </form>
</div>
 
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
<!-- Bootsrap JS na nagpapagana ng danger alert natin -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>