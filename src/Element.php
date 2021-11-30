<?php

namespace WilliamSampaio\PageBuilder;

class Element
{
    /**
     * GLOBAL ATTRIBUTES
     */
    const GLOBAL_ATTR_ACCESSKEY = 'accesskey';
    const GLOBAL_ATTR_CLASS = 'class';
    const GLOBAL_ATTR_CONTENTEDITABLE = 'contenteditable';
    const GLOBAL_ATTR_DATA = 'data';
    const GLOBAL_ATTR_DIR = 'dir';
    const GLOBAL_ATTR_DRAGGABLE = 'draggable';
    const GLOBAL_ATTR_HIDDEN = 'hidden';
    const GLOBAL_ATTR_ID = 'id';
    const GLOBAL_ATTR_LANG = 'lang';
    const GLOBAL_ATTR_SPELLCHECK = 'spellcheck';
    const GLOBAL_ATTR_STYLE = 'style';
    const GLOBAL_ATTR_TABINDEX = 'tabindex';
    const GLOBAL_ATTR_TITLE = 'title';
    const GLOBAL_ATTR_TRANSLATE = 'translate';

    /**
     * OTHER ATTRIBUTES
     */
    const ATTR_HREF = 'href';
    const ATTR_MEDIA = 'media';
    const ATTR_REL = 'rel';
    const ATTR_SRC = 'src';
    const ATTR_TYPE = 'type';

    /**
     * CONSTANT - ATTRIBUTES VALUES
     */
    const VALUE_TRUE = 'true';
    const VALUE_FALSE = 'false';
    const VALUE_AUTO = 'auto';

    /**
     * LANG CONSTANTS
     */
    const LANG_ENGLISH = 'en';
    const LANG_PORTUGUEASE_BR = 'pt-br';

    /**
     * TYPE CONSTANTS
     */
    const TYPE_CSS = 'text/css';

    /**
     * BODY ELEMENT
     */
    public static function body($attributes = [], $innerElements = [])
    {
        return '<body ' . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . '</body>';
    }

    /**
     * BR ELEMENT
     */
    public static function br($attributes = [])
    {
        return '<br ' . self::process_attributes($attributes) . '>';
    }

    /**
     * DIV ELEMENT
     */
    public static function div($attributes = [], $innerElements = [])
    {
        return '<div ' . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . '</div>';
    }

    /**
     * HEADING ELEMENTS
     */
    public static function h1($attributes = [], $innerElements = [])
    {
        return "<h1 " . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . "</h1>";
    }

    public static function h2($attributes = [], $innerElements = [])
    {
        return "<h2 " . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . "</h2>";
    }

    public static function h3($attributes = [], $innerElements = [])
    {
        return "<h3 " . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . "</h3>";
    }

    public static function h4($attributes = [], $innerElements = [])
    {
        return "<h4 " . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . "</h4>";
    }

    public static function h5($attributes = [], $innerElements = [])
    {
        return "<h5 " . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . "</h5>";
    }

    public static function h6($attributes = [], $innerElements = [])
    {
        return "<h6 " . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . "</h6>";
    }

    /**
     * HEAD ELEMENT
     */
    public static function head($innerElements = [])
    {
        return '<head>' . self::process_elements($innerElements) . '</head>';
    }

    /**
     * HR ELEMENT
     */
    public static function hr($attributes = [])
    {
        return '<hr ' . self::process_attributes($attributes) . '>';
    }

    /**
     * HTML ELEMENT
     */
    public static function html($attributes = [], $innerElements = []): string
    {
        return '<html ' . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . '</html>';
    }

    /**
     * IMG ELEMENT
     */
    public static function img($attributes = []): string
    {
        return '<img ' . self::process_attributes($attributes) . '>';
    }

    /**
     * LINK ELEMENT
     */
    public static function link($attributes = []): string
    {
        return '<link ' . self::process_attributes($attributes) . '>';
    }

    /**
     * PARAGRAPH ELEMENT
     */
    public static function p($attributes = [], $innerElements = [])
    {
        return '<p ' . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . '</p>';
    }

    /**
     * STYLE ELEMENT
     */
    public static function style($attributes = [], $innerElements = [])
    {
        return '<style ' . self::process_attributes($attributes) . '>' . self::process_elements($innerElements) . '</style>';
    }

    /**
     * TITLE ELEMENT
     */
    public static function title(string $title): string
    {
        return '<title>' . $title . '</title>';
    }

    /**
     * INTERNAL PROCESSES
     */
    private static function process_attributes(array $attributes): string
    {
        $attributes_processed = '';
        foreach ($attributes as $key => $value) {
            $attributes_processed .= $key . "='" . $value . "' ";
        }
        return $attributes_processed;
    }

    private static function process_elements(array $elements): string
    {
        $elements_processed = '';
        foreach ($elements as $element) {
            $elements_processed .= $element;
        }
        return $elements_processed;
    }
}
