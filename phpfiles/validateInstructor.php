<?php //Checks if user input is valid
    //include "sessionstart.php";
    session_start();
    $error = array('number' =>'', 'empty' => '');// stores any input errors
    $number = '';

    if(isset($_POST['InsNum'])){ // checks if input is null
        $number = $_POST['InsNum'];
        
        if(!preg_match("/\d{1}$/", $number)){ //checks if number matches this regex
            $error['number'] = "You have entered an invalid input(enter a digit from[0-9]).";   
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
                $select = "SELECT Ins_ID FROM instructor WHERE Ins_ID = ?";
       
                $stmt = $conn -> prepare($select);
                $stmt -> bind_param("s", $number);
                $stmt -> execute();
                $result = $stmt->get_result(); // get the mysqli result
                $user = $result->fetch_assoc(); // fetch data 
                
                if(empty($user)){
                    $error['empty'] = "Could not find record associated with this number. Try again(enter a digit from[0-9]).";
                }

                else{
                $_SESSION['id'] = $user['Ins_ID'];
                $stmt -> close();
                $conn -> close();
                }
            }

            if(array_filter($error)){ //checks if there are any errors

            }

            else{// if no errors then redirect to page index
                $error['empty'] = "sucess";
                //header('Location: instructorWP/instructorWP.php');
            }

            
        }// end of else
        
    }// end of POST check

?> 
