<?php
    function loggedin(){
        if (isset($_SESSION['LOGIN']) && $_SESSION['LOGIN']='yes') {
           
        }else{
            ?>
                <script>
                    window.location.href='login.php';
                </script>
            <?php
        }
    }

    function get_safe_value($con,$str){
        if($str!=''){
            $str=trim($str);
            return mysqli_real_escape_string($con,$str);
        }
    }

?>