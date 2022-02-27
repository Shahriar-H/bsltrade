<?php 


if(!isset($_SESSION['email'])){
    header("location: ./login.php");
}
    include('./config.php');
    $obj = new db();
    if(isset($_POST['savePost'])){
        $body = $obj->StringFillter($_POST['body']);
        $updat = date('Y-M-d');
        $postProjectSql = "UPDATE `terms` SET `body`='$body',`created_at`='$updat' WHERE id=1";
        $obj->UpdatePost($postProjectSql);
       
    }

?>
<div class="ProjectContainer">
    <div class="projectRow">
        <form action="index.php?page=terms" method="POST" enctype="multipart/form-data" >
            
            <div class="labelAndInputF">
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Text Editor</title>
                    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
                    <link rel="stylesheet" href="./assets/styleText.css">
                </head>
                <body onload="enableEditMode();">
                    <div class="textbox">
                        <div class="options">
                            <p onclick="execCmd('bold')"><b>B</b></p>
                            <p onclick="execCmd('italic')"><b>I</b></p>
                            <p onclick="execCmd('underline')"><b>U</b></p>
                            <p onclick="execCmd('justifyLeft')"><i class="fas fa-align-left"></i></p>
                            <p onclick="execCmd('justifyRight')"><i class="fas fa-align-right"></i></p>
                            <p onclick="execCmd('justifyCenter')"><i class="fas fa-align-center"></i></p>
                            <p onclick="execCmd('justifyFull')"><i class="fas fa-align-justify"></i></p>
                            <p onclick="execCmd('copy')"><i class="fas fa-copy"></i></p>
                            <p onclick="execCmd('cut')"><i class="fas fa-cut"></i></p>
                            <p onclick="execCmd('indent')"><i class="fas fa-indent"></i></p>
                            <p onclick="execCmd('outdent')"><i class="fas fa-outdent"></i></p>
                            <p onclick="execCmd('undo')"><i class="fas fa-undo"></i></p>
                            <p onclick="execCmd('redo')"><i class="fas fa-redo"></i></p>
                            <p onclick="execCmd('insertUnorderedList')"><i class="fas fa-list-ul"></i></p>
                            <p onclick="execCmd('insertOrderedList')"><i class="fas fa-list-ol"></i></p>
                            <select onclick="execCommandArg('formatBlock',this.value)">
                                <option selected value="P">P</option>
                                <option value="H1">H1</option>
                                <option value="H2">H2</option>
                                <option value="H3">H3</option>
                                <option value="H4">H4</option>
                                <option value="H5">H5</option>
                                <option value="H6">H6</option>
                            </select>
                            <select onclick="execCommandArg('fontName',this.value)">
                                <option selected value="P">P</option>
                                <option value="Arial">Arial</option>
                                <option value="Verdana">Verdata</option>
                                <option value="Courier">Courier</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Tahoma">Tahoma</option>
                                <option value="Times New Roman">TNR</option>
                            </select>
                            <p onclick="execCmd('insertHorizontalRule')">hr</p>
                            <p onclick="execCommandArg('createLink', prompt('Enter Url-'))"><i class="fas fa-link"></i></p>
                            <p onclick="execCmd('unlink')"><i class="fas fa-unlink"></i></p>
                            <p onclick="execCommandArg('insertImage', prompt('Enter image Url-'))"><i class="fas fa-file-image"></i></p>


                            Color:<input style="width: 10%;" type="color" onchange="execCommandArg('foreColor',this.value)">
                            BG:<input style="width: 10%;" type="color" onchange="execCommandArg('hiliteColor', this.value)">
                        </div>
                        <?php 
                            
                            $selectTermSQL = "SELECT * FROM terms WHERE id=1";
                            $selectTerm = $obj->getAllProjectList($selectTermSQL);
                            $row = $selectTerm->fetch_array();
                            //echo $row['body'];
                        
                        ?>
                        <iframe class="textareabox" name='textareabox'>
                            
                        </iframe>
                        <a target="_blank" class="mark" href="http://facebook.com/shahariarhussainalshaki">Developed by Shaki</a>
                    </div>
                    <script>
                        var field = document.querySelector(".textareabox");
                        function enableEditMode(){
                            textareabox.document.designMode = "on";
                            $replaceBody = document.getElementById('replaceBody').value;
                            textareabox.document.getElementsByTagName('body')[0].innerHTML=$replaceBody;
                        }
                        
                        function execCmd(command){
                            textareabox.document.execCommand(command, false, null)
                        }

                        function execCommandArg(command,arg){
                            textareabox.document.execCommand(command,false,arg)
                        }

                        function getTextMeterial(){
                            //alert('fff');
                            var vl = textareabox.document.getElementsByTagName('body')[0].innerHTML;
                            document.getElementById('bodyCatcher').value=vl;
                            //console.log(vl);
                            document.getElementById('continueBTN').style.display='none';
                            
                        }

                        textareabox.oninput=()=>{
                            document.getElementById('continueBTN').style.display='block';
                        }


                    </script>
                </body>
                </html>
            </div>
            <textarea style="height: 5px;visibility:hidden" name="replaceBody" id="replaceBody" cols="30" rows="10">
                <?php echo $row['body'] ?>
            </textarea>
            <input id="bodyCatcher" type="hidden" name="body" value="">
            <div style="position: relative;">
                <p class="sbtnButon" id='continueBTN' onclick="getTextMeterial()" style="width: 20%;position: absolute;z-index:9">Continue</p>
                <input style="position: absolute;" class="sbtnButon" type="submit" name="savePost" value="Update">
            </div>
        </form>
    </div>
</div>