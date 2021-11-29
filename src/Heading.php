<?php

namespace WilliamSampaio\PageBuilder;

class Heading extends NestableElement
{
    public function __construct(array $innerElements = [], int $level = 1)
    {
        if ($level <= 6 and $level >= 1) {

            parent::__construct($innerElements);

            $this->setOpenTag("<h$level _var_>");
            $this->setCloseTag("</h$level>");
        } else {

            die('Heading Error! Level out of range, 1 than 6.');
        }
    }
}

