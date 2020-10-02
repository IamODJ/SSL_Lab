<?php 
if(isset($_POST['submit'])){
 $countfiles = count($_FILES['file']['name']);
 $msg="";
 if($countfiles>10)
 {
   $msg .= "More than 10 files selected, aborting.";
 }
 else if($countfiles==1 && $_FILES['file']['name'][0]=="" ){
 	   $msg .= "Select a file before uploading";

 }
 else{
   
 for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['file']['name'][$i];
   $filesize = $_FILES['file']['size'][$i];
   $filetype = $_FILES['file']['type'][$i];

	$path = pathinfo($filename);
	$ext = $path['extension'];
	if($filetype !== "image/jpeg"){     /*jpeg and jpg are nearly similar*/
		$msg .= "$filename not uploaded (only jpg allowed) <br/>";
		continue;
	}
	if($filesize >200000)
	{
		$msg .= "$filename not uploaded (max size exceeded) <br/>";
		continue;
	}
   move_uploaded_file($_FILES['file']['tmp_name'][$i],'images/'.$filename);
    $msg .= "Uploaded $filename<br/>";
 }
}
} 
?>