<?php

namespace Hospital;
class Room
{
    protected $legla;
    protected $numberz;

    public function __construct($numberz)
    {
        $this->numberz = $numberz;
        $this->legla = [];
    }

    public function addLegla(Leglo $leglo1,Leglo $leglo2,Leglo $leglo3)
    {

        if (count($this->legla)< 3){
            $this->legla[] = $leglo1;
            $this->legla[] = $leglo2;
            $this->legla[] = $leglo3;

        } else {
            throw new \Exception('There can be only 3 beds in the room');
        }

    }

    public function getLegla()
    {
        return $this->legla;
    }
    public function getNumberz()
    {
        return $this->numberz;
    }


}