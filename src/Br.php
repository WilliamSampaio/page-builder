<?php

namespace WilliamSampaio\PageBuilder;

class Br extends SingleElement
{
    public function __construct()
    {
        parent::__construct();

        $this->setTag("<br _var_>");
    }
}
