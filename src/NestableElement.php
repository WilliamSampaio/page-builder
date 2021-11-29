<?php

namespace WilliamSampaio\PageBuilder;

class NestableElement extends Element
{
    private array $innerElements;
    private string $openTag;
    private string $closeTag;
    private string $output;

    protected function __construct($innerElements = [])
    {
        $this->innerElements = $innerElements;
        $this->output = '';
    }

    protected function get_tag(): string
    {
        return $this->getOpenTag();
    }

    protected function set_tag(string $tag): void
    {
        $this->setOpenTag($tag);
    }

    protected function getOpenTag(): string
    {
        return $this->openTag;
    }

    protected function setOpenTag(string $openTag): void
    {
        $this->openTag = $openTag;
    }

    protected function getCloseTag(): string
    {
        return $this->closeTag;
    }

    protected function setCloseTag(string $closeTag): void
    {
        $this->closeTag = $closeTag;
    }

    protected function prepare(): string
    {
        $this->output .= $this->getOpenTag();

        if (!empty($this->innerElements)) {

            foreach ($this->innerElements as $element) {

                if ($element instanceof Element) {

                    $this->output .= $element->prepare();
                } else {

                    $this->output .= $element;
                }
            }
        }

        return $this->output .= $this->getCloseTag();
    }

    public function detonate(): void
    {
        echo str_replace('_var_', '', $this->prepare());
    }

    public function addChildElements($elements = []): Element
    {
        if (!empty($elements)) {

            foreach ($elements as $element) {

                $this->innerElements[] = $element;
            }
        } else {

            die('Error! Empty array.');
        }
        return $this;
    }

    public function getChildElements(): array
    {
        return $this->innerElement;
    }

    public function getChildElementByTag(string $tag): array
    {
        $tag = ucfirst(strtolower($tag));

        if (!empty($this->innerElement)) {

            foreach ($this->innerElements as $element) {

                $elements = [];

                if ($element instanceof $tag) {

                    $elements[] = $element;
                }

                $elementsInElement = $element->getChildElementByTag($tag);

                if (!empty($elementsInElement)) {

                    foreach ($elementsInElement as $elementInElement) {

                        $elements[] = $elementInElement;
                    }
                }
            }

            if (!empty($elements)) {

                return $elements;
            } else {

                die('Error! Tag not found.');
            }
        } else {

            die('Error! No child element found.');
        }
    }

    public function getChildElementById(string $id): Element
    {

        if (!empty($this->innerElements)) {

            foreach ($this->innerElements as $element) {

                if (str_contains($element->getOpenTag(), "id='$id'")) {

                    return $element;
                } else {

                    $element->getChildElementById($id);
                }
            }


            die('Error! Tag not found.');
        } else {

            die('Error! No child element found.');
        }
    }

    public function setAttributes(array $atributes = ['key' => 'value']): Element
    {
        foreach ($atributes as $key => $value) {

            $this->setOpenTag(str_replace('_var_', "$key='$value' _var_", $this->getOpenTag()));
        }

        return $this;
    }
}
