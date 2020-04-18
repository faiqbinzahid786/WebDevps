<?php
if(!empty($_GET['id'])){
    //phpinfo() external file;
    include 'db_connect.php';
    
    //Get image data from database
    $resultt = $sql = ("SELECT image FROM images WHERE id = {$_GET['id']}");
    $result = $conn->query($sql);
    $return_arr = array();

    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        echo 'Image not found...';
    }
}
?>