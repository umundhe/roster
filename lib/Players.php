<?php

/**
 * 
 * This class is for Player Entity
 * Class implements player interface
 * @Author : Umesh Mundhe 
 */
include_once("lib/PlayerInterface.php");
class Players implements PlayerInterface
{
    /**
     * 
     * @param1 : PoolID : Player Identifier in pool
     * @param 2: Array of Agility, Speed and strength. 
     * Purpose : This function generate name and calculate total and form attribute array for later use in roster
     */
    public function createSignature($poolId,$arrData)
    {   
        $arrAttibutes['poolId']=$poolId;
        $arrAttibutes['agility']=$arrData["agility"];
        $arrAttibutes['speed']=$arrData["speed"];
        $arrAttibutes['strength']=$arrData["strength"];
        $arrAttibutes['total_score'] =$arrData["agility"]+$arrData["speed"]+$arrData["strength"];        
        $arrAttibutes['name']="PLA".$arrAttibutes['total_score'];            
        return $arrAttibutes;
    } 
    
}

