<?php

/*
 * This file is part of markocupic/contao-article-class-select.
 *
 * Copyright (c) 2005-2017 Marko Cupic
 *
 * @license LGPL-3.0+
 */

declare(strict_types=1);

namespace Markocupic\ContaoArticleClassSelectBundle\ContaoHooks;

use Contao\Template;

/**
 * Class ParseTemplate
 * @package Markocupic\ContaoArticleClassSelectBundle\ContaoHooks
 */
class ParseTemplate
{

    /**
     * @param Template $objTemplate
     */
    public function parseTemplate(Template $objTemplate): void
    {
        if (strpos($objTemplate->getName(), 'mod_article') !== false)
        {
            if (trim($objTemplate->backgroundClass) != '')
            {
                $strClass = trim($objTemplate->class) != '' ? trim($objTemplate->class) : '';
                $arrClasses = explode(' ', $strClass);
                $arrClasses[] = trim($objTemplate->backgroundClass);
                $arrClasses = array_unique($arrClasses);
                $arrClasses = array_filter($arrClasses);
                $objTemplate->class = implode(' ', $arrClasses);
            }
        }
    }
}