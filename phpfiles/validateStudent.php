
<?php //Checks if user input is valid
    session_start();
    $error = array('number' =>'', 'empty' => '');// stores any input errors
    $number = '';

    if(isset($_POST['StnNum'])){ // checks if input is null
        $number = $_POST['StnNum'];
        
        if(!preg_match("/870[0-9]{6}$/", $number)){ //checks if number matches this regex
            $error['number'] = "You have entered an invalid input";
              
        }

        else{ // connects to the server and checks if ID is in the server
            
            $host = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbName = "attenrecords";
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

            if(mysqli_connect_error()){ //checks if connection to server failed
                die('Connect Error('.mysqli_connect_errno().')'. mysqli_connect_errno());
            }

            else{
                $select = "SELECT Std_ID FROM student WHERE Std_ID = ?";
       
                $stmt = $conn -> prepare($select);
                $stmt -> bind_param("s", $number);
                $stmt -> execute();
                $result = $stmt->get_result(); // get the mysqli result
                $user = $result->fetch_assoc(); // fetch data 
                
                if(empty($user)){
                    $error['empty'] = "Could not find student record associated with this 870 number. 
                    Try again.";
                }

                else{
                $_SESSION['stid'] = $user['Std_ID'];
                $stmt -> close();
                $conn -> close();
                }
            }

            if(array_filter($error)){ //checks if there are any errors

            }

            else{// if no errors then redirect to page index
                header('Location: studentWP/studentWP.php');
            }

            
        }// end of else
        
    }// end of POST check

?> 

