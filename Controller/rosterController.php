<?php
/**
 * 
 * This is roster Controller to display Roster data. Internally use roster model to form the roster 
 * This class extends abstract controller and implements controller interface
 * @Author: Umesh Mundhe
 */
include_once("abstractController.php");
include_once("controllerInterface.php");
include_once("model/rosterModel.php");  

class rosterController extends abstractController implements controllerInterface {  
    
     public $rosterModel;   
     /**
      * 
      * @param string $dataSource : This defines the source which should be used for player pool 
      */
     
     public function __construct($dataSource)    
     {    
        $this->dataSource=$dataSource;
        $this->rosterModel = new rosterModel($this->dataSource);  
     }   

     /**
      * 
      * @param string $testId : Take test id as input this is optional 
      * if not passed default data used to generate roster.
      */
     public function displayData()  
     {  
        $testId=(isset($this->arrParams['test'])) ? $this->arrParams['test']:"test1";
        $arrFinalTeam = $this->rosterModel->getData($testId);  
        include 'view/rosterView.php';           
     }  
}  
