<?php

use google\appengine\api\cloud_storage\CloudStorageTools;

print_r($_FILES); //this will print out the received name, temp name, type, size, etc.


$size = $_FILES['audio_data']['size']; //the size in bytes
$input = $_FILES['audio_data']['tmp_name']; //temporary name that PHP gave to the uploaded file
$output = $_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea

//$options = ['gs_bucket_name' => $clabspeakeasy.appspot.com];
//$upload_url = CloudStorageTools::createUploadUrl('/upload/handler', $options);

$default_bucket = CloudStorageTools::getDefaultGoogleStorageBucketName();
$fileContents = file_get_contents($_FILES);
file_put_contents("gs://${default_bucket}/".$output, $fileContent);
file_put_contents("gs://${default_bucket}/".$output, $_FILES);


//move the file from temp name to local folder using $output name
move_uploaded_file($input, $output)
?>