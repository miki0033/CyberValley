<?php
class Pwencode{
    
    private const SALTKEY="ABCDB123456789!0987654321=yekltas";

    public static function pwcrypt($_pwd){
        
        $crypt= hash('sha512', Pwencode::SALTKEY.$_pwd);
        return $crypt;
    }


}
/*
$pw="admin";
$crypt=Pwencode::pwcrypt($pw);
echo $crypt;
echo "<br>";
*/
//sono 128 caratteri esadecimali, viene utilizzato solo2^4 bit per codificare un carattere, infatti sha512 cripta la chiave in 512bit => 512/4 =128

