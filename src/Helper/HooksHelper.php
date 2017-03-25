<?php
/**
 * HooksHelper
 *
 * @copyright Copyright © 2017 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace Staempfli\MagentoBuilder\Helper;

use Robo\Collection\Collection;
use Robo\Collection\CollectionBuilder;

class HooksHelper
{
    const HOOKS_FILENAME = 'HooksFile.php';

    /**
     * @var \Robo\Tasks
     */
    protected $hooks;

    public function __construct()
    {
        if (file_exists('mg2Builder/' . self::HOOKS_FILENAME)) {
            require_once 'mg2Builder/' . self::HOOKS_FILENAME;
            $this->hooks = new \HooksFile();
        }
    }

    public function callHook(string $hookName, CollectionBuilder $builder, Collection $collection)
    {
        if (!$this->hooks) {
            return;
        }
        $this->hooks->setBuilder($builder);
        if (is_callable([$this->hooks, $hookName])) {
            call_user_func([$this->hooks, $hookName], $collection);
        }
    }
}