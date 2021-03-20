<?php


class ClassInfoHelper
{

    public static function getMethods($object)
    {

        $objReflection = new ReflectionClass($object);
        $properties = $objReflection->getMethods();


        $methods = [];

        foreach ($properties as $property) {
            $methods[] = $property->name;
        }
        return $methods;
    }

    public static function getVariables($object)
    {

        $objReflection = new ReflectionClass($object);
        $properties = $objReflection->getProperties();


        $methods = [];

        foreach ($properties as $property) {
            $methods[] = $property->name;
        }
        return $methods;
    }
}
