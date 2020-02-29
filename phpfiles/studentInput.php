<!DOCTYPE html>
<html>

<head> 
    <style> .red-text{ color : red;
                       display: inline;} 
    </style>
    <title>Log-In-Student</title>
    <link rel="stylesheet" type="text/css" href="frontPageStyleSheet.css" />

</head>

<body>

<div class="banner"> </div>

      <form action="studentInput.php" method= "POST">

        <div class="contents" >

            <p style="display:inline">Enter your 870 number: </p>
            <input type="text" name = "StnNum" required>
            <input type="submit" value="submit"> 
            <br/>

            <div style="color:red"> <?php include 'validateStudent.php'; 
                        echo "$error[number]". "$error[empty]";?>
            </div>
            
        </div>
    </form>
</body>
</html>
