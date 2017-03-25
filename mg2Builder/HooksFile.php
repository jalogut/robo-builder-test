<?php

/**
 * HookFile
 *
 * @copyright Copyright © 2017 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */
class HooksFile extends \Robo\Tasks
{

    public function install(\Robo\Collection\Collection $collection)
    {
        $collection->after('first', $this->taskExec('echo after first'));
        $collection->after('third', $this->taskExec('echo before fourth'));
    }
}