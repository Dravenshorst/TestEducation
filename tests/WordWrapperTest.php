<?php

namespace Daniel;

use PHPUnit\Framework\TestCase;

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
        $this->expectException(\InvalidArgumentException::class);
        $wordWrap = new WordWrapper('test');
    }

}