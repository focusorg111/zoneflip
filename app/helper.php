<?php
use App\Category;
use App\Products;
// My common functions

function is_superAdmin()
{

    $user =\Auth::user();

    if($user->user_type==1)
    {
        return true;
    }
    else{
        return false;
    }
}

function is_seller()
{
    $user =\Auth::user();
    if($user->user_type==2)
    {
        return true;
    }
    else{
        return false;
    }
}


function get_navigation()
{
    return Category::with(['subcategories'])->get();
}

function alert_messages()
{
    return Redirect::back()
       ->with('flash_message', 'internal server errors')
        ->with('flash_type', 'alert-danger');
 }
/**
 * Method is used to create thumbnails.
 *
 * @param $name
 * @param $filename
 * @param $new_w
 * @param $new_h
 * @return Response
 */
function createThumb($name, $filename, $new_w, $new_h)
{
    $found = 0;
    $system = explode('.', $name);
    $echeck = strtolower(end($system));

    if (preg_match('/jpg|jpeg/', $echeck)){
        $src_img = imagecreatefromjpeg($name);
        $found = 1;
    }

    if (preg_match('/png/', $echeck)){
        $src_img = imagecreatefrompng($name);
        $found = 1;
    }

    if (preg_match('/gif/', $echeck)) {
        $src_img = imagecreatefromgif($name);
        $found = 1;
    }

    if ($found) {

        $old_x = imagesx($src_img) ;
        $old_y = imagesy($src_img);
        $ar = $old_x / $old_y;

        if ($old_x > 400) {
            if ($new_w == $new_h) {
                $thumb_w = $new_w;
                $thumb_h = $new_h;
            } else {
                $thumb_w = $new_w;
                $thumb_h = (int)(($old_y / $old_x) * $new_w);
            }
        } else {
            $thumb_w = $old_x;
            $thumb_h = $old_y;
        }

        $dst_img = imagecreatetruecolor($thumb_w, $thumb_h);
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);

        if (preg_match("/png/", $echeck)) {
            imagepng($dst_img, $filename);
        } else if(preg_match('/jpg|jpeg/', $echeck)) {
            imagejpeg($dst_img, $filename,100);
        } else if(preg_match("/gif/", $echeck)) {
            imagegif($dst_img, $filename);
        }
        imagedestroy($dst_img);
    }
    imagedestroy($src_img);
}


/**
 *  upload file and create thumb.
 * @param $fileName
 */
function dropZoneUploader($fileName, $directory = '')
{
    $folder =  $directory;
    $fileParamName = 'file'; //dropzone uploading file name
    $tf = $folder . 'thumbs/';
    if(!is_dir($tf)) {
        mkdir($tf, 0775);
    }

    $mf = $folder;
    if(!is_dir($mf)) {
        mkdir($mf, 0775);
    }

    // retrieve uploaded file path (temporary stored by php engine)
    $sourceFilePath = $_FILES[ $fileParamName ][ 'tmp_name' ];
    if ($directory == '') {
        $targetFilePath = strtolower($folder . 't_' . $fileName);
    } else {
        $targetFilePath = strtolower($folder  . $fileName);
    }

    $thumbFile = strtolower($tf . $fileName);
    $mediumFile = strtolower($mf . $fileName);

    if (move_uploaded_file($sourceFilePath, $targetFilePath)) {
        if ($directory == '') {
            createThumb($targetFilePath, $thumbFile, 150, 200);
            createThumb($targetFilePath, $mediumFile, 200, 200);
            unlink($targetFilePath);
        } else {
            createThumb($targetFilePath, $thumbFile, 400, 300);
            unlink($targetFilePath);
        }

    }

}
?>