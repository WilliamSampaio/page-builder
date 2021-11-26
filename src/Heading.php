<?php

namespace WilliamSampaio\PageBuilder;

class Heading extends Element
{
    public function __construct(string $text, int $level = 1)
    {
        if ($level <= 6 and $level >= 1) {

            $this->tag = "h$level";

            $this->openTag = "<h$level _var_>$text";
            $this->closeTag = "</h$level>";
        } else {
            die('Heading Error! Level out of range, 1 than 6.');
        }
    }

    public function style(string $css)
    {
        $this->openTag = str_replace('_var_', "style='$css' _var_", $this->openTag);
        return $this;
    }
}
