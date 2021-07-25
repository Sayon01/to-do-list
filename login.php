<?php
require("top.inc.php");

    $msg='';
    if (isset($_POST['submit'])){
      $username=get_safe_value($conn,$_POST['username']);
      $password=get_safe_value($conn,$_POST['password']);
      $sql= "select * from users where email='$username' and password = '$password'";
      $res = mysqli_query($conn,$sql);
    $count= mysqli_num_rows($res);
    if ($count>0){
        $row= mysqli_fetch_assoc($res);
        $_SESSION['LOGIN']='yes';
        $_SESSION['USERNAME']=$username;
        $_SESSION['USER_ID']=$row['id'];
      header('location:index.php');
    }
    else{
       $msg="please enter correct username or password";
      }
      
   }
?>

<section>
    <div class="container">
        <div class="row justify-content-md-center">
            <div>
            <h1>Login</h1>
            </div>
            
        </div>
        <div class="row justify-content-md-center">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Log In</button>
                <div class="form-group form-check">
                    <label class="form-check-label" for="exampleCheck1">Don't have a account? <a href="register.php">Register First</a></label>
                </div>
            </form>
            <?php  echo $msg ?>
        </div>
    </div>

</section>


<?php
require("footer.inc.php")

?>