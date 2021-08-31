<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Conversion</title>
<script src="rate.js"></script>
</head>
<body>
<?php 
$rateErr = $valueErr = $resErr = "";
$rateEr = $valueEr = $resEr = "";
$rate = $value = $res = "";
$successfulMessage = $errorMessage = "";
$flag = false;
define("filepath", "rate.txt");
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{ 

if (empty($_POST["rate"])) 
    {  
       $rateErr = "This field can't be empty";
       $flag = True;  
    } 

if (empty($_POST["value"])) 
    {  
       $valueErr = "This field can't be empty";
       $flag = True;  
    } 
if (empty($_POST["res"])) 
    {  
       $resErr = "This field can't be empty";
       $flag = True;  
    } 
 
if(!$flag) 
    {
   
    $rate = input_data($_POST["rate"]);
    if(is_numeric($_POST["value"]))
    {
    	$value = input_data($_POST["value"]);
    }
    else
    {
          $valueErr = "The value must be in numeric form";
    }
    if(is_numeric($_POST["res"]))
    {
    	$res = input_data($_POST["res"]);
    	
    }
    else
    {
          $resErr = "The value must be in numeric form";
    }
    $fileData = read();
    if(empty($fileData)) 
    {
    $data[] = array("rate" => $rate,"value" => $value, "result" => $res);
    }
    else {
    $data = json_decode($fileData);
    array_push($data, array("rate" => $rate,"value" => $value, "result" => $res));
    }

        $data_encode = json_encode($data);
        write("");
        $res = write($data_encode);
        if($res) {
        $successfulMessage = "Successfully added";
        }
        else {
        $errorMessage = "Error while adding";
        }
  
      }  
  }
  function input_data($data) 
  {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
  }
 function write($content) {
$file = fopen(filepath, "w");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name ="rate" onsubmit="return isValid();">
<fieldset>
<span style="color: red"><p>Page 2 [Conversion Rate]</p></span>
<span style="color: red"><p>Conversion site</p></span>
<span style="color: blue">1.</span><a href="Home.php">Home</a>
<span style="color: blue">2.</span><a href="Rate.php">Conv Rate</a>
<span style="color: blue">3.</span><a href="History.php">History</a><br><br>
<span style="color: red"><p>Conversion Rate:</p></span><br><br>
<input type="text" id="rate" name="rate" >
<span id="rateErr" ></span>
<span style="color: red"><?php echo $rateErr; ?> </span>
<input type="text" id="value" name="value" >
<span id="valueErr" ></span>
<span style="color: red"><?php echo $valueErr; ?> </span>
<input type="text" id="res" name="res" >
<span id="resErr" ></span>
<span style="color: red"><?php echo $resErr; ?> </span>
<input type="submit" name="submit" value="submit">
</fieldset>
</form>
<br>
<br>
<span style="color: green"><?php echo "<b>".$successfulMessage."</b>"; ?></span>
<span style="color: red"><?php echo "<b>".$errorMessage."</b>"; ?></span>
<?php
function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>
</body>
</html>