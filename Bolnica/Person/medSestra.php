<?php
namespace Person;

class medSestra extends Person
{
    public function __construct($name, $lastName)
    {
        parent::__construct($name, $lastName);
    }

    public function getType()
    {
        return Person::MEDSESTRA;
    }
}