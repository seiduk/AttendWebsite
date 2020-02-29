<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8" /> 
    <title>Log-In-Instructor</title>
    <link rel="stylesheet" type="text/css" href="frontPageStyleSheet.css" />

</head>

<body>
    
    <div class="banner"> </div>

      <form action="instructorInput.php" method= "POST">

        <div class="contents" >

            <p style="display:inline">Enter your ID number: </p>
            <input type="text" name = "InsNum" required>
            <input type="submit" value="submit"> 
            <br/>

            <div style="color:red"> <?php include 'validateInstructor.php'; 
                        echo "$error[number]". "$error[empty]";?>
            </div>
            
        </div>
    </form>
  </body>
</html>