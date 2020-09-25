<!doctype html>
<html>
<head>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	 <script>
	$(document).ready(function(){
	  $(".button").hover(function() {
                
                $(this).css("background-color","aquamarine");
                
            }, function() {
                
                $(this).css("background-color","white");
                
            });
	   $(".button1").hover(function() {
                
                $(this).css("background-color","grey");
                
            }, function() {
                
                $(this).css("background-color","white");
                
            });
        $("#p2").click(function(){
    $("form").css({"background-color": "yellow", "font-size": "150%"});
	  });
        $("#p3").click(function(){
    $("form").css({"background-color": "white", "font-size": "100%"});
	  });
	});
        </script>
	 <style type="text/css">
	  #form{
	      border:10px blue ridge;
		  border-width:10px 10px 10px 10px;
		  border-radius:20px;
          margin:30px 500px;
          box-shadow: 2px 5px 5px;	  
	  }
	  #buttonContainer {
                
                width:233px;
                margin: 0 auto;    
            }
      .button {
                
                float:left;
                padding: 6px;
                font-size: 90%; 			
            } 		
      </style>
     <title>UPLOAD DATA</title>
</head>
<body>
	<center>
		<form method="POST" id="form">	
		<table>
			<tr>
				<th colspan=2  id="buttonContainer">
					<div><h2>UPLOAD FILE</h2></div>
				</th>
			</tr>
			<tr>
				<th><label for="file" class="button">Upload a text file:</label></th>
				<th><input type="file" name="upld" id="upld" class="button1"></th>
			</tr>
			<tr>
				<th colspan=4><input type="submit" name="sub" id="sub" value="UPLOAD" class="submit" ></th>
			</tr>
		</table>
		<br><input type="reset" name="res" id="res">
	</form>
		<b><p align="center">To change color and text size of form:<b><b class="p2" id="p2"><u>click here</u></b></p>
		<b><p align="center">To change color and text size to default:<b><b class="p3" id="p3"><u>click here</u></b></p>
		<?php
				if(isset($_POST['upld']))
				{
					ob_end_clean();               //clear the page
					echo "<form style='background-color:aquamarine;border:10px yellow solid;margin:100px 100px;' action='page1.php' method='POST'><center><br><br><br><br><br>";
					$file=$_POST["upld"];
					//echo readfile($file);
					$opfile=fopen($file,"r") or die("Error while opening the file!");       //fopen stores file to the buffer
					//echo fread($opfile,filesize($file));                                   //fread reads the entire line
					echo filesize($file);					
					//although we select a file from anywhere,the file will be opened from htdocs
					
					echo "<h1><b>File Content</b></h1>";
					while(!feof($opfile)) {                            //feof to check the end of the file
					//ini_set("auto_detect_line_endings", true);
 						 echo fgets($opfile)."<br>";                 //fgets read the file line by line from the first line
					}                                                 //after reading the first line fgets will have a pointer pointing to the next line.
					fclose($opfile);                                   //clear the buffer
													//fgetc reads character by character
																		
					echo "<input type='hidden' name='path' value='".$file."'>";
					echo "<br><br><h2 style='color:blue;font-family: verdana;'><i><label for='op'>SELECT OPERATION TO BE PERFORMED</label></i></h2>";
				    echo "<div name='op' id='op'>";
				    echo"<button style='background-color: #4CAF50;color: white;padding: 15px 32px;text-align: center; display: inline-block;
                           font-size: 16px;'type='submit' name='a' value='op1'>Delete File</button>";
				    echo"<button style='background-color: #4CAF50;color: white;padding: 15px 32px;text-align: center; display: inline-block;
                           font-size: 16px;' type='submit' name='b' value='op2'>Append Text</button>";
				    echo"<button style='background-color: #4CAF50;color: white;padding: 15px 32px;text-align: center; display: inline-block;
                           font-size: 16px;' type='submit' name='c' value='op3'>Search Text</button>";
					echo"<button style='background-color: #4CAF50;color: white;padding: 15px 32px;text-align: center; display: inline-block;
                           font-size: 16px;' type='submit' name='d' value='op4'>Replace Text</button>";
				    echo "</div>";
 					//fwrite($opfile,"hey there...");
					
					
				}
				echo "</center></form>";
			?>
			<?php
				if(isset($_POST['a'])){
					ob_end_clean();
					$file = $_POST['path'];
					if($_POST['a']){
						echo "Your file is being deleted!";
						$var = unlink($file);
						if($var == 1 )
							echo "Your file is deleted Successfully...<br>";
						else
							echo "Error deleting your file!<br>";
					}
				}
					if(isset($_POST['b'])){
					ob_end_clean();
					$file = $_POST['path'];
				    if($_POST['b']){
						echo "<form action='page1.php' method='POST'>";
							echo "<br><br><label for='appen'>Append:</label>";
							echo "<input type='text' name='appen' id='appen' placeholder='Enter String To Append '>";
							echo "<br><label for='pos'>Position:</label>";
							echo "<input type='text' name='pos' id='pos' placeholder='Append String at this position' title='character position'>";
							echo "<input type='hidden' name='path1' value='".$file."'>";
							echo "<input type='submit' name='b_1'>";
						echo "</form>";
					}
				}	
				if(isset($_POST['c'])){
					ob_end_clean();
					$file = $_POST['path'];			
			        if($_POST['c']){
						echo '<form action="page1.php" method="POST"><br><br><label for="srch">Search String:</label><br>
						<input type="text" name="srch" id="srch"><br><input type="hidden" name="path1" value="'.$file.'"><input type="submit" name="c_1"></form>';
					}
				}
				if(isset($_POST['d'])){
					ob_end_clean();
					$file = $_POST['path'];				
				    if($_POST['d']){
						echo '<form action="page1.php" method="POST"><br><br><label for="str1">Replace String:</label>
						<input type="text" name="str1" id="str1">
						<label for="str2">with the String:</label><input type="text" name="str2" id="str2"><input type="hidden" name="path1" value="'.$file.'"><input type="submit" name="d_1" style="margin-left:5px;"></form>';
					}
					}
			?>
			<?php
			if(isset($_POST['b_1'])){
				if(filesize($_POST['path1'])<$_POST['pos']){
					echo "Invalid Position for Insertion!<br>";
				}
				else{
				$opfile = fopen($_POST['path1'],'r+');
				$arr=new SplDoublyLinkedList();
				
				while(!feof($opfile)){        //storing file char to the linked list
				$arr->push(fgetc($opfile));
				}
				
				ob_end_clean();
				fclose($opfile);
				$opfile = fopen($_POST['path1'],'w');   //to clear text and start writing
					fwrite($opfile,$arr[0]);         
				fclose($opfile);
				
				$opfile = fopen($_POST['path1'],'a+');  //now to append
				$str=$_POST['appen'];
				$len=strlen($str);
				for($i=1 ; $i < $_POST['pos'] ; $i++ ){
					fwrite($opfile,$arr[$i]);
				}
				
				$i=0;
				while($i < $len )                      //appending insertion string
					fwrite($opfile,$str[$i++]);

				$i=$_POST['pos'];
				while($i<filesize($_POST['path1']))   //rest of the text
					fwrite($opfile,$arr[$i++]);
					
				fclose($opfile);
				echo "String appended Successfully...<br>";
				}
			}
			
			if(isset($_POST['c_1'])){
			    ob_end_clean();
				$tmp=0;
				$se=$_POST['srch'];
				$count=0;    //number of occurences
				$ptr=0;      //position number
				$pos=array_fill(0,10,0);  //starting_index,array_length,value
				$len=strlen($_POST['srch']);
				//echo $se[1];
				//$pos[9]=5;
				//echo $pos[9];
				$opfile=fopen($_POST['path1'],"c+");
				
				while(!feof($opfile)){
						$tmp=fgetc($opfile);
						if($tmp==$se[0]){
							$pos[$count]=$ptr;
							$tmp=1;
							while($tmp<=$len-1){
								$ptr++;
								if($se[$tmp]==fgetc($opfile)){
									$tmp++;
                                    continue;
								}
								else
									break;
							}
							if($tmp==$len)
								$count++;
						}
						$ptr++;
				}
                if($count>0){
			    echo "Your string was found in the file at this position(s): <br>";
				for($tmp=0;$tmp<$count;$tmp++){
					echo $pos[$tmp]."<br>";
				}
				}
				else
					echo "Your string was not found in the file!<br>";
			}
			
			if(isset($_POST['d_1'])){
				ob_end_clean();
				$opfile=fopen($_POST['path1'],'c+');
				$str1=$_POST['str1'];
				$l1=strlen($str1);
				$ptr=0;
				$loc=-1;
				while(!feof($opfile)){
						$tmp=fgetc($opfile);
						if($tmp==$str1[0]){
							$loc=$ptr;
							$tmp=1;
							while($tmp<=$l1-1){
								$ptr++;
								if($str1[$tmp]==fgetc($opfile)){
									$tmp++;
                                    continue;
								}
								else
									break;
							}
							if($tmp==$l1)
								break;
							else
								$loc=-1;
						}
						$ptr++;
				}
				if($loc==-1)
					echo "Your String was not found in the file!<br>";
					
				else{
					$str2=$_POST['str2'];
					$l2=strlen($str2);
					
					if($l1==$l2){
					fseek($opfile,$loc,SEEK_SET);
				    fwrite($opfile,$str2);
					}
					elseif($l1>$l2){
						fseek($opfile,$loc,SEEK_SET);
				        fwrite($opfile,$str2);
						$arr=array_fill(0,$l1-$l2,' ');
						$str=implode($arr);    //array to string conversion
						fwrite($opfile,$str);
					}
					else{
						$str3=array_fill(0,$l1,0);
						$i=0;
						while($i<$l1){
							$str3[$i]=$str2[$i];
							$i++;
						}
						$str3=implode($str3);
						fseek($opfile,$loc,SEEK_SET);
				        fwrite($opfile,$str3);
						
						$ofile = fopen($_POST['path1'],'r+');
						$arr=new SplDoublyLinkedList();
				
				        while(!feof($ofile))
				            $arr->push(fgetc($ofile));
				        fclose($ofile);
						//echo $arr->count();
				        $ofile = fopen($_POST['path1'],'w');   //to clear text and start writing
					    fwrite($ofile,$arr[0]);         
				        fclose($ofile);
				
				        $ofile = fopen($_POST['path1'],'a+');  //now to append
				        $str=array_fill(0,$l2-$l1,0);
						$i=0;
						while($i<$l2-$l1){
							$str[$i]=$str2[$l1+$i];
							++$i;
						}
	
				        for($i=1 ; $i < $loc+$l1 ; $i++ ){
					        fwrite($ofile,$arr[$i]);
				        }
				
				        $i=0;
				        while($i < $l2-$l1 )                      //appending insertion string
					        fwrite($ofile,$str[$i++]);

				        $i=$loc+$l1;
				            while($i<$arr->count())   //rest of the text
					            fwrite($ofile,$arr[$i++]);
					
				        fclose($ofile);
						
					}
					
					echo "Replaced Successfully...<br>";
				
				fclose($opfile);
				}
			}
			?>
		</center>
</body>
</html>