<?php

/**
 * 
 * This is core class used to generate Roster
 * @Author : Umesh Mundhe
 */
include_once("lib/RosterInterface.php");

class Roster implements RosterInterface
{
   /* public varilable for player object*/ 
   public $objectPlayers; 
   
   /* public varilable for Rules object*/ 
   public $objectRules;
   
   /* public varilable for Final TEam*/ 
   public $arrFinalTeam;
   
   /* public varilable for Salary Cap */ 
   public $totalSalary;
   /**
    * 
    * @Parameter1: Object of Player Class
    * @Parameter2 : Object of Rules Class
    */ 
   function __construct(Players $objPlayer,Rules $objRules)
   {
       $this->objectPlayers= $objPlayer;
       $this->objectRules =$objRules;       
   }
   /**
    * @param : Array of Pool of player available for Roster
    * Purpose: This method accepts pool of player call Signgature mthod from Player class to generate name and Supplemental data
    * Call internal private method to add player to team.
    */
   public function createRoster($arrPool) 
   {
       $this->arrFinalTeam=array();
       $this->totalSalary=0;
       if(is_array($arrPool))
       {      
            foreach($arrPool as $key=>$arrPlayer)
            {             
                if(is_array($arrPlayer))
                {
                    $arrReturn=$this->objectPlayers->createSignature($key,$arrPlayer);                    
                }   
                $this->_addPlayerToTeam($arrReturn);                
                if(count($this->arrFinalTeam)== $this->objectRules->totalPlayers)
                    return $this->arrFinalTeam;                
            }
        }    
        return $this->arrFinalTeam;
   }    
   
   /**
    * 
    * @param: Array of player to be added. It includes agility,name,speed,strength & total_Score.
    * Purpose : This method accept player details to be added in team and recursively calling it self to pop some other player 
    * to satisfy rule of salary cap.  
    */
   private function _addPlayerToTeam($arrDetails)
   {
        if(($this->totalSalary +$arrDetails['total_score'])<=$this->objectRules->salaryCap)
        {
            if(!array_key_exists($arrDetails['total_score'], $this->arrFinalTeam) && $arrDetails['total_score']<=100)
            { 
                $this->totalSalary+=$arrDetails['total_score'];
                $this->arrFinalTeam[$arrDetails['total_score']]=$arrDetails;
            }
        } 
        else 
        {
            ksort($this->arrFinalTeam);
            $arrPop=array_pop($this->arrFinalTeam);           
            $this->totalSalary-=$arrPop['total_score'];
            $this->_addPlayerToTeam($arrDetails);           
        }
   }
}