<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>simulated input</title>
</head>
<body>
  <?php     
    require_once('./globals.php');

    function validateInputs($inputArray) {
        if(sanityCheck($inputArray)){
            if(hashValidation($inputArray)){
             return true;
            }
            else{
                return false;
            }
        }
        else{
         return false;
        }
    }         
    
    function sanityCheck($inputArray){
        //check for data type and size
        if($inputArray[inputType::id]<0 || $inputArray[inputType::coins_won]<0  || $inputArray[inputType::coins_bet]<0 ){
            return false;
        }
        else{
            return true;
        }
    }

    function hashValidation($inputArray){        
        $salt = getSaltValue($inputArray);        
        if($inputArray[inputType::hash]==calculateSHA($inputArray, $salt)){
            return true;
        }
        else
        {
            return false;
        }                                
    }

    function calculateSHA($inputArray,$salt){
        // logic can be implemented depending on the chosed algorithm like SHA
        // will return true assuming that SAH validation passes
        return true;
    
    }

    function getSaltValue(){
        // this function should make a request to client and get the salt value
        return 'dummy_VALUE';
    }

    ?>
</body>
</html>