<?php   
/**
 * 
 * This is Model for documentaiton this implements model Interface.
 * It extacts all class name in project and extract class and method comments usin PHP Reflection
 * @Author : Umesh Mundhe
 */
include_once("modelInterface.php");
class DocumentationModel implements modelInterface
{  
    public $arrOutput;
    
    /**
     * Purpose : To get all class files used in roster project 
     * @return array returns array of all files in controller, library and model
     */
    public function getData()  
    {              
        $this->arrOutput["Controller"]=$this->_getClassList("Controller/");        
        $this->arrOutput["lib"]=$this->_getClassList("lib/");
        $this->arrOutput["Model"]=$this->_getClassList("Model/");        
        return $this->arrOutput;
    }   
    
    /**
     * 
     * @param string $className Taks class name as input to extract documentation
     * @param type $path  Path of the class file .
     * @return array : Returns array of class documentation and each method's documentation
     * PHP Reflection used to get all the details 
     */
    public function getClassDetails($className,$path)
    {
        $arrDetails=array();
        include_once("$path/$className");
        $className=str_replace(".php","",$className);
        $objReflection = new ReflectionClass($className);
        $arrMethods=$objReflection->getMethods();  
        $arrDetails[$className]=$objReflection->getDocComment();
        if(is_array($arrMethods))
        {
            foreach($arrMethods as $key=>$objMethod)
            {               
                $objReflectionMethod=new  ReflectionMethod($className,$objMethod->name);
                $arrDetails[$objMethod->name]=$objReflectionMethod->getDocComment();
            }
        }              
        return $arrDetails;
    }
    /**
     * 
     * @param string $dirName : Directory name as input to list all class files under it.
     * @return array : Returns list of all class file names under given directory
     */
    private function _getClassList($dirName)
    {
        $arrClassNames=array();
        if(is_dir($dirName))
        {
            if ($objHandle = opendir($dirName)) {
                while (false !== ($fileName = readdir($objHandle))) {
                    if ($fileName != "." && $fileName != "..") {
                        $arrClassNames[]=$fileName;
                   }
                }
            }    
            closedir($objHandle);
        }
        return $arrClassNames;
    }
}  