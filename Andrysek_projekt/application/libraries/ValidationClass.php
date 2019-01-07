<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidationClass
 *
 * @author andrysek_zdenek
 */
class ValidationClass {
    function __construct() {
        
    }
    
    /**
     * @param type $errorArray = pole s chybovými hláškami z formuláře  z validace
     * @param type $inputs = pole se seznamem vstupních políček ve formuláři
     */
    
    function errorMessages($errorArray, $inputs)
    {
        $return = array();
        foreach ($inputs as $value)
        {
            if(array_key_exists($value, $errorArray))
            {
                $return[$value] = $errorArray[$value];
            }else{
            $return[$value] = "";
            }
        }
         return $return;
    }
    /**
     * 
     * @param type $errorArray pole chybovách hláše
     * @param type $inputs asociativní pole kde klíčem je název pole a hodnotou je udaj z formulaře
     * @return string
     */
    function values($errorArray, $inputs)
    {
        $return = array();
        foreach ($inputs as $key => $value) // pole které prochazím, klič => hodnota
        {
            if(array_key_exists($key, $errorArray))
            {
                $return[$key] = "";
            }else{
            $return[$key] = $value;
            }
        }
         return $return;
    }
}
