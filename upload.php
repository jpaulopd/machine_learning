<?php

// 1) Start the session and include the flash.php and functions.php files so that we can use the utility functions defined above:
session_start();

require_once __DIR__ . '/flash.php';
require_once __DIR__ . '/functions.php';


// 2) Define an array that specifies the allowed files:
const ALLOWED_FILES = [
    'text/csv' => 'csv',
    'text/plain' => 'csv'
    // 'image/jpeg' => 'jpg'
];

// 3) Define a constant that specifies the max file size:
const MAX_SIZE = 20 * 1024 * 1024; //  20MB

// 3) Define the upload directory that stores the uploaded files:
const UPLOAD_DIR = __DIR__ . '/upload';

// 4) Return an error message if the request method is not POST or the file does not exist in the $_FILES variable:
$is_post_request = strtolower($_SERVER['REQUEST_METHOD']) === 'post';
$has_file = isset($_FILES['file']);

if (!$is_post_request || !$has_file) {
    redirect_with_message('Invalid file upload operation', FLASH_ERROR);
}

//5) Get the uploaded file information including error, filename, and temporary filename:
$status = $_FILES['file']['error'];
$filename = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];

// 6) Return an error message if the file was failed to upload:
// an error occurs
if ($status !== UPLOAD_ERR_OK) {
    redirect_with_message($messages[$status], FLASH_ERROR);
}

// 7) Get the size of the file in the temporary folder and compare it with the MAX_SIZE. If the size of the uploaded file is greater than MAX_SIZE, issue an error:
// validate the file size
$filesize = filesize($tmp);
if ($filesize > MAX_SIZE) {
    redirect_with_message('Error! your file size is ' . format_filesize($filesize) . ' , which is bigger than allowed size ' . format_filesize(MAX_SIZE), FLASH_ERROR);
}

// 8) Get the MIME type and compare it with the MIME type of the allowed files specified in the ALLOWED_FILES array; issue an error if the validation fails:
// validate the file type
$mime_type = get_mime_type($tmp);
if (!in_array($mime_type, array_keys(ALLOWED_FILES))) {
    redirect_with_message('The file type is not allowed to upload: ' . $mime_type, FLASH_ERROR);
}

// 9) Construct a new filename by concatenating the filename from the uploaded file with the valid file extension.
// set the filename as the basename + extension
$uploaded_file = pathinfo($filename, PATHINFO_FILENAME) . '.' . ALLOWED_FILES[$mime_type]; //Note that the following pathinfo() returns the filename without the extension:

// 10) Move the file from the temp directory to the upload folder and issue an error or success message depending on the result of the move_uploaded_file() function:
// new file location

$filepath = UPLOAD_DIR . '/' . $uploaded_file;

// move the file to the upload dir
$success = move_uploaded_file($tmp, $filepath);
if ($success) 
{
    // $_SESSION["uploadPath"] = './'. 'upload/' . $uploaded_file;
    $_SESSION["uploadPath"] = str_replace('\\', '/', realpath($filepath));
    
    redirect_with_message('The file was uploaded successfully.', FLASH_SUCCESS);    
}

redirect_with_message('Error moving the file to the upload folder.', FLASH_ERROR);

