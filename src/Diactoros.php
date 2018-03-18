<?php
/**
 * Diactoros - Unicode Character
 * @author BHRDN
 */

declare (strict_types = 1);
namespace Diactoros;

use \Diactoros\Constant\Unicode;

abstract class DiactorosEngine
{
	/**
     * @var array
     */
    protected $char, $body;

    /**
     * Add text for encoding
     *
     * @param string $str
     */
    public function addText(string $str)
    {
        $this->body = str_split($str);
    }

    /**
     * Add array list for replacer
     *
     * @param string $replacer
     */
    public function addReplacer(array $replacer)
    {
        foreach ($replacer as $key => $value) {
        	Unicode::$char[$key] = $value;
        }
    }

    /**
     * Replace text with unicode character
     *
     * @param string $str
     * @return string
     */
    public function replaceText(string $str) : string
    {
    	foreach (Unicode::$char as $key => $value) {
    		if ($key === $str) {
    			$result = ((count($value) > 1) ? Unicode::$char[$key][random_int(0, count($value)-1)] : Unicode::$char[$key][0]);
    		}
    	}
    	
    	return $result ?? $str;
    }
}

class Diactoros extends DiactorosEngine
{
	/**
     * Replace character with new unicode character
     *
     * @param string $str
     * @return unicode character
     */
    public function encode()
    {
    	foreach ($this->body as $key => $value) {
    		$result[] = $this->replaceText($value);
    	}

    	return implode('', $result);
    }
}
