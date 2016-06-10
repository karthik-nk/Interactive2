<?php 
require_once('./mysqlconnector.php');
DEFINE ('first_name','first_name');
DEFINE ('last_name','last_name');
DEFINE ('credits','credits');
DEFINE ('lifetime_spins','lifetime_spins');

function updateDB($id, $credits) {   
    $totalSpins = calculateTotalBet($id);
    $query =  "UPDATE player SET credits=".$credits.",lifetime_spins=".$totalSpins." WHERE player_id=".$id;    
    $dbc = OpenDBConnection();
        if($dbc){
            @mysqli_query($dbc, $query);
            closeDBConnection($dbc);            
        }    
    }  

function calculateTotalBet($id){
    $query = "SELECT lifetime_spins FROM player WHERE player_id=".$id;                    
    $dbc = OpenDBConnection();
    if($dbc){
        $response = @mysqli_query($dbc, $query);
        closeDBConnection($dbc);
        if($response){
            $data = mysqli_fetch_assoc($response);           
            return ($data[lifetime_spins]+1);
        }
    }
}

function getJSONResult($id){
    $query = "SELECT first_name,last_name, credits,lifetime_spins FROM player WHERE player_id=".$id;
    $dbc = OpenDBConnection();
    if($dbc){
        $response = @mysqli_query($dbc, $query);
        closeDBConnection($dbc);
        if($response){
            $data = mysqli_fetch_assoc($response);  
            if($data){
                $post_data = array(
                'ID'=>$id,
                'FirstName'=>$data[first_name],
                'LastName'=>$data[last_name],
                'Credits'=> $data[credits],
                'TotalSpins'=>$data[lifetime_spins]  
            );
            $post_data = json_encode(array('item' => $post_data));
            return $post_data;   
            }
        }             
    }    
}
?>