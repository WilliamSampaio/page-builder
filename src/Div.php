<?php

namespace WilliamSampaio\PageBuilder;

class Div extends Element
{
    public function __construct($innerElements = [])
    {
        parent::__construct($innerElements);

        $this->openTag = "<div _var_>";
        $this->closeTag = '</div>';
    }
}
