<?php   
/**
 * 
 * This is Model for documentaiton this implements model Interface.
 * Model to display contents in read me file.
 * @Author : Umesh Mundhe
 */
include_once("modelInterface.php");

class readMeModel implements modelInterface
{  
    /**
     * @Param : none 
     * @return string : Read data from readMe.txt file and returns in string format.
     */
    public function getData()  
    {              
        return file_get_contents("readMe.txt"); 
    }               
}  