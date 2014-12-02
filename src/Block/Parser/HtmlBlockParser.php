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

namespace League\CommonMark\Block\Parser;

use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;
use League\CommonMark\Block\Element\HtmlBlock;
use League\CommonMark\Util\RegexHelper;

class HtmlBlockParser extends AbstractBlockParser
{
    /**
     * @param ContextInterface $context
     * @param Cursor $cursor
     *
     * @return bool
     */
    public function parse(ContextInterface $context, Cursor $cursor)
    {
        $match = RegexHelper::matchAt(RegexHelper::getInstance()->getHtmlBlockOpenRegex(), $cursor->getLine(), $cursor->getFirstNonSpacePosition());
        if ($match === null) {
            return false;
        }

        $context->addBlock(new HtmlBlock());
        $context->setBlocksParsed(true);

        return true;
    }
}
