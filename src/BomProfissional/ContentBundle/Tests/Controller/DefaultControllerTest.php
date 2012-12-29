<?php

namespace BomProfissional\ContentBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $this->assertTrue(true);
    }

    public function testSeIssoEFalsoMesmo()
    {
        $this->assertFalse(
            true,
            'Mas é claro que verdadeiro não é falso'
        );
    }
}
