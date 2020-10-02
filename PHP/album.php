<?php  session_start();/* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
$mydir = 'images'; 

$filedir = scandir($mydir); 
$firstfile= 2;
$lastfile=$dirsize-1;

?>
<!DOCTYPE html>
<html>
<head>
<style>
	.btns{
		display:grid;
		width:40%;
		margin:auto;
		grid-template-columns:auto auto auto auto;
		grid-gap:20px;
		justify-items:center;
	}
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
	<h1 align="center">Welcome to the photo album</h1><br/>
	<h2 align="center">Surf through the current album, add new images or delete current ones!</h2>
<p align="center">

	<?php
$totalimgs = count($filedir);
if($totalimgs > 2) {

    if(isset($_POST['first']) || (isset($_POST['previous']) && $_SESSION['currindex'] === 2)) {
        echo "<img style='max-height: 500px;width: auto;' src='images/$filedir[2]' alt='albums_images'>";
        $_SESSION['currindex'] = 2;
    }
    else if(isset($_POST['last']) || (isset($_POST['next']) && $_SESSION['currindex'] === ($totalimgs-1))) {
        $last = $totalimgs - 1;
        echo "<img style='max-height: 500px;width: auto;' src='images/$filedir[$last]' alt='albums_images'>";
        $_SESSION['currindex'] = $last;
    }
    else if(isset($_POST['previous'])) {
        $_SESSION['currindex']--;
        $currimg = $_SESSION['currindex'];
        echo "<img style='max-height: 500px;width: auto;' src='images/$filedir[$currimg]' alt='albums_images'>";
    }
    else if(isset($_POST['next'])) {
        $_SESSION['currindex']++;
        $currimg = $_SESSION['currindex'];
        echo "<img style='max-height: 500px;width: auto;'src='images/$filedir[$currimg]' alt='albums_images'>";
    }
    else{
    	echo "<img style='max-height: 500px;width: auto;' src='images/$filedir[2]' alt='albums_images'>";
    }
} 
else {
    echo "Directory Empty, Please add more images with the given button to continue.";
}
?>

</p>

<form method="post"> 
<div class="btns" align="center">
	<input type="submit" name="first"
                class="button" value="first" /> 
          
    <input type="submit" name="previous"
                class="button" value="previous" /> 

    <input type="submit" name="next"
                class="button" value="next" /> 
          
    <input type="submit" name="last"
                class="button" value="last" /> 
</div>
</form> 
<br/>
<br/>
<div align="center">
	<form method="post" action="newupload.php">
	<input type="submit" class="button" value="Upload/Delete images!"/>
</form>
</div>
</body>
</html>