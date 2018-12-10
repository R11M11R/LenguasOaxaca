<?php
//https://stackoverflow.com/questions/34429317/how-can-i-upload-audiomp3-ogg-flac-by-using-php
if(isset($_POST['submit']))
    {

$path = "../audios/"; //file to place within the server
$valid_formats1 = array("mp3", "ogg", "flac"); //list of file extention to be accepted
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $file1 = $_FILES['file1']['name']; //input file name in this code is file1
        $size = $_FILES['file1']['size'];

        if(strlen($file1))
            {
                list($txt, $ext) = explode(".", $file1);
                if(in_array($ext,$valid_formats1))
                {
                        $actual_image_name = $txt.".".$ext;
                        $tmp = $_FILES['file1']['tmp_name'];

                        
                        $out = ltrim($path.$actual_image_name, "0");
                        $out=str_replace(" ","",$out);
                        

                        if(move_uploaded_file($tmp, $out))
                            {
                            echo 'success upload';
                            }
                        else
                            echo "failed";              
                    }
        }
    }
}
?>
<form enctype="multipart/form-data" id="form1" method="post" action="text1.php">
<input type="file" name="file1" accept=".ogg,.flac,.mp3" required="required"/>
<input type="submit" name="submit"/>
</form>