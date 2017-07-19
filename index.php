<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to my Programming Portfolio</title>
		
		<style>
			#thetime {
				font-family: Arial;
				font-weight: Bold;
				color: blue;
			}
			
			#sleepWarning {
				font-family: Arial;
				font-weight: Bold;
				color: red;
				background: yellow;
			}
		</style>
	</head>
	<body>
		<?php
		// Get local time
			$local_time = new DateTime("now", new DateTimeZone('America/Los_Angeles'));
			$time = $local_time->format("h:i A");
			$hour = (int) Date("h"); // Cast hour to integer
			
			// A class that prints greetings
			class MessagesForYou 
			{
				var $greeting = "I'm so happy you're here!";
				
				function __construct()
				{
				}
				
				function __destruct()
				{
				}
				
				public function printGreeting()
				{
					echo "<p>$this->greeting</p>";
				}
			}
			
			// Is it 12 in the morning?
			if ($hour === 12 && Date("A") === "AM")
				$isMidnight = true;
			else
				$isMidnight = false;
			
			if ($isMidnight) // Yes it is
			{
				echo "<h1 id='sleepWarning'>I should be sleeping!</h1>";
			}
			else
			{
				echo "<h1 id='thetime'>Hello! It is $time local time</h1>";
			}
			
			$sentences = array("A is for ASM", "B is for BASIC", "C is kind of like PHP");
				
			$arrayIndex = rand(0, sizeof($sentences) - 1);
			
			try 
			{
				echo "<h2>$sentences[$arrayIndex]</h2>"; // Print 
			} 
			catch (Exception $e)
			{
			}
			
			$greeting = new MessagesForYou();
			$greeting->printGreeting();
		?>
	
           <form action = "" method = "POST" enctype = "multipart/form-data">
		   <a href="form.htm">Custom Form Demo</a><br>
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
			<?php if (!isset($_FILES['image'])) 
				exit();
				?>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
         </ul>
      </form>	
		<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];

      $file_ext=explode('.',$_FILES['image']['name']);
	  $file_ext=end($file_ext);
	  $file_ext=strtolower($file_ext);
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be less than 2 MB';
      }
      
      if(empty($errors)) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success! ";
      }else{
         print_r($errors);
		 exit();
      }
	  
	  echo "This is the picture that was uploaded:<br>";
	  $image = $_FILES['image']['name'];
	  echo "<img src='images/$image' />";
   }
?>
	</body>
</html>