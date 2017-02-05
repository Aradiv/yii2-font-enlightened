<?php
namespace aradiv\fontenlightened;

class AssetBundle extends \yii\web\AssetBundle
{
    public $sourcePath = '@vendor/aradiv/font-enlightened/';
    public $css = [
        'styles.css'
    ];

    /**
     * Initializes the bundle.
     * Set publish options to copy only necessary files (in this case css and font folders)
     */
    public function init()
    {
        parent::init();
        $this->publishOptions['beforeCopy'] = function ($from, $to) {
            return preg_match('%(/|\\\\)(fonts|css)%', $from);
        };
    }
}