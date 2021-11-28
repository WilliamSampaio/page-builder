<?php

namespace WilliamSampaio\PageBuilder;

abstract class Element
{
    protected string $openTag;
    protected array $innerElements;
    protected string $closeTag;
    protected string $output;

    /**
     * Método construtor
     */
    public function __construct($innerElements = [])
    {
        // Inicializa a variavel
        $this->innerElements = $innerElements;
        $this->output = '';
    }

    /**
     * Função que prepara todos os elementos em uma só string
     */
    public function prepare()
    {
        $this->output .= $this->openTag;

        if (!empty($this->innerElements)) {

            foreach ($this->innerElements as $element) {

                if ($element instanceof Element) {

                    $this->output .= $element->prepare();
                } else {

                    $this->output .= $element;
                }
            }
        }

        return $this->output .= $this->closeTag;
    }

    /**
     * Função que "renderiza" o html ^^
     */
    public function detonate()
    {
        echo str_replace('_var_', '', $this->prepare());
    }

    /**
     * Adiciona um novo elemento filho
     */
    public function addChildElement($element)
    {
        $this->innerElement[] = $element;
        return $this;
    }

    /**
     * Adiciona novos elementos filho
     */
    public function addChildElements($elements = [])
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

    /**
     * Retorna todos os elementos filho
     */
    public function getChildElements()
    {
        return $this->innerElement;
    }


    public function getChildElementByTag(string $tag)
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

    /**
     * Busca um elemento no qual tem o id correspondente
     */
    public function getChildElementById(string $id)
    {

        if (!empty($this->innerElements)) {

            foreach ($this->innerElements as $element) {

                if (str_contains($element->openTag, "id=$id")) {

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

    /**
     * Busca os elementos no qual tem o atributo correspondente
     */
    public function getChildElementByAttribute(string $attribute)
    {

        if (!empty($this->innerElements)) {

            foreach ($this->innerElements as $element) {

                if (str_contains($element->openTag, "attribute=$attribute")) {

                    return $element;
                } else {

                    $element->getChildElementByAttribute($attribute);
                }
            }


            die('Error! Tag not found.');
        } else {

            die('Error! No child element found.');
        }
    }

    /**
     * Define um atributo da tag html, no parametro $key passa-se o nome do atributo,
     * e no parametro $value o valor
     */
    public function setAttribute(string $key, string $value)
    {
        $this->openTag = str_replace('_var_', "$key='$value' _var_", $this->openTag);
        return $this;
    }

    /**
     * Define varios atributos de uma só vez. Passa-se um array em cada valor
     * tem uma chave e valor correspondente
     */
    public function setAttributes(array $atributes = ['key' => 'value'])
    {
        foreach ($atributes as $key => $value) {

            $this->openTag = str_replace('_var_', "$key='$value' _var_", $this->openTag);
        }

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

        $this->openTag = str_replace('_var_', "accesskey='$accesskey' _var_", $this->openTag);
        return $this;
    }

    public function class(string $class)
    {
        $this->openTag = str_replace('_var_', "class='$class' _var_", $this->openTag);
        return $this;
    }

    public function contenteditable(string $contenteditable)
    {
        if ($contenteditable != 'true' and $contenteditable != 'false') {

            die('Error! Contenteditable attribute must be "true" or "false".');
        }

        $this->openTag = str_replace('_var_', "contenteditable='$contenteditable' _var_", $this->openTag);
        return $this;
    }

    public function data(string $data_sufix, string $value)
    {
        $this->openTag = str_replace('_var_', "data-$data_sufix='$value' _var_", $this->openTag);
        return $this;
    }

    public function dir(string $dir)
    {
        if ($dir != 'ltr' and $dir != 'rtl' and $dir != 'auto') {

            die('Error! Value invalid');
        }

        $this->openTag = str_replace('_var_', "dir='$dir' _var_", $this->openTag);
        return $this;
    }

    public function draggable(string $draggable)
    {
        if ($draggable != 'true' and $draggable != 'false' and $draggable != 'auto') {

            die('Error! Draggable attribute must be "true", "false" or "auto".');
        }

        $this->openTag = str_replace('_var_', "draggable='$draggable' _var_", $this->openTag);
        return $this;
    }

    public function hidden()
    {
        $this->openTag = str_replace('_var_', "_var_ hidden", $this->openTag);
        return $this;
    }

    public function id(string $id)
    {
        if (strpos($id, ' ')) {

            die('Error! Id attribute contain a space character.');
        }

        $this->openTag = str_replace('_var_', "id='$id' _var_", $this->openTag);
        return $this;
    }

    public function lang(string $lang = 'en')
    {
        $this->openTag = str_replace('_var_', "lang='$lang' _var_", $this->openTag);
        return $this;
    }

    public function spellcheck(string $spellcheck)
    {
        if ($spellcheck != 'true' and $spellcheck != 'false') {

            die('Error! Spellcheck attribute must be "true" or "false".');
        }

        $this->openTag = str_replace('_var_', "spellcheck='$spellcheck' _var_", $this->openTag);
        return $this;
    }

    public function style(string $css)
    {
        $this->openTag = str_replace('_var_', "style='$css' _var_", $this->openTag);
        return $this;
    }

    public function tabindex(int $tabindex)
    {
        if ($tabindex < 1) {

            die('Error! Tabindex attribute must be greater or equal to 1.');
        }

        $this->openTag = str_replace('_var_', "tabindex='$tabindex' _var_", $this->openTag);
        return $this;
    }

    public function title(string $title)
    {
        $this->openTag = str_replace('_var_', "title='$title' _var_", $this->openTag);
        return $this;
    }

    public function translate(string $translate)
    {
        if ($translate != 'yes' and $translate != 'no') {

            die('Error! Translate attribute must be "yes" or "no".');
        }

        $this->openTag = str_replace('_var_', "translate='$translate' _var_", $this->openTag);
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
        $this->openTag = str_replace('_var_', "href='$href' _var_", $this->openTag);
    }

    protected function media(string $media)
    {
        $this->openTag = str_replace('_var_', "media='$media' _var_", $this->openTag);
    }

    protected function rel(string $rel)
    {
        $this->openTag = str_replace('_var_', "rel='$rel' _var_", $this->openTag);
    }

    protected function type(string $type)
    {
        $this->openTag = str_replace('_var_', "type='$type' _var_", $this->openTag);
    }
}
