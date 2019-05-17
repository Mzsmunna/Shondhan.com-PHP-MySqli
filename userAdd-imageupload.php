<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    $getPic = "";
    $picName = "";
    $selectedInput = "";
    if(isset($_POST['upldPic1']))
    {
        $picName = $_SESSION['picName1'];
        $getPic = $_SESSION['getPic1'];
//        $selectedInput = "photo1";
        echo "inside pic 1 change <br>";
        
    }
    
    if(isset($_POST['upldPic2']))
    {
        $picName = $_SESSION['picName2'];
        $getPic = $_SESSION['getPic2'];
//        $selectedInput = "photo2";
        echo "inside pic 2 change <br>";
        
    }
    
    if(isset($_POST['upldPic3']))
    {
        $picName = $_SESSION['picName3'];
        $getPic = $_SESSION['getPic3'];
//        $selectedInput = "photo3";
        echo "inside pic 3 change <br>";
        
    }
    
    if(isset($_POST['upldPic4']))
    {
        $picName = $_SESSION['picName4'];
        $getPic = $_SESSION['getPic4'];
//        $selectedInput = "photo4";
        echo "inside pic 4 change <br>";
        
    }
    
    if(isset($_POST['upldPic5']))
    {
        $picName = $_SESSION['picName5'];
        $getPic = $_SESSION['getPic5'];
//        $selectedInput = "photo5";
        echo "inside pic 5 change <br>";
        
    }
    //$userName = $_SESSION["username"];
    //$userDir = $_SESSION["userdir"];
    //$userPath = $_SESSION["userpath"];
    //$userPP = $_SESSION["fullpath"];
    //$picName = $_SESSION["picname"];
    echo $getPic;
    
    
    
    $addPath = $_SESSION["addPath"];
    $addDir = $_SESSION['addDir'];
    $addPicPath = $_SESSION["fullpath"];
    $addID = $_SESSION["aid"];
    //$picName = $_SESSION["picname"];
    
    //echo $userDir;
    //Create PARTICULAR Directory if not Exist!
    if (!file_exists("$addPath")) {
        mkdir("$addPath", 0777, true);
    }
    
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
    //if(isset($_FILES["photo"])){
        //$allowed = array("jpg" => "image/jpg", "JPG" => "image/jpg", "jpeg" => "image/jpeg", "JPEG" => "image/jpeg", "gif" => "image/gif", "GIF" => "image/gif", "png" => "image/png", "PNG" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        //if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        
        //delete existing pic/file
        if (file_exists($getPic)) {
            //echo "The file $filename exists";
            echo "about to de the older one! <br>";
            unlink("$getPic");
        }
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        //if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("$addDir" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " is already exists.";
                //unlink('test.html');
            } //else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "$addDir" . $_FILES["photo"]["name"]);
                
                //rename("$userDir"."$filename", "$addDir"."$userName"."."."$ext");
                rename("$addDir"."$filename", "$picName"."."."$ext");
                echo "Your file was uploaded successfully.";
                header("Location: userAdd-item.php?aid=$addID");
            //} 
        //} else{
          //  echo "Error: There was a problem uploading your file. Please try again."; 
        //}
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>