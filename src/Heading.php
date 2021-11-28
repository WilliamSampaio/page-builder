<?php

namespace WilliamSampaio\PageBuilder;

class Heading extends Element
{
    public function __construct(string $text, int $level = 1)
    {
        parent::__construct();

        if ($level <= 6 and $level >= 1) {

            $this->openTag = "<h$level _var_>$text";
            $this->closeTag = "</h$level>";
        } else {

            die('Heading Error! Level out of range, 1 than 6.');
        }
    }
}
