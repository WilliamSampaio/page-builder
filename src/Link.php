<?php

namespace WilliamSampaio\PageBuilder;

class Link extends Element
{
    public function __construct(string $href)
    {
        parent::__construct();

        $this->openTag = "<link _var_>";
        $this->closeTag = '';

        if ($href) {

            $this->href($href);
        }
    }

    public function href(string $href)
    {
        parent::href($href);
        return $this;
    }

    public function rel(string $rel)
    {
        parent::rel($rel);
        return $this;
    }
}
