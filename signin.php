<?php
include 'header.php';
include 'navbar.php';
include 'function.php';
include 'dbConnection.php';
$err = [];
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_POST as $key => $val) {
      //echo($val);
        if(empty($val)) {
            $err[$key] = '<div class="alert alert-danger" role="alert">
                            cannot be empty..!
                          </div>';
        }
    }
}

?>
<!-- Section: Design Block -->
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
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <?=$err['firstName']??''?>
                    <input type="text" id="form3Example1" name="firstName" class="form-control" />
                    <label class="form-label" for="form3Example1">First name</label>
                    
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <?=$err['lastName']??''?>
                    <input type="text" id="form3Example2" name="lastName" class="form-control" />
                    <label class="form-label" for="form3Example2">Last name</label>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <?=$err['userName']??''?>
                <input type="text" id="form3Example3" name="userName" class="form-control" />
                <label class="form-label" for="form3Example3">UserName</label>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <?=$err['email']??''?>
                <input type="email" id="form3Example3" name="email" class="form-control" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <?=$err['password']??''?>
                <input type="password" id="form3Example4" name="password" class="form-control" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <!-- Re Enter Password -->
              <div class="form-outline mb-4">
                <?=$err['Repassword']??''?>
                <input type="password" id="form3Example4" name="Repassword" class="form-control" />
                <label class="form-label" for="form3Example4">Re Enter Password</label>
              </div>

              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="index.php" class="link-success">please Log in..</a></p>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4" name="btn_signin">
                Sign up
              </button>
              </form> 
              
              <?php
              if(!empty($_POST)){
                 $postRequest = $_POST;
                 $FIRSTNAME = $postRequest["firstName"];
                 $LASTNAME  = $postRequest["lastName"];
                 $USERNAME  = $postRequest["userName"];
                 $EMAIL     = $postRequest["email"];
                 $PASSWORD  = md5($postRequest["password"]);
                 if($postRequest['btn_signin']==''){
                    if(samePassword($postRequest['password'],$postRequest['Repassword']) != true){
                        echo alert("password does not match...!","danger");
                    }else if(unWantedChar($postRequest['userName'])==true){
                        echo alert("UnWanted Character","danger");
                    }else if( alreadyExit($connection,'signup','username',$postRequest['userName'],'email',$postRequest['email']) == true){
                        echo alert("User Name OR E-mail alredy exits","danger");
                    }else{
                        $sql = "INSERT INTO `signup`( `email`, `username`, `userPassword`, `firstname`, `lastname`) 
                        VALUES ('$EMAIL','$USERNAME','$PASSWORD','$FIRSTNAME','$LASTNAME')";
                        if (mysqli_query($connection,$sql)) {
                                echo alert("Insert Successful..","success");
                            } else {
                                echo alert("Something Wrong..!","danger");
                            }
                        }
                    }
           


            
                }

              ?>  
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<?php
include 'footer.php';
?>