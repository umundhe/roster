<?php
 /**
 * 
 * This is Model for generat the roster this implements model Interface.
 * Model to generate Roster 
 * @Author : Umesh Mundhe
 */
include_once("modelInterface.php");
    include_once("lib/Players.php");
    include_once("lib/Rules.php");
    include_once("lib/Roster.php");
    include_once("lib/Error.php");
    
    class rosterModel implements modelInterface
    {  
        public $objError;
        public $arrErrorMessage;
        public $dataSource;
        public $objDataSource;
        
        /**
         * 
         * @param string $dataSource : Takes data sources (File, Mongo, Mysql etc) to read data from that source
         * Create Error object to refer later in the application
         */
        function __construct($dataSource) 
        {
            $this->dataSource = $dataSource;
            $this->objError = new Error();
        }
        
        /**
         * 
         * @param string $testId Takes test id as input 
         * @return array returns array of palyers qualified for roster
         */
        public function getData($testId='test1')  
        {              
           
            if(file_exists("lib/data".$this->dataSource.".php"))
            {                
                include_once("lib/data".$this->dataSource.".php");
                $className="data".$this->dataSource;
                if(class_exists($className))
                {                    
                    $this->objDataSource =new $className;
                }   
                else 
                {
                    return $this->arrErrorMessage= array("error"=>$this->objError->arrErrors['error60']);
                }    
            }       
            else 
            {
                return $this->arrErrorMessage= array("error"=>$this->objError->arrErrors['error50']);
            }
            
            $arrData = $this->objDataSource->getData($testId);      
            if(!is_array($arrData))
            {
                return $this->arrErrorMessage= array("error"=>$this->objError->arrErrors['error30']);
            }    
            if($this->_validateData($arrData))
            {
                $objRules= new Rules($arrData['rules']);
                $objPlayer= new Players();
                $objRoster =new Roster($objPlayer,$objRules);
                return $objRoster->createRoster($arrData['playerPool']);
            }
            else
            {
                return $this->arrErrorMessage;
            }            
        }        
        
        /**
         * Purpose : This method runs data validation rules on given data input 
         * @param type $arrData : Takes array of player and rules as input run validations on it
         * @return boolean : Returns true or false based on data validation result
         */
        private function _validateData($arrData)
        {
            if(!isset($arrData['rules']) || !isset($arrData['playerPool']))
            {
                $this->arrErrorMessage=array("error"=>$this->objError->arrErrors['error10']);                    
                return false;
            }
            if(!isset($arrData['rules']['starters'])|| !isset($arrData['rules']['substitutes']) || !isset($arrData['rules']['scoreLimit']) || !isset($arrData['rules']['salaryCap']))
            {                
                $this->arrErrorMessage= array("error"=>$this->objError->arrErrors['error20']);
                return false;
            }            
            $poolCount=count($arrData['playerPool']);            
            if($poolCount < ($arrData['rules']['starters']+$arrData['rules']['substitutes']))
            {
                $this->arrErrorMessage=array("error"=>$this->objError->arrErrors['error40']);
                return false;
            }     
            return true;
        }         
    }  