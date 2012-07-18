<?php

/**
 * Validator class 
 */
class Validator {

    private static function helper($string, $exclude = "") {
        if (empty($exclude))
            return false;
        if (is_array($exclude)) {
            foreach ($exclude as $text) {
                if (strstr($string, $text))
                    return true;
            }
        } else {
            if (strstr($string, $exclude))
                return true;
        }
        return false;
    }

    private static function numberBetween($integer, $max = null, $min = 0) {
        if (is_numeric($min) && $integer <= $min)
            return false;
        if (is_numeric($max) && $integer >= $max)
            return false;
        return true;
    }

    public static function Email($string, $exclude = "") {
        if (self::helper($string, $exclude))
            return false;
        return (bool) preg_match("/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i", $string);
    }

    public static function Url($string, $exclude = "") {
        if (self::helper($string, $exclude))
            return false;
        return (bool) preg_match("/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i", $string);
    }

    public static function Ip($string) {
        return (bool) preg_match("/^(1?\d{1,2}|2([0-4]\d|5[0-5]))(\.(1?\d{1,2}|2([0-4]\d|5[0-5]))){3}$/", $string);
    }

    public static function Number($integer, $max = null, $min = 0) {
        if (preg_match("/^\-?\+?[0-9e1-9]+$/", $integer)) {
            if (!self::numberBetween($integer, $max, $min))
                return false;
            return true;
        }
        return false;
    }

    public static function UnsignedNumber($integer) {
        return (bool) preg_match("/^\+?[0-9]+$/", $integer);
    }

    public static function Float($string) {
        return (bool) ($string == strval(floatval($string))) ? true : false;
    }

    public static function Alpha($string) {
        return (bool) preg_match("/[a-z0-9][a-z]+/", $string);
    }

    public static function AlphaNumeric($string) {
        return (bool) preg_match("/^[0-9a-zA-Z]+$/", $string);
    }

    public static function Chars($string, $allowed = array("a-z")) {
        return (bool) preg_match("/^[" . implode("", $allowed) . "]+$/", $string);
    }

    public static function Length($string, $max = null, $min = 0) {
        $length = strlen($string);
        if (!self::numberBetween($length, $max, $min))
            return false;
        return true;
    }

    public static function FilesizeBetween($file, $max = null, $min = 0) {
        $filesize = filesize($file);
        return self::numberBetween($filesize, $max, $min);
    }

    public static function ImageSizeBetween($image, $max_width = "", $min_width = 0, $max_height = "", $min_height = 0) {
        $size = getimagesize($image);
        if (!self::numberBetween($size[0], $max_width, $min_width))
            return false;
        if (!self::numberBetween($size[1], $max_height, $min_height))
            return false;
        return true;
    }
    
    
}