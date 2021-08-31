<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Conversion</title>
<script src="search.js"></script>
</head>
<body>
<fieldset>
<span style="color: red"><p>Page 3 [History]</p></span>
<span style="color: red"><p>Conversion site</p></span>
<span style="color: blue">1.</span><a href="Home.php">Home</a>
<span style="color: blue">2.</span><a href="Rate.php">Conv Rate</a>
<span style="color: blue">3.</span><a href="History.php">History</a><br><br>
<span style="color: red"><p>Conversion History:</p></span><br><br>
<form action="search.php" method="GET" name ="mForm" onsubmit=" result(this); return false;">
   <label for="rate">Catagory :</label>
   <input type="text" id="rate" name="rate">
   <input type="submit" value="Submit">
</form>
<br>
<br>
<fieldset>
   <div id=hist></div>
    
</fieldset>
</fieldset>
</body>
</html>