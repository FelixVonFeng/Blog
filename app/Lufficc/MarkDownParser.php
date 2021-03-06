<?php


namespace Lufficc;

use League\HTMLToMarkdown\HtmlConverter;
use Parsedown;

class MarkDownParser
{
    protected $parseDown;
    protected $htmlConverter;

    /**
     * MarkDownParser constructor.
     */
    public function __construct()
    {
        $this->parseDown = new Parsedown();
        $this->htmlConverter = new HtmlConverter();
    }

    public function html2md($html)
    {
        return $this->htmlConverter->convert($html);
    }

    public function parse($markdown, $clean = true)
    {
        $convertedHtml = $this->parseDown->setBreaksEnabled(true)->text($markdown);
        if ($clean) {
            $convertedHtml = clean($convertedHtml, 'user_comment_content');
        }
        return $convertedHtml;
    }
}