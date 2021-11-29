<?php

namespace WilliamSampaio\PageBuilder;

abstract class Element
{
    protected function get_tag(): string
    {
        return '';
    }

    protected function set_tag(string $tag): void
    {
        return;
    }

    protected function prepare(): string
    {
        return '';
    }

    public function detonate(): void
    {
        return;
    }

    public function addChildElements(): Element
    {
        return $this;
    }

    public function getChildElements(): array
    {
        return [];
    }

    public function getChildElementByTag(string $tag): array
    {
        return [];
    }

    public function getChildElementById(string $id): Element
    {
        return $this;
    }

    public function setAttributes(array $atributes = ['key' => 'value']): Element
    {
        return $this;
    }

    /**
     * ABAIXO FUNÇÕES EM QUE TODOS OS TIPOS DE ELEMENTOS SUPORTAM,
     * OS GLOBAL ATTRIBUTES!
     * 
     * 
     * 
     */

    public function accesskey(string $accesskey)
    {
        if (strlen($accesskey) > 1) {

            die('Error! Accesskey attribute must be one character.');
        }

        $this->set_tag(str_replace('_var_', "accesskey='$accesskey' _var_", $this->get_tag()));
        return $this;
    }

    public function class(string $class)
    {
        $this->set_tag(str_replace('_var_', "class='$class' _var_", $this->get_tag()));
        return $this;
    }

    public function contenteditable(string $contenteditable)
    {
        if ($contenteditable != 'true' and $contenteditable != 'false') {

            die('Error! Contenteditable attribute must be "true" or "false".');
        }

        $this->set_tag(str_replace('_var_', "contenteditable='$contenteditable' _var_", $this->get_tag()));
        return $this;
    }

    public function data(string $data_sufix, string $value)
    {
        $this->set_tag(str_replace('_var_', "data-$data_sufix='$value' _var_", $this->get_tag()));
        return $this;
    }

    public function dir(string $dir)
    {
        if ($dir != 'ltr' and $dir != 'rtl' and $dir != 'auto') {

            die('Error! Value invalid');
        }

        $this->set_tag(str_replace('_var_', "dir='$dir' _var_", $this->get_tag()));
        return $this;
    }

    public function draggable(string $draggable)
    {
        if ($draggable != 'true' and $draggable != 'false' and $draggable != 'auto') {

            die('Error! Draggable attribute must be "true", "false" or "auto".');
        }

        $this->set_tag(str_replace('_var_', "draggable='$draggable' _var_", $this->get_tag()));
        return $this;
    }

    public function hidden()
    {
        $this->set_tag(str_replace('_var_', "_var_ hidden", $this->get_tag()));
        return $this;
    }

    public function id(string $id)
    {
        if (strpos($id, ' ')) {

            die('Error! Id attribute contain a space character.');
        }

        $this->set_tag(str_replace('_var_', "id='$id' _var_", $this->get_tag()));
        return $this;
    }

    public function lang(string $lang = 'en')
    {
        $this->set_tag(str_replace('_var_', "lang='$lang' _var_", $this->get_tag()));
        return $this;
    }

    public function spellcheck(string $spellcheck)
    {
        if ($spellcheck != 'true' and $spellcheck != 'false') {

            die('Error! Spellcheck attribute must be "true" or "false".');
        }

        $this->set_tag(str_replace('_var_', "spellcheck='$spellcheck' _var_", $this->get_tag()));
        return $this;
    }

    public function style(string $css)
    {
        $this->set_tag(str_replace('_var_', "style='$css' _var_", $this->get_tag()));
        return $this;
    }

    public function tabindex(int $tabindex)
    {
        if ($tabindex < 1) {

            die('Error! Tabindex attribute must be greater or equal to 1.');
        }

        $this->set_tag(str_replace('_var_', "tabindex='$tabindex' _var_", $this->get_tag()));
        return $this;
    }

    public function title(string $title)
    {
        $this->set_tag(str_replace('_var_', "title='$title' _var_", $this->get_tag()));
        return $this;
    }

    public function translate(string $translate)
    {
        if ($translate != 'yes' and $translate != 'no') {

            die('Error! Translate attribute must be "yes" or "no".');
        }

        $this->set_tag(str_replace('_var_', "translate='$translate' _var_", $this->get_tag()));
        return $this;
    }

    /**
     * FUNÇÕES PARA OS ATRIBUTOS NÃO GLOBAIS!
     * 
     * 
     * 
     * 
     */

    protected function href(string $href)
    {
        $this->set_tag(str_replace('_var_', "href='$href' _var_", $this->get_tag()));
    }

    protected function media(string $media)
    {
        $this->set_tag(str_replace('_var_', "media='$media' _var_", $this->get_tag()));
    }

    protected function rel(string $rel)
    {
        $this->set_tag(str_replace('_var_', "rel='$rel' _var_", $this->get_tag()));
    }

    protected function type(string $type)
    {
        $this->set_tag(str_replace('_var_', "type='$type' _var_", $this->get_tag()));
    }
}
