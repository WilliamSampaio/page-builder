<?php

namespace WilliamSampaio\PageBuilder;

class Paragraph extends Element
{
    public function __construct($innerElements = [])
    {
        parent::__construct($innerElements);

        $this->openTag = '<p _var_>';
        $this->closeTag = '</p>';
    }
}
