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

use yii\base\Exception;

/**
 * @author    TrendyMinds
 * @package   Molecule
 * @since     1.0.0
 */
class MoleculeService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * Gets the named component and populates the template with the variables passed to it
     *
     * @param string $componentName
     * @param array $componentVariables
     * @return void
     */
    public function getComponent(string $componentName, array $componentVariables = [])
    {
        $filePath = "{$componentName}/index.twig";

        if (strpos($componentName, "/") > 0) {
            $filePath = "{$componentName}.twig";
        }

        $fullFile = Molecule::$plugin->settings->pathComponent . $filePath;

        if (!is_readable($fullFile)) {
            throw new Exception("Your requested component at {$fullFile} could not be found.");
        }

        $source = file_get_contents($fullFile);
        $rendered = Craft::$app->view->renderString($source, $componentVariables);

        return Template::raw($rendered);
    }

    /**
     * Gets the raw SVG data for a given icon file
     *
     * @param string $iconName
     * @param array $iconVariables
     * @return void
     */
    public function getIcon(string $iconName, array $iconVariables = [])
    {
        $iconPath = Molecule::$plugin->settings->pathIcon . $iconName . '.svg';

        if (!is_readable($iconPath)) {
            throw new Exception("Your requested icon at {$iconPath} could not be found.");
        }

        $addtClasses = " Icon--{$iconName}";

        if (array_key_exists('class', $iconVariables)) {
            $addtClasses .= ' ' . $iconVariables['class'];
        }

        $rawIcon = file_get_contents($iconPath);

        return Template::raw(
            "<span class=\"Icon{$addtClasses}\">{$rawIcon}</span>"
        );
    }
}
