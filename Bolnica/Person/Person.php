<?php
namespace Person;

abstract class Person
{
    const FEMALE_GENDER = 1;

    const MALE_GENDER = 2;

    const DOCTOR = 3;

    const MEDSESTRA = 4;

    protected $name;

    protected $lastName;

    public function __construct($name,$lastName)
    {
        $this->name = $name;

        $this->lastName = $lastName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public static function factory($name,$type,$lastName,$diagnoza){
        if ($type == self::FEMALE_GENDER) {
            return new FemalePatient($name,$lastName,$diagnoza);
        }
        if ($type == self::MALE_GENDER) {
            return new MalePatient($name,$lastName,$diagnoza);
        }
        if ($type == self::DOCTOR){
            return new Doctor($name,$lastName);
        }
        if ($type == self::MEDSESTRA){
            return new medSestra($name,$lastName);
        }
    }

    public function getDiseaseType($person){
        foreach ($person as $value){
            return $value->getDiagnozaType();
        }
    }
}