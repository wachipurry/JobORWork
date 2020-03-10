<?php

namespace App\DataFixtures;

use App\Entity\Candidat;
use App\Entity\Empresa;
use App\Entity\Oferta;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i=0;$i<10;$i++){
            $empl1=new Empresa();
            $empl1->setCorreu("a".$i."@inspedralbes.cat")->setLogo("logo".$i.".png")->setTipus("tecnològica")->setNom("Tecno".$i."Com");
            $manager->persist($empl1);
            $of1= new Oferta();
            $of1->setDataPub(new DateTime())->setDescripcio("desenvolupador".$i)->setTitol("Super Jefazo".$i)->setOfertaEmpresa($empl1);
            $manager->persist($of1);
            $can= new Candidat();
            $can->setNom("Candidat".$i)->setCognoms("Persona".$i)->setTelefon("+32".$i.$i.$i.$i.$i.$i.$i.$i.$i)->setEstudis("DAM")->setOferta($of1);
            $manager->persist($can);
        }



        $manager->flush();
    }
}
