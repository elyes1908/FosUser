<?php

namespace CoursBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CoursControllerTest extends WebTestCase
{
    public function testAjoutercours()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/AjouterCours');
    }

    public function testAffichercours()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/AfficherCours');
    }

    public function testModifiercours()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ModifierCours');
    }

    public function testSupprimercours()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/SupprimerCours');
    }

}
