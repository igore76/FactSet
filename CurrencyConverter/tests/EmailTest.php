<?php
/**
 * @author      Igor Jankovic
 * @copyright   Copyright © 2019 Igor Jankovic. All rights reserved.
 */

require '../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{

    public function testCanBeCreatedFromValidEmailAddress()
    {

        $value = "bingo";
        $result = "bingo3";
        $this->assertEquals($value, $result, 'Normalize function did not passed');

    }

}








