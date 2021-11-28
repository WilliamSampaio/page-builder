<?php

namespace WilliamSampaio\PageBuilder;

class Image extends Element
{
    public function __construct(string $source)
    {
        parent::__construct();

        $this->openTag = "<img src='$source' _var_>";
        $this->closeTag = '';
    }
}
