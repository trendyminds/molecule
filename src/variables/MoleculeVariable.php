<?php
/**
 * Molecule plugin for Craft CMS 3.x
 *
 * Grab Twig components from outside the primary template folder
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2018 TrendyMinds
 */

namespace trendyminds\molecule\variables;

use trendyminds\molecule\Molecule;

use Craft;

/**
 * @author    TrendyMinds
 * @package   Molecule
 * @since     1.0.0
 */
class MoleculeVariable
{
    // Public Methods
    // =========================================================================

    public function get($file, array $vars = [])
    {
        return Molecule::$plugin->moleculeService->get($file, $vars);
    }

    public function icon($name, array $vars = [])
    {
        return Molecule::$plugin->moleculeService->icon($name, $vars);
    }
}
