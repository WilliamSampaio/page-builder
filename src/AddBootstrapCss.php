<?php

namespace WilliamSampaio\PageBuilder;

class AddBootstrapCss extends Link
{
    public function __construct()
    {
        parent::__construct('/../bootstrap-5.1.3-dist/css/bootstrap.min.css');
        parent::rel('stylesheet');
    }
}
