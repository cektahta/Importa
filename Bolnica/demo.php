<?php

use Person\Person;
use Person\Doctor;
use Person\FemalePatient;
use Person\MalePatient;
use Person\medSestra;
use Hospital\Krilo;
use Hospital\Leglo;
use Hospital\Room;
use Hospital\Ortopediq;
use Hospital\Kardiologiq;
use Hospital\Virusologiq;


require_once 'autoload.php';
//Person related
$d1 = Person::factory('Ivan',Person::DOCTOR,'Ivanov',null);
$s1 = Person::factory('Penka',Person::MEDSESTRA,'Penkova',null);
$p1 = Person::factory('Gergi',Person::MALE_GENDER,'Georgiev','card');
$p2 = Person::factory('Gica',Person::FEMALE_GENDER,'Gicova','orto');
$p3 = Person::factory('Ivanka',Person::FEMALE_GENDER,'Ivanova','virus');

//Hospital related
$ortopediq = new Ortopediq('Ortopediq');
$kardiologiq = new Kardiologiq('Kardiologiq');
$virusologiq = new Virusologiq('Virusologiq');

$ortopediq->addDoctor($d1);
$kardiologiq->addDoctor($d1);
$kardiologiq->getDoctor();
$virusologiq->addDoctor($d1);
$virusologiq->addMedSestra($s1);
$ortopediq->addPatients($p2);
//$kardiologiq->addPatients($p1);
//$virusologiq->addPatients($p3);

//$virusologiq->getPatients();


$l1 = new Leglo(1);
$l2 = new Leglo(2);
$l3 = new Leglo(3);
$l4 = new Leglo(4);
$l5 = new Leglo(5);
$l6 = new Leglo(6);
$l7 = new Leglo(7);
$l8 = new Leglo(8);
$l9 = new Leglo(9);
$l10 = new Leglo(10);
$l11 = new Leglo(11);
$l12 = new Leglo(12);
$l13 = new Leglo(13);
$l14 = new Leglo(14);
$l15 = new Leglo(15);
$l16 = new Leglo(16);
$l17 = new Leglo(17);
$l18 = new Leglo(18);


$room1 = new Room(1);
$room1->addLegla($l1,$l2,$l3);
$room2 = new Room(2);
$room2->addLegla($l4,$l5,$l6);



$room3 = new Room(3);
$room3->addLegla($l7,$l8,$l9);
$room4 = new Room(4);
$room4->addLegla($l10,$l11,$l12);

$room5 = new Room(5);
$room5->addLegla($l13,$l14,$l14);
$room6 = new Room(6);
$room6->addLegla($l16,$l17,$l18);


$virusologiq->addRooms($room5,$room6);
$kardiologiq->addRooms($room3,$room4);
$ortopediq->addRooms($room1,$room2);

$ortopediq->oneDay('Ortopediq',$d1,$s1);








