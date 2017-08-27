<?php
/**
 * 
 * This is Documentation controller to get documenation for various class used in roster project
 * @Author: Umesh Mundhe
 */
include_once("abstractController.php");
include_once("controllerInterface.php");
include_once("model/documentationModel.php");  

class documentationController extends abstractController implements controllerInterface{  
    
     public $documentationModel;   
     /**
      * 
      * Contructor for documentation controller 
      * @param None
      */
     public function __construct()    
     {    
          $this->documentationModel = new documentationModel($this->dataSource);  
     }   

     /**
      * @Param : None
      * Mehtod to display data in the view
      * @return : None
      */
     public function displayData()  
     {  
            $arrData['classList'] = $this->documentationModel->getData();  
            if(isset($this->arrParams['className']))
            {                
                $arrData['classDetails'] = $this->documentationModel->getClassDetails($this->arrParams['className'],$this->arrParams['path']);
            }
            include 'view/documentationView.php';           
     }  
}  
