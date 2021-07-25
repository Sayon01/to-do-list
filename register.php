<?php
require("top.inc.php");
if (isset($_POST['submit'])){
    $msg='';
    $email='';
    $mobile='';
    $password='' ;
    
    $email=get_safe_value($conn,$_POST['email']);
    $mobile=get_safe_value($conn,$_POST['mobile']);
    $password=get_safe_value($conn,$_POST['password']);

    $check_users=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));

    if($check_users>0){
        $msg="Email already exist";
    }else{
        
        
        mysqli_query($conn,"insert into users(email,password,mobile) values('$email','$password','$mobile')");
        header("location:login.php");
    }
}
?>

<section>
    <div class="container">
        <div class="row justify-content-md-center">
            <div>
            <h1>Register Here</h1>
            </div>
            
        </div>
        <div class="row justify-content-md-center">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mobile No.</label>
                    <input type="number" name="mobile" class="form-control" id="exampleInputPassword1" placeholder="Mobile number">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
                <div class="form-group form-check">
                    <label class="form-check-label" for="exampleCheck1">Already have a account? <a href="register.php">Login here</a></label>
                </div>
            </form>
            <?php
                echo $msg;

                ?>
        </div>
    </div>

</section>


<?php
require("footer.inc.php")

?>