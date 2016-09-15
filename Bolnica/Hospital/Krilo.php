<?php
namespace Hospital;
use Person\Person;

abstract class Krilo
{
    protected $rooms;

    public function __construct($name)
    {
        $this->patients = [];
        $this->rooms = [];
    }

    public function addRooms(Room $room1, Room $room2)
    {

        if (count($this->rooms) < 10) {
            $this->rooms[] = $room1;
            $this->rooms[] = $room2;
        } else {
            throw new \Exception('There can be only 10 rooms in the wing');
        }
    }

    public function oneDay($name,$doctor,$medsestra)
    {
        if ($name == 'Ortopediq') {

        }

        if ($name instanceof Virusologiq){

        }
        if ($name instanceof Kardiologiq){

        }
    }
}

