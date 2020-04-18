<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        
        //phpinfo() external file;
        include 'db_connect.php';
        
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $sql = ("INSERT into images (image, created) VALUES ('$imgContent', '$dataTime')");
        $result = $conn->query($sql);
        $return_arr = array();
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>