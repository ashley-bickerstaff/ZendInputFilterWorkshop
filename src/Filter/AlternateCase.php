<?php
/**
 * Filter a string so that each letter of a string is alternate case.
 */

namespace ZendInputFilterWorkshop\Filter;

use Zend\Filter\AbstractFilter;

class AlternateCase extends AbstractFilter
{

    protected $options = [
        'startWithUpper' => true
    ];

    /**
     * Transform a string so that each letter is in alternate case.
     *
     * @param string $value
     *
     * @return string
     */
    public function filter($value)
    {
        $splitString = str_split($value);
        $charCount = count($splitString);

        $newString = '';
        $j = 0;
        for ($i = 0; $i < $charCount; ++$i) {

            $newString .= (($j + (int)!$this->options['startWithUpper']) % 2 === 0)
                            ? strtoupper($splitString[$i])
                            : strtolower($splitString[$i]);

            if (ctype_alpha($splitString[$i])) {
                ++$j;
            }
        }
        return $newString;
    }
}