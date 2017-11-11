<?php

namespace MyApp;

class ModelTest extends \PHPUnit\Framework\TestCase
{
    public function setUp() {
        $this->target = new Model();
    }

    public function testTargetNotNull() {
        $this->assertNull($this->target);
    }
}
