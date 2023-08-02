<?php

namespace MarcW\Heroicons\Twig;

use MarcW\Heroicons\HeroiconOptions;
use MarcW\Heroicons\Heroicons;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class HeroiconsExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('heroicon', [$this, 'getHeroicon'], ['is_safe' => ['html']]),
        ];
    }

    public function getHeroicon(string $icon, string $style = Heroicons::STYLE_SOLID, array $options = []): array|false|string
    {
        return HeroiconOptions::applyOptions(Heroicons::get($icon, $style), $options);
    }
}
