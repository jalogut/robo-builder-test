<?php

/**
 * TestCommand
 *
 * @copyright Copyright © 2017 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */
class CommandFile extends \Robo\Tasks
{
    public function installAnother()
    {
        $this->say('Another install');
    }
}