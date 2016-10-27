<?php

namespace Daniel;

//use Doctrine\Instantiator\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Prophecy\Exception\Exception;

class WordWrapperTest extends TestCase
{

    public function testWordWrap()
    {
        $insert = 'Hallo ik ben Daniel Ravenshorst';
        $expected = "Hallo ik ben\nDaniel\nRavenshorst";

        $wordWrap = new WordWrapper(12);
        $actual = $wordWrap->wrap($insert);

        $this->assertEquals($expected, $actual);
    }


    public function testConstructWithString()
    {
        $wordWrap = new WordWrapper('test');
        $this->expectException(\InvalidArgumentException::class);
    }

}