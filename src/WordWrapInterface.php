<?php

namespace RopBot;

interface WordWrapInterface
{
    public function __construct($p_max_length = null);
    public function wrap($input);
}

/*EOF*/