<?php

namespace Table;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-12-14 at 22:24:37.
 */
class QuizTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Quiz
     */
    protected $object;


    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new Quiz;

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    
    /**
     * @covers \Table\Quiz::listaAktywnych()
     */
    public function testListaAktywnych() {
        $lista = $this->object->listaAktywnych();
        
        $this->assertCount(1, $lista);
        $this->assertInstanceOf(\Row\Quiz::class, $lista[0]);
        $this->assertEquals(1, $lista[0]->id);
    }

    /**
     * @covers Table\Quiz::getInstance
     * @covers \Table\Quiz::__construct
     */
    public function testGetInstance() {
        QuizHelper::resetInstance();

        $quiz = \Table\Quiz::getInstance();

        $this->assertInstanceOf(\Table\Quiz::class, $this->object);
        $this->assertInstanceOf(\Table\Quiz::class, $quiz);

        $this->assertSame($quiz, \Table\Quiz::getInstance());
        $this->assertNotSame($quiz, $this->object);        
    }

}

class QuizHelper extends \Table\Quiz {
    public static function resetInstance() {
        static::$instance = null;
    }
}