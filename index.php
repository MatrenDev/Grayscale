<!DOCTYPE html>
<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['convert']))
    {
        generate();
    }

    function generate()
    {
        $dirname = "images/";
        $images = glob($dirname."*.png");

        foreach($images as $image) 
        {
            $imgcreate = imagecreatefrompng($image);
            if($imgcreate && imagefilter($imgcreate, IMG_FILTER_GRAYSCALE))
            {
                echo $image.' - action completed successfully.<br>';
                imagepng($imgcreate, $image.'_grayscale.png');
            }
            else
            {
                echo 'An error occurred while processing the image!';
            }
            imagedestroy($imgcreate);
        }
    }
?>

<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konwerter</title>
</head>
<body>
    <form action="index.php" method="POST">
    <p>Press the button to convert to grayscale. All files in the images folder will be converted automatically.</p>
    <input type="submit" name="convert" value="Conversion" />
</form>
</body>
</html>

