<?php

class test extends CDbTestCase
{
    public function setup(): void
    {
    }

    /**
     * @test
     */
    public function test(): void
    {
        $this->assertSame(1, 1);
    }
}