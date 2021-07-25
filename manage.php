<?php
require("top.inc.php");
loggedin();

$user_id=$_SESSION['USER_ID'];
$list='';
$due_date='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $id=$_GET['id'];
    $res=mysqli_query($conn,"select * from `list` where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row= mysqli_fetch_assoc($res);
        
        $list=$row['list'];
        $due_date=$row['due_date'];
    }else{
        header('location:index.php');
        die();
    }
}

if(isset($_POST['edit'])){
    $msg='';
    $list=get_safe_value($conn,$_POST['list']);
    $due_date=get_safe_value($conn,date('d-m-Y',strtotime($_POST['date'])));
    
    if(mysqli_query($conn,"UPDATE `list` SET `list`='$list',`due_date`=STR_TO_DATE('$due_date','%d-%m-%Y') where id='$id'")){
        header('location:index.php');
    }else{
        echo 'Database connection error';
    }
    die();
        
     
}else if(isset($_POST['add'])) {
    $list=get_safe_value($conn,$_POST['list']);
    $due_date=get_safe_value($conn,date('d-m-Y',strtotime($_POST['date'])));
    echo $due_date;
    $added_on= date("d-m-Y");
    // echo "INSERT INTO `list` (`id`, `user_id`, `list`, `due_date`, `added_on`, `status`) VALUES (NULL, '$user_id', '$list',STR_TO_DATE('$due_date','%d-%m-%Y'),STR_TO_DATE('$added_on','%d-%m-%Y'), '1');";
    // die();
    if(mysqli_query($conn,"INSERT INTO `list` (`id`, `user_id`, `list`, `due_date`, `added_on`, `status`) VALUES (NULL, '$user_id', '$list',STR_TO_DATE('$due_date','%d-%m-%Y'),STR_TO_DATE('$added_on','%d-%m-%Y'), '1');")){

        header('location:index.php');
    }else{
        echo "Database error";
       
    }
    die();
}



?>

<section>
    <?php
        if (isset($_GET['action']) && $_GET['action']="edit") {
    ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div>
            <h1>Edit Your To do List </h1>
            </div>
            
        </div>
        <div class="row justify-content-md-center">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Work To Do</label>
                    <input type="text" name="list" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your work" value='<?php echo $list ?>'>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Due Date</label>
                    <input type="date" name="date" class="form-control" id="" aria-describedby="emailHelp" placeholder="Due Date" value='<?php echo $due_date ?>'>
                </div>
                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                
            </form>
        </div>
    </div>
    <?php
        }else{
    ?>
    <div class="container">
        <div class="row justify-content-md-center">
            <div>
            <h1>Add Your To do List </h1>
            </div>
            
        </div>
        <div class="row justify-content-md-center">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Work To Do</label>
                    <input type="text" class="form-control" name="list" id="" aria-describedby="emailHelp" placeholder="Enter your work">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Due Date</label>
                    <input type="date" class="form-control" name="date" id="" aria-describedby="emailHelp" placeholder="Due Date">
                </div>
                <button type="submit" name="add" class="btn btn-primary">Add</button>
                
            </form>
        </div>
    </div>
    <?php
        }
    ?>
</section>


<?php
require("footer.inc.php")

?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  </script>