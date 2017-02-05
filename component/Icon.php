<?php
/**
 * Icon.php
 * Modified version from Revin Roman
 * @link https://github.com/rmrevin/yii2-fontawesome/blob/master/component/Icon.php
 * @author Eric Brüggemann
 */
namespace aradiv\fontenlightened\component;

use aradiv\fontenlightened\FE;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
/**
 * Class Icon
 * @package rmrevin\yii\fontawesome\component
 */
class Icon
{
    /**
     * @deprecated
     * @var string
     */
    public static $defaultTag = 'i';
    /**
     * @deprecated
     * @var string
     */
    private $tag;
    /**
     * @var array
     */
    private $options = [];
    /**
     * @param string $name
     * @param array $options
     */
    public function __construct($name, $options = [])
    {
        Html::addCssClass($options, FE::$cssPrefix);
        if (!empty($name)) {
            Html::addCssClass($options, FE::$cssPrefix . '-' . $name);
        }
        $this->options = $options;
    }
    /**
     * @return string
     */
    public function __toString()
    {
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'i');
        return Html::tag($tag, null, $options);
    }
    /**
     * @return self
     */
    public function inverse()
    {
        return $this->addCssClass(FE::$cssPrefix . '-inverse');
    }
    /**
     * @return self
     */
    public function spin()
    {
        return $this->addCssClass(FE::$cssPrefix . '-spin');
    }
    /**
     * @return self
     */
    public function fixedWidth()
    {
        return $this->addCssClass(FE::$cssPrefix . '-fw');
    }
    /**
     * @return self
     */
    public function li()
    {
        return $this->addCssClass(FE::$cssPrefix . '-li');
    }
    /**
     * @return self
     */
    public function border()
    {
        return $this->addCssClass(FE::$cssPrefix . '-border');
    }
    /**
     * @return self
     */
    public function pullLeft()
    {
        return $this->addCssClass(FE::$cssPrefix . '-pull-left');
    }
    /**
     * @return self
     */
    public function pullRight()
    {
        return $this->addCssClass(FE::$cssPrefix . '-pull-right');
    }
    /**
     * @param string $value
     * @return self
     * @throws \yii\base\InvalidConfigException
     */
    public function size($value)
    {
        return $this->addCssClass(
            FE::$cssPrefix . '-' . $value,
            in_array((string)$value, [FE::SIZE_LARGE, FE::SIZE_2X, FE::SIZE_3X, FE::SIZE_4X, FE::SIZE_5X], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FE::size()',
                'FE::SIZE_LARGE, FE::SIZE_2X, FE::SIZE_3X, FE::SIZE_4X, FE::SIZE_5X'
            )
        );
    }
    /**
     * @param string $value
     * @return self
     * @throws \yii\base\InvalidConfigException
     */
    public function rotate($value)
    {
        return $this->addCssClass(
            FE::$cssPrefix . '-rotate-' . $value,
            in_array((string)$value, [FE::ROTATE_90, FE::ROTATE_180, FE::ROTATE_270], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FE::rotate()',
                'FE::ROTATE_90, FE::ROTATE_180, FE::ROTATE_270'
            )
        );
    }
    /**
     * @param string $value
     * @return self
     * @throws \yii\base\InvalidConfigException
     */
    public function flip($value)
    {
        return $this->addCssClass(
            FE::$cssPrefix . '-flip-' . $value,
            in_array((string)$value, [FE::FLIP_HORIZONTAL, FE::FLIP_VERTICAL], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FE::flip()',
                'FE::FLIP_HORIZONTAL, FE::FLIP_VERTICAL'
            )
        );
    }
    /**
     * @deprecated
     * Change html tag.
     * @param string $tag
     * @return static
     * @throws \yii\base\InvalidParamException
     */
    public function tag($tag)
    {
        $this->tag = $tag;
        $this->options['tag'] = $tag;
        return $this;
    }
    /**
     * @param string $class
     * @param bool $condition
     * @param string|bool $throw
     * @return \rmrevin\yii\fontawesome\component\Icon
     * @throws \yii\base\InvalidConfigException
     * @codeCoverageIgnore
     */
    public function addCssClass($class, $condition = true, $throw = false)
    {
        if ($condition === false) {
            if (!empty($throw)) {
                $message = !is_string($throw)
                    ? 'Condition is false'
                    : $throw;
                throw new \yii\base\InvalidConfigException($message);
            }
        } else {
            Html::addCssClass($this->options, $class);
        }
        return $this;
    }
    /**
     * @deprecated
     * @param string|null $tag
     * @param string|null $content
     * @param array $options
     * @return string
     */
    public function render($tag = null, $content = null, $options = [])
    {
        $tag = empty($tag)
            ? (empty($this->tag) ? static::$defaultTag : $this->tag)
            : $tag;
        $options = array_merge($this->options, $options);
        return Html::tag($tag, $content, $options);
    }
}