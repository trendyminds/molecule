<?php
/**
 * Molecule plugin for Craft CMS 3.x
 *
 * Grab Twig components from outside the primary template folder
 *
 * @link      https://trendyminds.com
 * @copyright Copyright (c) 2018 TrendyMinds
 */

namespace trendyminds\molecule\models;

use trendyminds\molecule\Molecule;

use Craft;
use craft\base\Model;

/**
 * @author    TrendyMinds
 * @package   Molecule
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $pathComponent = '../assets/components/';
    public $pathIcon = '../assets/components/Icon/images/';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['pathComponent', 'string'],
            ['pathComponent', 'default', 'value' => '../assets/components/'],
            ['pathIcon', 'string'],
            ['pathIcon', 'default', 'value' => '../assets/components/Icon/images/'],
        ];
    }
}
