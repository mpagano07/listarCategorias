<?php

require_once('./vendor/autoload.php');
require('./Drone.php');

use PHPUnit\Framework\TestCase;

final class DroneTest extends TestCase
{
    /**
     * @return Drone
     */
    public function crearDrone()
    {
        $drone = new Drone(100);
        return $drone;
    }
    public function testExistsDrone()
    {
        $this->assertTrue(class_exists("Drone"));
    }

    public function testBateriaPosicionInicial()
    {
        $drone = $this->crearDrone();
        $this->assertEquals(100,$drone->cantidadDeBateria());
    }
    public function testGastaBateria()
    {
        $drone = $this->crearDrone();
        $drone->mover(2,1);
        $drone->mover(2,3);
        $drone->mover(2,5);
        $drone->mover(10,5);
        $this->assertEquals(85,$drone->cantidadDeBateria());
    }
    public function testBateriaCargaEnPosicionCero()
    {
        $drone = $this->crearDrone();
        $drone->mover(2,1);
        $drone->mover(2,3);
        $drone->mover(2,5);
        $drone->mover(10,5);
        $drone->mover(0,0);
        $this->assertEquals(100,$drone->cantidadDeBateria());
    }
    // public function testHistorial()
    // {
    //     $drone = $this->crearDrone();                               <-------------ARREGLAR!variable
    //     $drone->mover(2,1);
    //     $this->assertEquals(true,$drone->historial());
    // }
}
