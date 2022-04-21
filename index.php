<?php
include 'header.php';
include 'navbar.php';
include 'function.php';
include 'dbConnection.php';
$err = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_POST as $key => $val) {
        if(empty($val)) {
            $err[$key] = '<div class="alert alert-danger" role="alert">
                            cannot be empty..!
                          </div>';
        }
    }
}
if(!empty($_POST)){
  $postRequest = $_POST;
  $USERNAME  = $postRequest["userName"];
  $EMAIL     = $postRequest["email"];
  $PASSWORD  = md5($postRequest["password"]);
  if($postRequest['btn_signin']==''){
     $sql = "SELECT `email`, `username`, `userPassword` 
             FROM  signup
             WHERE email = '$EMAIL'
             AND username = '$USERNAME'
             AND userPassword = '$PASSWORD'";

       $result = mysqli_query($connection,$sql);
       if(mysqli_num_rows($result)>0){
         header("location:maincontent.php");
       }
    
     }

  }
?>
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }
     #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }
     #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }
     .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          The best offer <br />
          <span style="color: hsl(218, 81%, 75%)">for your business</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Temporibus, expedita iusto veniam atque, magni tempora mollitia
          dolorum consequatur nulla, neque debitis eos reprehenderit quasi
          ab ipsum nisi dolorem modi. Quos?
        </p>
      </div>
     <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="" method="POST">
               <div class="form-outline mb-4">
                  <?=$err['userName']??''?>
                  <input type="text" id="form3Example3" name="userName" class="form-control" />
                  <label class="form-label" for="form3Example3">UserName</label>
              </div>
              <div class="form-outline mb-4">
                <?=$err['email']??''?>
                <input type="email" id="form3Example3" name="email" class="form-control" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>
              <div class="form-outline mb-4">
                <?=$err['password']??''?>
                <input type="password" id="form3Example4" name="password" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>
              <div class="form-check d-flex justify-content-center mb-4">
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signin.php" class="link-danger">please Register...</a></p>
              </div>
              <button type="submit" class="btn btn-primary btn-block mb-4" name="btn_signin">
                Sign up
              </button>
              </form>  
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include 'footer.php';
?>