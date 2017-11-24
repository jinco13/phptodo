<?php

class TodoTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->target = new Todo();
    }

    public function testCreatedDate()
    {
        $todo = new Todo(null, "MyTitle", FALSE);
        $todo->created_at = new DateTime('8/29/2011 11:16:12 AM');
        $this->assertEquals("2011/08/29", $todo->getCreatedDate());
    }

    public function testConstructWithTitle()
    {
        $todo = new Todo(null, "MyTitle", FALSE);
        $this->assertEquals("MyTitle", $todo->title);
    }

    public function testConstructWithCompleted()
    {
        $todo = new Todo(null, "MyTitle", TRUE);
        $this->assertEquals(TRUE, $todo->completed);
    }

    public function testTargetNotNull()
    {
        $this->assertNotNull($this->target);
    }

    public function testTodoHasEmptyTitleAtStart()
    {
      $this->assertEmpty($this->target->title);
    }

    public function testTodoHasIncompleteStatus()
    {
      $this->assertFalse($this->target->completed);
    }

    public function testTodoCompleteWhenDone()
    {
      $this->target->done();
      $this->assertTrue($this->target->completed);
    }
}
