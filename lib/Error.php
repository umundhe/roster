<?php
/**
 *  
 * Class to handle various data error 
 * This can be further extended to log errors either in file or other data source
 * All Error messages used in rotser project are leveraged from error_mesages.json
 * @author Umesh Mundhe
 */

class Error 
{
    public $arrErrors;
    
    /**
     *  Extract data from file to array to refer in application on need basis.
     */
    function __construct() {
        if(file_exists("config/error_messages.json"))
        {
            $errorMessages= file_get_contents("config/error_messages.json"); 
            $this->arrErrors = json_decode($errorMessages,true);
        }     
    }
}