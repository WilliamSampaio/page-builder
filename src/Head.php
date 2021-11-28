<?php

namespace WilliamSampaio\PageBuilder;

class Head extends Element
{
    public function __construct($innerElements = [])
    {
        parent::__construct($innerElements);

        $this->openTag = "<head _var_>";
        $this->closeTag = '</head>';
    }
}
