<?php
$data = json_decode(file_get_contents('./dist/data.json'), true);

foreach ($data as $user) { 

    $folder = "dist/{$user['url']}/";

    if(!file_exists($folder)) {

        mkdir($folder);
    }
    
    $fileName = "{$folder}index.php";

    if(file_exists($fileName)){
        unlink($fileName);
    }    

    $myFile = fopen($fileName, "w") or die("Unable to open file!");

    $text = '
        <?php
            $page = [\'name\' => \''.$user['tag'].'\', \'subpage\' => \''. $user['url'] .'\'];
            $metaTitle = \'#'. $user['id'] .' - '. $user['name'] .'\';
            include(\'../index.php\');
        ?>
    
    ';

    fwrite($myFile, $text);

    fclose($myFile);
}

?>