 <?php
 
 function projectcode($code) {
        $pattern = "/^[a-zA-Z0-9-]*$/";
        if(!preg_match($pattern, $code)){
            return true;
        }
    }

    projectcode("thinu");