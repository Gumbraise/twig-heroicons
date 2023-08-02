<?php

namespace MarcW\Heroicons\Tests\Twig;

use MarcW\Heroicons\Heroicons;
use MarcW\Heroicons\Twig\HeroiconsExtension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

class HeroiconsExtensionTest extends TestCase
{
    public function testGetHeroicon()
    {
        $extension = new HeroiconsExtension();
        $svg = $extension->getHeroicon('academic-cap');

        $this->assertStringStartsWith('<svg', $svg);
    }

    public function testGetHeroiconWithCustomClass()
    {
        $extension = new HeroiconsExtension();
        $svg = $extension->getHeroicon('academic-cap', Heroicons::STYLE_SOLID, ['class' => 'foo bar']);

        $this->assertStringStartsWith('<svg class="foo bar"', $svg);
    }

    public function testExtensionIsRegistered()
    {
        $twig = new Environment(new ArrayLoader());
        $twig->addExtension(new HeroiconsExtension());

        $template = $twig->createTemplate('{{ heroicon("academic-cap") }}', 'test');
        $output = $template->render();

        $this->assertStringStartsWith('<svg', $output);
    }
}
