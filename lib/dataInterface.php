<?php
/**
 * 
 * Interface for data sources 
 * @author Umesh Mundhe
 */
Interface dataInterface
{
    /**
     * Method to get data from source. Any data source can be used.
     * @param string $dataId
     */
    function getData($dataId);
}

