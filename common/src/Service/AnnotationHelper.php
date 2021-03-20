<?php


class AnnotationHelper
{
    public static function defineValueByAnnotation($annotationName, $annotations)
    {
        foreach (explode(PHP_EOL, $annotations) as $line) {
            if (strpos($line, '@' . $annotationName) !== false) {
                $param = trim(substr($line, strpos($line, '@' . $annotationName)
                    + strlen('@' . $annotationName)));
                return trim($param);
            }
        }
        return 'str';
    }
}
