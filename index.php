<?php
require("top.inc.php");
loggedin();
$obj=new query();
if (isset($_GET['action']) && $_GET['action']!=''){
    $type = get_safe_value($conn,$_GET['action']);
    if ($type == 'status'){
       $operation=get_safe_value($conn,$_GET['operation']);
       $id=get_safe_value($conn,$_GET['id']);
       if ($operation=='cancle'){
            $obj->updateData('list',0,$id);
       }else{
        $obj->updateData('list',1,$id);
       }
       
    }
    if ($type=='delete'){
       $id=get_safe_value($conn,$_GET['id']);
       $obj->deleteData('list',$id);
    }
  }

$user_id=$_SESSION['USER_ID'];

$result=$obj->getData('list',$user_id);


?>
<section>
    <div class="container-fluid">
    <a href="manage.php">
    <button type="button" class="btn btn-primary">Add<span>&#43;</span> </button>
    </a><br>
    </div><br>
    <div class="container-fluid">
        <?php
            if($result==0){

            }else{
        ?>
        <div class="row">
        
            <div class="col-sm-12">
            <table class="table table-striped table-dark ">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">To Do List</th>
                    <th scope="col">Due date</th>
                    <th scope="col">Added On</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Cancel</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $n=1;
                    foreach($result as $key=>$value){    

                ?>
                <tr>
                    <th scope="row"><?php echo $n ?></th>
                    <td><div class="overflow-hidden">
                        <?php 
                            if($result[$key]['status'] ==1 ){
                                echo($result[$key]['list']); 
                            }else{
                                    echo '<strike>'.$result[$key]['list'].'"</strike>';
                                }
                        ?>
                    </div></td>
                    <td><?php echo($result[$key]['due_date']) ?></td>
                    <td><?php echo($result[$key]['added_on']) ?></td>
                    <td><a href="manage.php?action=edit&id=<?php echo $result[$key]['id'] ?>">Edit</a></td>
                    <td>
                        <?php 
                        if($result[$key]['status'] ==1 ){
                            echo '<a href="?action=status&operation=cancle&id='.$result[$key]['id'].'">Cancle</a>';
                        }else{
                            echo '<a href="?action=status&operation=revive&id='.$result[$key]['id'].'">Revive</a>';
                        }
                        ?>
                    </td>
                    <td><a href="?action=delete&id=<?php echo $result[$key]['id'] ?>">Delete</a></td>
                </tr>
                <?php
                $n++;
                    }                  
                ?>
            </tbody>
            </table>
            </div>
        </div>
        <?php
            }
        ?>
    </div>


</section>

<?php
require("footer.inc.php")

?>