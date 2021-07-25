<?php
    session_start();
    $conn= mysqli_connect('localhost','root','mysql','todolist');

    // class is used only in index.php due to lack of time i'm using direct methods in other pages
    class database{
        private $host;
        private $dbusername;
        private $dbpassword;
        private $dbname;
    
        protected function connect(){
            $this-> host='localhost';
            $this-> dbusername='root';
            $this-> dbpassword='mysql';
            $this-> dbname='todolist';
            $con=new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
            return $con;
        }
    
    }
    
    class query extends database{
        public function getData($table,$user_id){
            $sql="SELECT * FROM `$table` WHERE user_id=$user_id order by due_date asc";
            $result=$this->connect()->query($sql);
            
            if($result->num_rows>0){
                $arr=array();
                while($row=$result->fetch_assoc()){
                    $arr[]=$row;
                }
                return $arr;
            }else{
                return 0;
            }
        } 
        public function deleteData($table,$id){
            $sql="DELETE FROM `$table` WHERE id=$id";
            $result=$this->connect()->query($sql);
            
            if($result){
                return 1;
            }else{
                return 0;
            }
        } 
        public function updateData($table,$status,$id){
            $sql="UPDATE `$table` SET `status`= $status WHERE id=$id";
            // echo "UPDATE `$table` SET `status`=  `$status` WHERE id=$id";
            // die();
            $result=$this->connect()->query($sql);
            
            if($result){
                return 1;
            }else{
                return 0;
            }
        } 
    }
    

?>