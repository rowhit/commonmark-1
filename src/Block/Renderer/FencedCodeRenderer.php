<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on stmd.js
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Block\Renderer;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\HtmlRenderer;

class FencedCodeRenderer implements BlockRendererInterface
{
    /**
     * @param FencedCode $block
     * @param HtmlRenderer $htmlRenderer
     * @param bool $inTightList
     *
     * @return string
     */
    public function render(AbstractBlock $block, HtmlRenderer $htmlRenderer, $inTightList = false)
    {
        $infoWords = $block->getInfoWords();
        $attr = count($infoWords) === 0 || strlen(
            $infoWords[0]
        ) === 0 ? array() : array('class' => 'language-' . $htmlRenderer->escape($infoWords[0], true));

        return $htmlRenderer->inTags(
            'pre',
            array(),
            $htmlRenderer->inTags('code', $attr, $htmlRenderer->escape($block->getStringContent()))
        );
    }
}
