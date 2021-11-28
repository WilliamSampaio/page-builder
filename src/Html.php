<?php

namespace WilliamSampaio\PageBuilder;

class Html extends Element
{
    public function __construct($innerElements = [])
    {
        parent::__construct($innerElements);

        $this->openTag = '<!DOCTYPE html><html _var_>';
        $this->closeTag = '</html>';
    }

    public function xmlns()
    {
        $this->openTag = str_replace('_var_', "xmlns='http://www.w3.org/1999/xhtml' _var_", $this->openTag);
        return $this;
    }
}
