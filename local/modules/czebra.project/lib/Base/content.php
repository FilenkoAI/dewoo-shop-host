<?php
namespace Czebra\Project\Base;

class Content
{
    public function DeleteJSType(&$content)
    {
        $content = str_replace(" type=\"text/javascript\"", false, $content);
    }
}