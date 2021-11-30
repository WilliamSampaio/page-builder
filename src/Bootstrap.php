<?php

namespace WilliamSampaio\PageBuilder;

class Bootstrap
{
    public static function addBootstrapCss(): string
    {
        return Element::link([
            Element::ATTR_HREF => '/../bootstrap-5.1.3-dist/css/bootstrap.min.css',
            Element::ATTR_REL => 'stylesheet'
        ]);
    }
}
