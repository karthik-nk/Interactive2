<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>simulated input</title>
</head>
<body>
  <?php
    require_once('./validation.php');
    require_once('./updateDB.php');
    if(isset($_POST['submit'])){          
        $inputArray= array();    
        $id = ($_POST['id']);
        $coinsWon = $_POST['coins_won'];
        $coinsBet = $_POST['coins_bet'];
        $hash = $_POST['hash'];
        // add to array
        $inputArray[] = $id; 
        $inputArray[] = $coinsWon; 
        $inputArray[] = $coinsBet;
        $inputArray[]= $hash; 
            
        if (validateInputs($inputArray)){
            $credits=abs($coinsWon-$coinsBet);
            updateDB($id,$credits); 
            $output=getJSONResult($id);
            if($output){
                echo $output;
            }
            else{
                echo 'cant find a matching player for the ID entered';
            }                                  
        }
    }

    ?>
</body>
</html>