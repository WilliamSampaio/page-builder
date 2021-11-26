<?php

namespace WilliamSampaio\PageBuilder;

class Body extends Element
{
    public function __construct()
    {
        $this->tag = 'body';

        $this->openTag = '<body _var_>';
        $this->closeTag = '</body>';
    }

    public function style(string $css)
    {
        $this->openTag = str_replace('_var_', "style='$css' _var_", $this->openTag);
        return $this;
    }
}
