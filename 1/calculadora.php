<?php 

    function factorialWhile($x){
                           
        if ($x==0){
            return 1;
        } elseif ($x>0) {
                                
            $result = 1;

            while ($x > 0){
                $result = $result * $x;
                $x = $x - 1;
            }
                                        
            return $result;

        } else{
            return 'El valor de x ha de ser >=0.';
        }
    }

                                
                        
?>