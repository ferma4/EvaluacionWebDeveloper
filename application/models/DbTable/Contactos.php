<?php


class Application_Model_DbTable_Contactos extends Zend_Db_Table_Abstract {

    //nombre de la tabla de la db a la que hace referencia
    protected $_name = 'contactos';
	
    public function init() {
        $db = $this->getAdapter();

    }

    

    public function listar()
    {
	      //devuelve todos los registros de la tabla
        $db = Zend_Registry::get('db');
		
		$stmt = $db->query("CALL listar()");

        return $stmt->fetchAll();
		
    }
	
	
	 public function detalle($id)
    {
         $db = Zend_Registry::get('db');
		
		 $stmt = $db->query("CALL listarDetalle($id)");

        return $stmt->fetchAll();
	}
	
	public function updateContacto($nombre,$paterno,$materno,$email,$direccion,$colonia,$muncipio,$estado,$cp,$telCasa,$celular,$otroTel,$telOficina,$idContacto)
    {
         $db = Zend_Registry::get('db');
		
		$stmt = $db->query("CALL updateContacto('$nombre','$paterno','$materno','$email','$direccion','$colonia','$muncipio','$estado','$cp','$telCasa','$celular','$otroTel','$telOficina',$idContacto)");

		if ($stmt)
		{
		return true;
		}
	}
	
	public function addContacto($nombre,$paterno,$materno,$email,$direccion,$colonia,$muncipio,$estado,$cp,$telCasa,$celular,$otroTel,$telOficina)
    {
         $db = Zend_Registry::get('db');
		
		$stmt = $db->query("CALL addContacto('$nombre','$paterno','$materno','$email','$direccion','$colonia','$muncipio','$estado','$cp','$telCasa','$celular','$otroTel','$telOficina',@LID)");

		
		$rs2 = $db->query("SELECT @LID as id");
        $row = $rs2->fetchObject();

		
		
		return $row->id;
		
		
	}
	
}

