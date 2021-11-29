<?php

namespace WilliamSampaio\PageBuilder;

class SingleElement extends Element
{
    private string $tag;

    protected function __construct()
    {
        $this->tag = '';
    }

    protected function get_tag(): string
    {
        return $this->getTag();
    }

    protected function set_tag(string $tag): void
    {
        $this->setTag($tag);
    }

    protected function getTag(): string
    {
        return $this->tag;
    }

    protected function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    protected function prepare(): string
    {
        return $this->getTag();
    }

    public function detonate(): void
    {
        echo str_replace('_var_', '', $this->prepare());
    }

    public function setAttributes(array $atributes = ['key' => 'value']): Element
    {
        foreach ($atributes as $key => $value) {

            $this->setTag(str_replace('_var_', "$key='$value' _var_", $this->getTag()));
        }

        return $this;
    }
}
