<?php

if(isset($_POST['submit']))
{
	$url = $_POST['url'];
	$check = substr($url,0,11);
	
	if($check == "http://www.")
	{
		$upper_case = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$lower_case = "abcdefghijklmnopqrstuvwxyz";
		$numbers = "0123456789";
		
		$upper_case_shuffle = str_shuffle($upper_case);
		$lower_case_shuffle = str_shuffle($lower_case);
		$numbers_shuffle = str_shuffle($numbers);
		
		$upper_case_new = substr($upper_case_shuffle,0,2);
		$lower_case_new = substr($lower_case_shuffle,0,2);
		$numbers_new = substr($numbers_shuffle,0,2);
		
		$mixed = "$upper_case_new$lower_case_new$numbers_new";
		$mixed_shuffle = str_shuffle($mixed);
		
		if(is_dir($mixed_shuffle))
		{
			$error = "Error please try again";
		}
		else
		{
			mkdir($mixed_shuffle);
			$file_path = dirname(__FILE__)."/$mixed_shuffle/index.php";
			$index = fopen($file_path,'w');
			$data = '<?php header("location:'. $url.'");?>';
			fwrite($index,$data);
			fclose($index);
			
			$new_url = "http://localhost/shurt/$mixed_shuffle";	
		}
	}
	else
	{
		$error = "You must start with ... 'http://www.'";	
	}
}

?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>


<div class="imgcontainer">
      <img src="https://scontent-mad1-1.xx.fbcdn.net/v/t1.0-9/25348663_376129322836574_6334662420357945085_n.jpg?oh=7fd6863aa6aae7ba4552593d6a9880b2&oe=5AF4B92E" alt="Avatar" class="avatar1">
    </div>
    <h2 class="ai">مرحبا بك أخي الكريم هذا المشروع مجاني للجميع  مفتوح المصدر  متاح للجميع  يمكنك اخي  الكريم  تغيير ما تريد  فيه  حسب ذوقك  عدى بيعه   </h2>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">إخــــــــــــــــــــــــــــــــــــــتصـــــــــــــــــــــــــار الــــــــــــــــــــــــــــكـــــــــــــــــــــــــــــــــــــــــــــــــــود</button>

<div id="id01" class="modal">
  <form class="modal-content animate" method="POST" action="http://localhost/shurt/">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="https://scontent-mad1-1.xx.fbcdn.net/v/t1.0-9/25348663_376129322836574_6334662420357945085_n.jpg?oh=7fd6863aa6aae7ba4552593d6a9880b2&oe=5AF4B92E" alt="Avatar" class="avatar">
    </div>
    <div class="container">
      <label><b>ضع رابط  موقعك هنا</b></label>
      <input type="text" placeholder="http://www." name="url" required>
      <button type="submit" name="submit" onclick="move()">إختصر الرابط</button>
      <div id="myProgress">
  <div id="myBar">10%</div>
</div>
    </div>
  </form>
</div>
    <script>
function move() {
  var elem = document.getElementById("myBar");   
  var width = 10;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      elem.innerHTML = width * 1  + '%';
    }
  }
}
</script>
<script>
var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
<?php

if(isset($error))
{
	echo $error;
}
if(isset($new_url))
{
	echo "<a href='$new_url'>$new_url</a>" ;
}

?>