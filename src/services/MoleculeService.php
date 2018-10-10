<?php
/**
 * Molecule plugin for Craft CMS 3.x
 *
 * Grab Twig components from outside the primary template folder
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2018 TrendyMinds
 */

namespace trendyminds\molecule\services;

use trendyminds\molecule\Molecule;

use Craft;
use craft\base\Component;
use craft\helpers\Template;

/**
 * @author    TrendyMinds
 * @package   Molecule
 * @since     1.0.0
 */
class MoleculeService extends Component
{
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function get($file, array $vars = [])
    {
        if (strpos($file, '/') > 0) {
            $filePath = $file . '.twig';
        } else {
            $filePath = $file . '/index.twig';
        }

        $fullFile = Molecule::$plugin->settings->pathComponent . $filePath;

        if (is_readable($fullFile)) {
            $source = file_get_contents($fullFile);
            $rendered = \Craft::$app->view->renderString($source, $vars);
            return Template::raw($rendered);
        } else {
            return $file . " could not be found or is unreadable.";
        }
    }

    /*
     * @return mixed
     */
    public function icon($name, array $vars = [])
    {
        $file = Molecule::$plugin->settings->pathIcon . $name . '.svg';

        if (is_readable($file)) {
            $addtClasses = " Icon--" . $name;

            if (array_key_exists('class', $vars)) {
                $addtClasses .= ' ' . $vars['class'];
            }

            $source = file_get_contents($file);
            $icon = '';
            $icon .= '<span class="Icon' . $addtClasses . '">';
            $icon .= $source;
            $icon .= '</span>';

            return Template::raw($icon);
        }
    }
}
