<?php
/**
 * Created by PhpStorm.
 * User: qichenglao
 * Date: 2015-07-22
 * Time: 2:57 AM
 */

class MY_Form_validation extends CI_Form_validation
{

    public function __construct($config = array())
    {
        parent::__construct($config);

    }

    public function error_array()
    {
        if(count($this->_error_array) > 0)
            return $this->_error_array;
    }
}