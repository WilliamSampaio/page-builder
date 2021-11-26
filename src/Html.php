<?php

namespace WilliamSampaio\PageBuilder;

class Html extends Element
{
    public function __construct()
    {
        $this->tag = 'html';
        
        $this->openTag = '<!DOCTYPE html><html _var_>';
        $this->closeTag = '</html>';
    }

    public function lang(string $lang = 'en')
    {
        $this->openTag = str_replace('_var_', "lang='$lang' _var_", $this->openTag);
        return $this;
    }
}
