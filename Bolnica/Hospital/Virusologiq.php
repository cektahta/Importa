<?php
namespace Hospital;
use Person\Person;
use Person\medSestra;
use Person\Doctor;
class Virusologiq extends Krilo
{

    protected $patients;
    protected $doctor;
    protected $medSestra;
    public function __construct($name)
    {
        parent::__construct($name);
        $this->patients = [];
    }
    public function addPatients ($patient)
    {
        if ($patient->getDiagnozaType()== 'virus'){
            $this->patients[] = $patient;
            echo sprintf('Pacient %s %s e priet s diagnoza: %s .Lekuvasht lekar - %s %s ',
                $patient->getName(),
                $patient->getLastName(),
                $patient->getDiagnozaType(),
                $this->doctor->getName(),
                $this->doctor->getLastName()
            );
        } else {
            throw new \Exception('Diagnostic must be of virus type');
        }
    }
    public function addMedSestra(medSestra $medSestra){
        $this->medSestra = $medSestra;
    }

    public function getDoctor()
    {
        return $this->doctor;
    }

    public function getMedSestra()
    {
        return $this->medSestra;
    }

    public function getPatients(){
        return $this->patients;
    }
    public function addDoctor(Doctor $doctor){
        $this->doctor = $doctor;
    }

}