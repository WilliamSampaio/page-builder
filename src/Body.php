<?php

namespace WilliamSampaio\PageBuilder;

class Body extends Element
{
    public function __construct($innerElements = [])
    {
        parent::__construct($innerElements);

        $this->openTag = '<body _var_>';
        $this->closeTag = '</body>';
    }
}
