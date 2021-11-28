<?php

namespace WilliamSampaio\PageBuilder;

class Title extends Element
{
    public function __construct(string $title)
    {
        parent::__construct([$title]);

        $this->openTag = "<title _var_>";
        $this->closeTag = '</title>';
    }
}
