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

    public static function addBootstrapInputText(string $id, string $name, string $label, string $help)
    {
        return Element::div(
            [Element::GLOBAL_ATTR_CLASS => 'mb-3'],
            [
                Element::label(
                    ['for' => $id, Element::GLOBAL_ATTR_CLASS => 'form-label'],
                    [$label]
                ),

                Element::input(
                    [
                        Element::ATTR_TYPE => 'text',
                        Element::GLOBAL_ATTR_CLASS => 'form-control',
                        Element::GLOBAL_ATTR_ID => $id,
                        Element::ATTR_NAME => $name,
                        'aria-describedby' => $id . '_help'
                    ]
                ),

                Element::div(
                    [Element::GLOBAL_ATTR_ID => $id . '_help', Element::GLOBAL_ATTR_CLASS => 'form-text'],
                    [$help]
                )
            ]
        );
    }
}
