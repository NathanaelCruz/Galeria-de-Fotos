<?php

namespace PhotoGallery;

class Model
{

    private $value = [];

    public function __call($name, $args = [])
    {

        $method = substr($name, 0, 3);
        $fieldName = substr($name, 3, strlen($name));

        switch ($method) {

            case 'set':
                $this->value[$fieldName] = $args[0];
                break;

            case 'get':
                return isset($this->value[$fieldName]) ? $this->value[$fieldName] : NULL;
                break;
            
        }

    }

    public function setData($data = array())
    {

        foreach ($data as $key => $value) {
            $this->{"set".$key}($value);
        }

    }

    public function getValues()
    {

        return $this->value;

    }

}

?>