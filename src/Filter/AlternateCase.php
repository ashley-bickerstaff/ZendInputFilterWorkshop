<?php
/**
 * Description
 */

namespace ZendInputFilterWorkshop\Filter;

use Zend\Filter\AbstractFilter;

class AlternateCase extends AbstractFilter
{

    protected $startWithUpper = false;

    public function filter($value)
    {
        $splitString = str_split($value);
        $charCount = count($splitString);

        $newString = '';
        for ($i = 0; $i < $charCount; ++$i) {
            $newString .= (($i + (int)!$this->startWithUpper) % 2 === 0)
                            ? strtoupper($splitString[$i])
                            : strtolower($splitString[$i]);
        }
        return $newString;
    }
}