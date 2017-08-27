<?php
/**
 * Class for Rules entity
 * This class implements rules interface
 * @author Umesh Mundhe
 */
include_once("lib/RulesInterface.php");
class Rules implements RulesInterface
{
    public $starters;
    public $substitutes;
    public $scoreLimit;
    public $salaryCap;
    public $totalPlayers;
    
    /**
     * 
     * @param array $arrData Constructor take array of starters,substitutes, score limit and salray cap as input
     * Calculates total player allowed in roster by summing up starters and substitutes
     */
    
    function __construct($arrData)
    {
        $this->starters=$arrData['starters'];
        $this->substitutes=$arrData['substitutes'];
        $this->scoreLimit =$arrData['scoreLimit'];
        $this->salaryCap=$arrData['salaryCap'];
        $this->totalPlayers=$this->substitutes+$this->starters;
    }
}
