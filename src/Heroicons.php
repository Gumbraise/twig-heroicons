<?php

namespace MarcW\Heroicons;

final class Heroicons
{
    const STYLE_SOLID = 'solid';
    const STYLE_OUTLINE = 'outline';
    const STYLE_MINI = 'mini';

    public static function get($icon, $style = self::STYLE_SOLID): false|string
    {
        if (self::STYLE_SOLID !== $style && self::STYLE_OUTLINE !== $style) {
            throw new \LogicException(sprintf('Heroicons style "%s" is not available.', $style));
        }

        $path = sprintf('%s/%s.svg', realpath(__DIR__ . self::getIconPath($style)), $icon);
        if (!is_readable($path)) {
            throw new \LogicException(sprintf('Heroicon "%s" in style "%s" cannot be found or is not readable.', $icon, $style));
        }

        return file_get_contents($path);
    }

    private static function getIconPath(string $style): string
    {
        switch ($style) {
            default:
            case self::STYLE_SOLID:
                return '/24/solid';
            case self::STYLE_OUTLINE:
                return '/24/outline';
            case self::STYLE_MINI:
                return '/20/solid';
        }
    }
}
