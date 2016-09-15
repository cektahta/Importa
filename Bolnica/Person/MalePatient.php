<?php
namespace Person;
class MalePatient extends Person
{
    protected $diagnoza;
    public function __construct($name, $lastName,$diagnoza)
    {
        parent::__construct($name, $lastName);
        $this->diagnoza = $diagnoza;
    }

    public function getType(){
        return Person::MALE_GENDER;
    }
    public function getDiagnozaType()
    {
        return $this->diagnoza;
    }
}