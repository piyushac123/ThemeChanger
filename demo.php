<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <TITLE>CHANGE THEME</TITLE>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="demo.css">
        <script src="demo.js"></script>
    </HEAD>
    <BODY>
        <center>
        <p id="dd">Hello World!</p>
        <h1>Hello Piyush</h1>
        <form method="post" action="demo.php">
            <!--<b>Color : </b><input type="text" name="text1" placeholder="Enter color/RGB code">
            <input type="submit" name="abc" value="Submit">
            <button type=""></button>-->
            <button type="submit" class="btn btn-primary" name="btn1">Bright Accent Colors</button>
            <button type="submit" class="btn btn-success" name="btn2">Natural and Earthy</button>
            <button type="submit" class="btn btn-info" name="btn3">Contemporary and Bold</button>
            <button type="submit" class="btn btn-warning" name="btn4">Elegant Yet Approachable</button>
        </form>
        </center>
        <?php
            
            //$color=$_POST["text1"];
            $myfile1 = fopen("demo.css", "r") or die("Unable to open file!");
            //-------To get data of demo.css
            $file_content=fread($myfile1,filesize("demo.css"));
            //-------For getting current color in css file
            $colorPos=strpos($file_content,"color:");
            $colorPos+=6;
            $semiColonPos1=strpos($file_content,";",$colorPos);
            $colorDef=substr($file_content,$colorPos,$semiColonPos1-$colorPos);
        
            //echo $colorPos." ".$semiColonPos1." ".$colorDef;
            
            //--------For getting current background color in css file
            $backPos=strpos($file_content,"background-color:");
            $backPos+=17;
            $semiColonPos2=strpos($file_content,";",$backPos);
            $backDef=substr($file_content,$backPos,$semiColonPos2-$backPos);
        
            //echo $backPos." ".$semiColonPos2." ".$backDef;
            
            fclose($myfile1);
	    //-------get input color
            $color=$colorDef;$Bcolor=$backDef;
            if(isset($_POST['btn1'])){
                $color="#66FCF1";
                $Bcolor="#3500D3";
            }
            else if(isset($_POST['btn2'])){
                $color="white";
                $Bcolor="#659DBD";
            }
            else if(isset($_POST['btn3'])){
                $color="#950740";
                $Bcolor="#1A1A1D";
            }
            else if(isset($_POST['btn4'])){
                $color="#AC3B61";
                $Bcolor="#EDC7B7";
            }
            $myfile = fopen("demo.css", "w+") or die("Unable to open file!");
            
            /*echo $file_content;
            echo "<br>".strpos($file_content,"color:".$colorDef.";")."<br>";*/
        
            //----------If $colorDef is present and $color is not present then execute it.
            if((strpos($file_content,"color:".$colorDef.";")>=0)&&(strpos($file_content,"color:".$color.";")===false)){
                $file_content=str_replace("color:".$colorDef.";","color:".$color.";",$file_content);
                //$file_content="#dd{color:red;}"."\n".$file_content;
                //echo $file_content;
            }
            if((strpos($file_content,"color:".$backDef.";")>=0)&&(strpos($file_content,"color:".$Bcolor.";")===false)){
                $file_content=str_replace("background-color:".$backDef.";","background-color:".$Bcolor.";",$file_content);
                //$file_content="#dd{color:red;}"."\n".$file_content;
                //echo $file_content;
            }
            /*echo strpos($file_content,"#dd{color:red;}");
            echo "<br>".strpos($file_content,";",16)."<br>";
            echo "<br>".strpos($file_content,"background")."<br>";*/
            
            fwrite($myfile,$file_content);
            //echo $file_content;
            fclose($myfile);
            /*$line = fgets($myfile);
            while(!feof($myfile)){
                $line.= "<br/>";
                $line .= fgets($myfile);
            }*/
            /*if(strpos($file_content,"#dd{color:blue;}")>=0){
                    //echo "xyz"; 
                    $file_content=str_replace("#dd{color:blue;}","",$file_content);
                    //echo $file_content;
                }*/
            //$var1=strpos($file_content,"color: blue;");
        ?>
    </BODY>
</HTML>
<!--ecd3CDE3-->
