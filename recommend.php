<?php  

  
function bubbleSort(&$arr,&$cost) 
{ 


    $n = sizeof($arr); 
  
    
    for($i = 0; $i < $n; $i++)  
    { 
        
        for ($j = 0; $j < $n - $i - 1; $j++)  
        { 
            
            if ($cost[$j] < $cost[$j+1]) 
            { 
                $t = $arr[$j]; 
                $arr[$j] = $arr[$j+1]; 
                $arr[$j+1] = $t; 

                $x=$cost[$j];
                $cost[$j]=$cost[$j+1];
                $cost[$j+1]=$x;


            } 
        } 
    } 
} 
  

?> 