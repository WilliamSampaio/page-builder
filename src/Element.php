<?php

namespace WilliamSampaio\PageBuilder;

abstract class Element
{
    public $openTag;
    public $innerElement;
    public $closeTag;

    public $output;

    public $tag;

    public function __construct()
    {
        $this->innerElement = [];
    }

    public function prepare()
    {
        $this->output .= $this->openTag;

        if (!empty($this->innerElement)) {

            foreach ($this->innerElement as $element) {

                $this->output .= $element->prepare();
            }
        }

        return $this->output .= $this->closeTag;
    }

    public function detonate()
    {
        echo str_replace('_var_', '', $this->prepare());
    }

    public function addChildElement(Element $element)
    {
        $this->innerElement[] = $element;
    }

    public function getChildElements()
    {
        return $this->innerElement;
    }

    public function getChildElementByTag(string $tag)
    {
        if (!empty($this->innerElement)) {

            foreach ($this->innerElement as $element) {

                if ($element->tag == $tag) {
                    return $element;
                }
            }

            die('Error! Tag not found.');
        } else {
            die('Error! No child element found.');
        }
    }

    public function setAttribute(string $key, string $value)
    {
        $this->openTag = str_replace('_var_', "$key='$value' _var_", $this->openTag);
        return $this;
    }

    public function setAttributes(array $atributes = ['key' => 'value'])
    {
        foreach ($atributes as $key => $value) {

            $this->openTag = str_replace('_var_', "$key='$value' _var_", $this->openTag);
        }

        return $this;
    }
}
