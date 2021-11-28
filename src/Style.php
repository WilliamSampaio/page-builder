<?php

namespace WilliamSampaio\PageBuilder;

class Style extends Element
{
    public function __construct(string $css)
    {
        parent::__construct([$css]);

        $this->openTag = '<style _var_>';
        $this->closeTag = '</style>';
    }

    public function media(string $media)
    {
        parent::media($media);
        return $this;
    }

    public function type(string $type)
    {
        if ($type != 'text/css') {

            die('Error! Invalid attribute value for type.');
        }

        parent::type($type);
        return $this;
    }
}
