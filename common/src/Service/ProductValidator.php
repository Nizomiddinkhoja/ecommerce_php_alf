<?php


class ProductValidator
{
    public static function validate()
    {
        $reflObj = new ReflectionClass('Product');
        $properties = $reflObj->getProperties();


        foreach ($properties as $property) {
            $comment = $property->getDocComment();
            if (!empty($comment) && isset($_POST[$property->getName()])) {

                if (!ValidationService::validate($comment, $_POST[$property->getName()])) {

                    return false;
                }
            }
        }
        return true;
    }
}
