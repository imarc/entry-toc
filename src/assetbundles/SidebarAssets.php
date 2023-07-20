<?php
/**
 * Entry TOC plugin
 *
 * @author Linnea Hartsuyker <engineering@imarc.com>
 * @copyright Linnea Hartsuyker
 * @license MIT
 */

namespace imarc\craftentrytoc\assetbundles;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class SidebarAssets extends AssetBundle
{
    public function init()
    {
        $this->sourcePath = "@imarc/craftentrytoc/assetbundles/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/SidebarJs.js',
        ];

        $this->css = [
            'css/SidebarCss.css',
        ];

        parent::init();
    }
}

