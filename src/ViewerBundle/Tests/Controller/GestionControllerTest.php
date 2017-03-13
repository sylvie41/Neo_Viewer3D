<?php

namespace ViewerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GestionControllerTest extends WebTestCase
{
    public function testIndexcabinet()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/indexCabinet');
    }

}
