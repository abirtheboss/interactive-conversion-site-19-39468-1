<!DOCTYPE html>
<html>
<head>
<title>Conversion</title>
<script src="home.js"></script>
</head>
<body>
<?php 
define("filepath", "rate.txt"); 
$convoErr  = $valueErr = "";    
$convo  = $value = "";
$flag = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (empty($_POST["convo"])) 
    {  
       $convoErr = " This field can't be empty";
       $flag = True;  
    } 

if (empty($_POST["value"])) 
    {  
       $valueErr = "This field can't be empty";
       $flag = True;  
    } 
if(!$flag) 
    {
   
    $convo = input_data($_POST["convo"]);
    if(is_numeric($_POST["value"]))
    {
        $value = input_data($_POST["value"]);
    }
    else
    {
          $valueErr = "The Value must be in numeric form";
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
$file = fopen(filepath, "a");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}
?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name ="home" onsubmit="return isValid();">
    <fieldset>
    <span style="color: red"><p>Page 1 [Home]</p></span>
    <span style="color: red"><p>Conversion site</p></span>
    <span style="color: blue">1.</span><a href="Home.php">Home</a>
    <span style="color: blue">2.</span><a href="Rate.php">Conv Rate</a>
    <span style="color: blue">3.</span><a href="History.php">History</a><br><br>
    <label for="convo"><span style="color: red">Converter:</span></label><br>
    <select name="convo" id="convo">
<?php
$convoE = $multiE = $valueE = "";
$fileData = read();

$types=json_decode($fileData);
    foreach($types as $type)
    {
    echo "<option value='$type->rate'>$type->rate</option>";
    }
?>
    </select>
    <span id="convoErr" ></span>
    <br><br><br>
    <label for="value">Value:</label>
    <input type="text" id="value" name="value" >
    <span id="valueErr" ></span>
    <span style="color: red"><?php echo $valueErr; ?> </span>

   <input type="submit" value="Submit"><br><br><br>
   <?php 
   $Multi = "";
   $fileData = read();
    $rates=json_decode($fileData);
    foreach($rates as $rate)
    {
    if($rate->rate === $convo)
    {
       $Multi = $value * $rate->result;
    }
    }

   echo "Result:<input type='text' value='$Multi'/>"; 
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
  
  </fieldset>

</form>


</body>
</html

