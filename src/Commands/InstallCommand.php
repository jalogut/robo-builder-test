<?php
/**
 * InstallCommand
 *
 * @copyright Copyright © 2017 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace Staempfli\MagentoBuilder\Commands;


use Staempfli\MagentoBuilder\Helper\HooksHelper;

class InstallCommand extends \Robo\Tasks
{
    protected $hooksHelper;

    public function __construct()
    {
        $this->hooksHelper = new HooksHelper();
    }

    public function install()
    {
        $this->say('Let\'s install Magento');

        $this->say('Calling Hook');
        $collectionBuilder = $this->collectionBuilder();
        $collection = $collectionBuilder->getCollection();
        $collection->add($this->taskExec('echo 1'), 'first')
            ->add($this->taskExec('echo 2'), 'second')
            ->add($this->taskExec('echo 3'), 'third')
            ->add($this->taskExec('echo 4'), 'fourth')
            ->add($this->taskExec('echo 5'), 'fifth');

        $this->hooksHelper->callHook('install', $this->getBuilder(), $collection);

        $collectionBuilder->run();
    }
}