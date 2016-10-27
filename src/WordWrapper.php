<?php

namespace Daniel;

use RopBot\WordWrapInterface;
/**
 * Class WordWrapper
 */
class WordWrapper implements WordWrapInterface
{
    const ERROR_NO_STRING = 'Expected string, given type "%s"';
    const ERROR_NO_INT = 'Expected int, given type "%s"';
    const ERROR_WORD_IS_BIGGER = 'Error, word in string is bigger than given max length "%s"';

    private $pMaxLength = null;

    /**
     * WordWrapper constructor.
     * @param int $p_max_length
     *
     * @throws \Exception
     */
    public function __construct($p_max_length = null)
    {
        if (!is_int($p_max_length)) {
            throw new \InvalidArgumentException();
//            throw new \Exception(
//                sprintf(self::ERROR_NO_INT, gettype($p_max_length))
//            );
        }

        $this->pMaxLength = $p_max_length;
    }

    /**
     * @param string $input
     *
     * @return string
     * @throws \Exception
     */
    public function wrap($input)
    {
        if (!is_string($input)) {
            throw new \Exception(
                sprintf(self::ERROR_NO_STRING, gettype($input))
            );
        }

        $result = [];
        $resultString = '';
        $words = explode(' ', $input);
        foreach ($words as $word) {

            $countWord = mb_strlen($word);

            if ($countWord >= $this->pMaxLength) {
                throw new \Exception(
                    sprintf(self::ERROR_WORD_IS_BIGGER, $this->pMaxLength)
                );
            } else {

                if ($resultString === '') {
                    $resultString .= $word;
                } elseif (mb_strlen($resultString) + 1 + $countWord <= $this->pMaxLength) {
                    $resultString .= ' ' . $word;
                } elseif (mb_strlen($resultString) + 1 + $countWord >= $this->pMaxLength) {
                    $result[] = $resultString;
                    $resultString = '';
                }

            }
        }

        $wrappedResult = '';
        foreach ($result as $wraps) {
            $wrappedResult .= $wraps . "\n";
        }

        return $wrappedResult;
    }
}