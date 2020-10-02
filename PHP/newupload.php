<?php require 'upload.php';?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Image Album</title>
<style>
  .button{
background-color: #1da1f2;
  border: none;
  color: white;
   font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  padding: 15px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
 
  border-radius: 12px;
  }
  </style>
</head>
<body>
<div style="margin:auto">
  <h1 style="text-align:center">Add new images to your album</h1>
  <p style="text-align:center">NOTE: file format allowed: jpg, max file size allowed:200kb, max number of file upload in a single request: 10, files with same name will be overwrited.</p>
</div>
<br>
<div align="center">
<form action="" method="post" enctype='multipart/form-data' name="Login_Form" style="margin:0 auto;width: 500px">
       <input type="file" name="file[]" id="file" multiple><br><br>
      <input name="submit" class="button" type="submit" value="Upload!">
</form>
</div>
<?php if(isset($msg)){?>
      <p align="center"><?php echo $msg;?></p>
    <?php } ?>

<div align="center">
<h1 style="text-align:center">Delete images from album.</h1>
  <p style="text-align:center">Enter the filename of the image to be deleted(Click get file names button to see a list of existing files)</p>
<form method="post">
      <input type="submit" name="getfiles" value="Get file names"><br/><br/>
    <input type="text" name="namepic" id="del">
    <input type="submit" name="delete" value="Delete">

    <?php
        if(isset($_POST['delete'])){
          echo "<br/><br/>";
            $namepic = $_POST['namepic'];
            if(!file_exists("images/$namepic")){
                echo $namepic .' does not exist in the directory';
            }
            else if($namepic === "" || $namepic === "." || $namepic === "..") {
               echo 'Enter a valid image name to delete';

                
            }
            else
            {
                unlink("images/$namepic");
                echo 'Deleted: '. $namepic;
            }
        }

         if(isset($_POST['getfiles'])){
           echo "<br/><br/>";
            $mydir = 'images'; 
            $filedir = scandir($mydir); 
            $totalimgs = count($filedir);
            if($totalimgs<=2)
            {
              echo "images directory is empty";
            }
            else
            {
              for($i=2;$i<$totalimgs;$i++){
              echo $filedir[$i]."<br/>";
            }
        }
      }
    ?>

</form>

<form method="post" action="album.php">
  <br/>
      <input type="submit" class="button" name="getfiles" value="<-- Go back to album"><br/><br/>
</form>
</div>
</body>
</html>
