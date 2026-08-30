<?php

namespace App\Tests\Entity;

use App\Entity\PriseMedicament;
use PHPUnit\Framework\TestCase;

class PriseMedicamentTest extends TestCase
{
    public function testUneNouvellePriseNestPasEffectuee(): void
    {
        $prise = new PriseMedicament();

        // Par défaut, une prise n'est pas encore effectuée
        $this->assertFalse($prise->isEffectuee());
    }

    public function testOnPeutMarquerUnePriseCommeEffectuee(): void
    {
        $prise = new PriseMedicament();

        $prise->setEffectuee(true);
        $this->assertTrue($prise->isEffectuee());

        // Et revenir en arrière
        $prise->setEffectuee(false);
        $this->assertFalse($prise->isEffectuee());
    }

    public function testLeNombreDeComprimesEstBienEnregistre(): void
    {
        $prise = new PriseMedicament();

        $prise->setNombresComprimes(2);
        $this->assertSame(2, $prise->getNombresComprimes());
    }
}