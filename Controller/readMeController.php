<?php
/**
 * 
 * This is Read me controller to display Read me file
 * @Author: Umesh Mundhe
 */
include_once("abstractController.php");
include_once("controllerInterface.php");
include_once("model/readMeModel.php");  

class readMeController extends abstractController implements controllerInterface {  
    
     public $readMeModel;   
     
     /**
      * 
      * @param string $dataSource : This defines the source which should be used for player pool 
      */

     public function __construct($dataSource)    
     {    
          $this->dataSource=$dataSource;
          $this->readMeModel = new readMeModel($dataSource);  
     }   

     /**
      * 
      * @Param : None
      * Purpose : To display data in view. Includes associated view
      */
     
     public function displayData()  
     {  
            $readMeData=$this->readMeModel->getData();  
            include 'view/readMeView.php';           
     }  
}  
