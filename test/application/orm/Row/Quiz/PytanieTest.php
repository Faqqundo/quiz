<?php

namespace Row\Quiz;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-12-14 at 22:24:37.
 */
class PytanieTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Pytanie
     */
    protected $object;


    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = \Table\Quiz\Pytania::getInstance()->find(1)->current();

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {

    }

    
    /**
     * @covers \Row\Quiz\Pytanie::getOdpowiedzi()
     */
    public function testGetOdpowiedzi() {
        $odpowiedzi = $this->object->getOdpowiedzi();
        
        $this->assertCount(3, $odpowiedzi);
        $this->assertInstanceOf(\Row\Quiz\Pytanie\Odpowiedz::class, $odpowiedzi[0]);
        $this->assertEquals(1, $odpowiedzi[0]->id);
        $this->assertEquals(1, $odpowiedzi[0]->id_pytania);
        $this->assertEquals(1, $odpowiedzi[0]->wartosc);
    }

    public function testWlasnosci() {
        $this->assertEquals(1, $this->object->id);
        $this->assertEquals(1, $this->object->id_quizu);
        $this->assertInternalType('string', $this->object->tresc);
    }
}