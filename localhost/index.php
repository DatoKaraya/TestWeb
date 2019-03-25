<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>TestWeb</title>
        <link rel="stylesheet" href="css/style.css" >
        <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan" rel="stylesheet">
         <script type="text/javascript" src="/js/form.js"></script>
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/upload.js"></script>
    </head>

    <body>
    <script>

    </script>
       <header>
            <a href="index.php"><img  src="img/logo.JPG" alt="logo"></a>
       </header>

       <div class="wrapper">

           <div class="table">

               <div class="row header">
                   <div class="cell">
                       Number
                   </div>
                   <div class="cell">
                       Name
                   </div>
                   <div class="cell">
                       Extension
                   </div>
               </div>
            <?php
            $number = 0;
            if ($handle = opendir('upload')) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
                        ?>
                        <div class="row">
                            <div class="cell" data-title="Number">
                                <?php echo $number++;  ?>
                            </div>
                            <div class="cell" data-title="Name">
                                <?php echo pathinfo($file)['filename']; ?>
                            </div>
                            <div class="cell" data-title="Extension">
                                <?php echo pathinfo($file)['extension'];  ?>
                            </div>
                        </div>
               <?php
                    }
                }
                closedir($handle);
            }
            ?>

           </div>
       </div>
            <div class="box" >
            <form  method="post"  >
                <select name=day[] >
                    <?php
                    if ($handle = opendir('upload')) {

                        while (false !== ($file = readdir($handle))) {

                            if ($file != "." && $file != "..") {

                                print "<option value='$file'>$file</option>";

                            }
                        }
                        closedir($handle);
                    }?>
                </select>

                <button  formaction="download.php" class="btn">Download</button>
                <button formaction="delete.php" class="btn" >Delete</button>
            </form>
            </div>
    <div class="box">
    <form id="upload_form" enctype="multipart/form-data" method="post" class="upload-btn-wrapper">
        <button class="a"> Choose file
        <input type="file" class="input" name="file1" id="file1"><br>
        </button>
        <input type="button"  class="btn" value="Upload File" onclick="uploadFile()">
        <progress id="progressBar" value="0" max="100" style="width:250px;"></progress>
        <h3 id="status"></h3>
        <p id="loaded_n_total"></p>
    </form>
    </div>
    </body>
</html>
