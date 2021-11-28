<?php

namespace WilliamSampaio\PageBuilder;

class Hr extends Element
{
    public function __construct()
    {
        parent::__construct();

        $this->openTag = "<hr _var_>";
        $this->closeTag = '';
    }
}
