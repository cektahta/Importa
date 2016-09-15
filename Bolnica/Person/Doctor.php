<?php
namespace Person;
class Doctor extends Person
{
    public function __construct($name, $lastName)
    {
        parent::__construct($name, $lastName);
    }

    public function getType()
    {
        return Person::DOCTOR;
    }
}