<?php

namespace WilliamSampaio\PageBuilder;

class Br extends Element
{
    public function __construct()
    {
        parent::__construct();

        $this->openTag = "<br _var_>";
        $this->closeTag = '';
    }
}
