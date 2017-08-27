<?php
/**
 * 
 * This is abstract class created to have a common method and properties accessible for all controllers
 * @Author: Umesh Mundhe
 */
abstract class abstractController
{
    /**
     *
     * @var Array
     */
    public $arrParams;
    
    /**
     *
     * @var string Data source used to generate roster (e.g. File, Mongo, MYSQL etc.)
     */
    public $dataSource; 
   
}