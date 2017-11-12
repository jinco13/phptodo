<?php

namespace MyTodo;

class TodoTest extends \PHPUnit\Framework\TestCase
{
    public function setUp() {
        $this->target = new Todo();
    }

    public function testTargetNotNull() {
        $this->assertNotNull($this->target);
    }

    public function testTodoHasEmptyTitleAtStart() {
      $this->assertEmpty($this->target->title);
    }

    public function testTodoHasIncompleteStatus() {
      $this->assertFalse($this->target->completed);
    }

    public function testTodoCompleteWhenDone() {
      $this->target->done();
      $this->assertTrue($this->target->completed);
    }
}
