<?php

namespace App\Utils;
use Uspdev\Replicado\DB as DBreplicado;

class ReplicadoUtils {

    public static function unidades(){
      
      $query = "SELECT DISTINCT codund FROM UNIDADE ORDER BY codund";
      $result = DBreplicado::fetch($query);
      return $result;
    }
    
}