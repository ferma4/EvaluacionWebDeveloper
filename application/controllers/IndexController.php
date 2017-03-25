<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
		
		
		 $this->view->baseUrl = $this->_request->getBaseUrl();
    }

    public function indexAction()
    {
		 $db = Zend_Db_Table::getDefaultAdapter();
		 $table = new Application_Model_DbTable_Contactos();
         $this->view->datos = $table->listar();
    }

	
	public function editarAction()
	
    {
		
		 $this->request =  $this->getRequest();
         $id = $this->request->getParam('id');
		 $db = Zend_Db_Table::getDefaultAdapter();
		
		 $table = new Application_Model_DbTable_Contactos();
         $this->view->datos = $table->detalle($id);
		 
		 
    }
	
	public function detalleAction()
    {
     
	 $this->request =  $this->getRequest();
     $id = $this->request->getParam('id');
	 $db = Zend_Db_Table::getDefaultAdapter();
		
     $table = new Application_Model_DbTable_Contactos();
     $this->view->datos = $table->detalle($id);
	 
    }
	
	public function estadoAction(){

      $this->_helper->viewRenderer->setNoRender();
	  $data = $this->_request->getPost();
		
	  $cp = $data['cp'];	
		
	  $table = new Application_Model_DbTable_Sepomex();
      $estado = $table->sepomex($cp);
		
		foreach($estado as $fila){

         echo '<option>'.$fila['d_estado'].'</option>';

		}
		
		
	}
	
	
	public function municipioAction(){

		
		$this->_helper->viewRenderer->setNoRender();
		$data = $this->_request->getPost();
		
	    $cp = $data['cp'];	
		
	    $table = new Application_Model_DbTable_Sepomex();
        $municipio = $table->sepomex($cp);
	
		if( count($municipio) > 0 ):
			foreach($municipio as $fila){


                echo '<option>'.$fila['d_mnpio'].'</option>';

		}
		else:
			echo "error";
		endif;
		
		
	}
	
	
	public function coloniaAction(){

		
		$this->_helper->viewRenderer->setNoRender();
		$data = $this->_request->getPost();
		
	    $cp = $data['cp'];	
	
	    $table = new Application_Model_DbTable_Sepomex();
        $colonia = $table->sepomex($cp);
	
		
			foreach($colonia as $fila){


              echo	'<option>'.$fila['d_asenta'].'</option>';

		
		}
		
		
	}
	
	public function updateAction()
    {
		
		 $this->_helper->viewRenderer->setNoRender();
		 $data = $this->_request->getPost();
		
	     $nombre 	= $data['name'];	
		 $paterno = $data['paterno'];	
		 $materno = $data['materno'];	
		 $email = $data['email'];	
		 $direccion = $data['direccion'];	
	     $colonia = $data['colonia'];	
	     $muncipio = $data['deleg'];	
		 $estado = $data['state'];	
		 $cp = $data['cp'];	
		 $telCasa = $data['phonecasa'];	
		 $celular = $data['celular'];	
		 $otroTel = $data['otrophone'];	
		 $telOficina = $data['phoneoficina'];
         $idContacto = $data['idContacto'];			 
	
	    $table = new Application_Model_DbTable_Contactos();
        $update = $table->updateContacto($nombre,$paterno,$materno,$email,$direccion,$colonia,$muncipio,$estado,$cp,$telCasa,$celular,$otroTel,$telOficina,$idContacto);
	
		if ($update)
		{
		 $resultado = array(
                        "codigo" => 200
                        
                    );
                    
                                
                }else {
                    $resultado = array(
                        "codigo" => 400
                       
                    );
                }
                
        echo json_encode($resultado);
		
		
	}
	
	
		public function addAction()
    {
		
		 $this->_helper->viewRenderer->setNoRender();
		 $data = $this->_request->getPost();
		
	     $nombre 	= $data['name'];	
		 $paterno = $data['paterno'];	
		 $materno = $data['materno'];	
		 $email = $data['email'];	
		 $direccion = $data['direccion'];	
	     $colonia = $data['colonia'];	
	     $muncipio = $data['deleg'];	
		 $estado = $data['state'];	
		 $cp = $data['cp'];	
		 $telCasa = $data['phonecasa'];	
		 $celular = $data['celular'];	
		 $otroTel = $data['otrophone'];	
		 $telOficina = $data['phoneoficina'];
         			 
	
	    $table = new Application_Model_DbTable_Contactos();
        $add = $table->addContacto($nombre,$paterno,$materno,$email,$direccion,$colonia,$muncipio,$estado,$cp,$telCasa,$celular,$otroTel,$telOficina);
	
		if ($add)
		{
		 $resultado = array(
                        "codigo" => 200
                        
                    );
                                        
                }else {
                    $resultado = array(
                        "codigo" => 400
                        
                    );
                }
        
        echo json_encode($resultado);
		
	}
	
  
}

