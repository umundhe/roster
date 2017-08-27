<?php
/**
 *  
 * Class to use file as source for Player pool data 
 * It extends data interface
 * @author Umesh Mundhe
 */
include_once("lib/DataInterface.php");
class dataFile implements DataInterface
{
    /**
     * 
     * @param string $dataId
     * @return mixed  : 
     * If failed to generate roster returns false 
     * On success returns player pool input data in json format
     */
    public function getData($dataId)
    {
        if(file_exists("data/$dataId.json"))
        {
            $testData= file_get_contents("data/$dataId.json"); 
            return json_decode($testData,true);                                
        }
        else        
            return false;        
    }
}
