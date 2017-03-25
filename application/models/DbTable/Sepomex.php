<?php


class Application_Model_DbTable_Sepomex extends Zend_Db_Table_Abstract {

    //nombre de la tabla de la db a la que hace referencia
    protected $_name = 'catsepomex';
	

	
	 public function sepomex($cp)
    {
		
        $db = Zend_Registry::get('db');
		
		$stmt = $db->query("CALL sepomex('$cp')");

         return $stmt->fetchAll();
		
    }
	
	
	

   
    
}

