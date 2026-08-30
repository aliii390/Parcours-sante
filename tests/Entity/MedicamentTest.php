<?php

namespace App\Tests\Entity;

use App\Entity\Medicament;
use PHPUnit\Framework\TestCase;

class MedicamentTest extends TestCase
{
    public function testMedicamentEnCoursEstActif(): void
    {
        $medicament = new Medicament();
        $medicament->setDateDebut(new \DateTime('yesterday')); // a commencé hier
        $medicament->setDateFin(new \DateTime('tomorrow'));    // se termine demain

        // On s'attend à ce que le traitement soit actif
        $this->assertTrue($medicament->isActif());
    }

    public function testMedicamentPasEncoreCommenceEstInactif(): void
    {
        $medicament = new Medicament();
        $medicament->setDateDebut(new \DateTime('tomorrow'));   // commence demain
        $medicament->setDateFin(new \DateTime('+10 days'));

        $this->assertFalse($medicament->isActif());
    }

    public function testMedicamentTermineEstInactif(): void
    {
        $medicament = new Medicament();
        $medicament->setDateDebut(new \DateTime('-10 days'));
        $medicament->setDateFin(new \DateTime('yesterday'));    // s'est terminé hier

        $this->assertFalse($medicament->isActif());
    }

    public function testMedicamentQuiCommenceAujourdhuiEstActif(): void
    {
        $medicament = new Medicament();
        $medicament->setDateDebut(new \DateTime('today'));
        $medicament->setDateFin(new \DateTime('today'));

        $this->assertTrue($medicament->isActif());
    }
}