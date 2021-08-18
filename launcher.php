<!doctype html>
<html lang="pl">
<head>
    <?php 
    require_once($_SERVER['DOCUMENT_ROOT'].'/header.php');
    ob_start();
    ?>
    <title>Kameleon | Narzędzie</title>
</head>
<body>
<?php require_once('navbar.php'); ?>
<div class="record-container">
<?php
ini_set('display_errors', 1);
if (isset($_POST['plugin'])) {
    
    #session_start();
    $parameter = [];
    $selected = "none";
    if (isset($_POST['parameter']))
    {
        $parameter = $_POST['parameter'];
        //print_r($parameter);
        $temp_arr = [];
        foreach ($parameter as $param) {
            $param = htmlspecialchars($param);
            $param = addslashes($param);
            array_push($temp_arr, $param);
        }
        $parameter = $temp_arr;
    }
    if (isset($_POST['selected']))
    {
        $selected = $_POST['selected'];
        $selected = htmlspecialchars($selected);
        $selected = addslashes($selected);
    }
    $files_array = [];
    if (!(empty($_FILES))){
        $targetDir = $_SERVER['DOCUMENT_ROOT']."upload/";

        extract($_POST);
        $error=array();
        $extension=array("jpeg","jpg","png","gif","txt");
        foreach($_FILES["upload"]["tmp_name"] as $key=>$tmp_name) {

            $file_name=$_FILES["upload"]["name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);

            if(in_array($ext,$extension)) {

                $filename = basename($file_name, $ext);
                $newFileName = $filename . time() . "." . $ext;
                move_uploaded_file($file_tmp = $_FILES["upload"]["tmp_name"][$key], $targetDir . $newFileName);
                $targetFilePath["$key"] = $targetDir . $newFileName;

                //shell_exec('clamscan -r --bell -i ' .$targetDir . $newFileName);
                $path =  $targetDir . $newFileName;
                array_push($files_array, $path);
            }
            else {
                array_push($error,"$file_name, ");
            }
    }

    }
    $process = $_POST['plugin'];
    $process = htmlspecialchars($process);
    $process = addslashes($process);
    //echo "This var is set so I will print.";
    require_once('plugin_launcher.php');
    $inst = new plugin_launcher();
    $inst -> run_plugin($process, $parameter, $files_array, $selected);
}
else {
    header('/');
}
?>
</div>



</body>
</html>
