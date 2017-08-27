<?php
/**
 *  
 * Interface for Player entrity 
 * @author Umesh Mundhe 
 */
Interface PlayerInterface
{
    /**
     * 
     * @param string $poolId : Takes pool id as input to refer back player in pool
     * @param array $arrData : Takes input of array data for agility, speed , stegnth
     * purpose : This method will generate unique name for player and calculate the total
     */
    function createSignature($poolId,$arrData);
}

