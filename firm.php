<?php

   $name = $email = $gender = $website = $comment = "";
   $nameErr = $emailErr = $genderErr = $websiteErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // $name = test_input($_POST[$name]);
        // $email = test_input($_POST[$email]);
        // $gender = test_input($_POST[$gender]);
        // $website = test_input($_POST[$website]);
        // $comment = test_input($_POST[$comment]);


    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(empty($_POST['name'])){
        $nameErr = "Name is required";
    }else{
        $name = test_input($_POST['name']);
        if(!preg_match("/^[a-zA-Z\s]*$/", $name)){
            $nameErr = "Only letters and white space is allowed";
        }
    }


    if(empty($_POST['email'])){
        $emailErr = "Email is required";
    }else{
        $email = test_input($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid Email";
        }
    }


    if(empty($_POST['gender'])){
        $genderErr = "Gender is required";
    }else{
        $gender = test_input($_POST['gender']);
    }


    if(empty($_POST['website'])){
        $websiteErr = "URL is required";
    }else{
        $website = test_input($_POST['website']);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)){
            $websiteErr = "Invalid URL"; 
          }
    }


    if(empty($_POST['comment'])){
        $comment = "";
    }else{
        $comment = test_input($_POST['comment']);
    }


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing PHP</title>
    <link rel="stylesheet" href="firm.css">
</head>
<body>
    <div class="me">
        <div class="form">
            <h2>SIGN UP</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                <div class="div">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="input" value = "<?php echo $name;  ?>">
                    <div class="error"> <?php echo $nameErr; ?></div>
                </div>
                <div class="div">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="input"  value = "<?php echo $email;  ?>">
                    <div class="error"> <?php echo $emailErr; ?></div>
                </div> 
                <div class="div">
                    <label for="gender">Gender:</label>
                    <input type="radio" name="gender" id="inputo"
                    <?php if(isset($gender) && $gender== "male") echo "checked"; ?>
                    value="male">Male
                    <input type="radio" name="gender" id="inputo" 
                    <?php if (isset($gender) && $gender == "female") echo "checked"; ?>
                    value="female">Female
                    <input type="radio" name="gender" id="inputo"
                    <?php  if (isset($gender) && $gender == "other") echo "checked"; ?>
                    value="other">Other
                    <div class="error"><?php echo $genderErr; ?></div>
                </div>
                <div class="div">
                    <label for="website">Website:</label>
                    <input type="text" name="website" id="inpu" value="<?php   echo $website; ?>">
                    <div class="error"><?php echo $websiteErr; ?></div>
                </div>
               
                <div class="div">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" cols="30" rows="6" id="inputi"><?php  echo $comment; ?></textarea>
                </div>
                <button type="text" name="submit" id="signup">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>