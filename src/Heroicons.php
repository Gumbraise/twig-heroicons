<?php

namespace MarcW\Heroicons;

final class Heroicons
{
    const STYLE_SOLID = 'solid';
    const STYLE_OUTLINE = 'outline';
    const STYLE_MINI = 'mini';

    public static function get($icon, $style = self::STYLE_SOLID)
    {
        if (self::STYLE_SOLID !== $style && self::STYLE_OUTLINE !== $style && self::STYLE_MINI !== $style) {
            throw new \LogicException(sprintf('Heroicons style "%s" is not available.', $style));
        }

        $path = sprintf('%s/%s.svg', realpath(__DIR__ . self::getIconPath($style)), $icon);

        if (!is_readable($path)) {
            throw new \LogicException(sprintf('Heroicon "%s" in style "%s" cannot be found or is not readable.', $icon, $style));
        }

        $svgContent = file_get_contents($path);

        return preg_replace('/\s(fill|stroke)="[^"]*"/', '', $svgContent);
    }

    private static function getIconPath(string $style): string
    {
        switch ($style) {
            default:
            case self::STYLE_SOLID:
                return '/../resources/heroicons/24/solid';
            case self::STYLE_OUTLINE:
                return '/../resources/heroicons/24/outline';
            case self::STYLE_MINI:
                return '/../resources/heroicons/20/solid';
        }
    }
}
