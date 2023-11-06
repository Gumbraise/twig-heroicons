<?php

namespace MarcW\Heroicons;

class HeroiconOptions
{
    public static function applyOptions(string $svg, array $options): string
    {
        foreach ($options as $key => $value) {
            if (isset($options['stroke-width'])) {
                $svg = preg_replace('/\s(stroke-width)="[^"]*"/', ' stroke-width="' . $options['stroke-width'] . '"', $svg);
            }

            if (isset($options['stroke'])) {
                $svg = preg_replace('/\s(stroke)="[^"]*"/', ' stroke="' . $options['stroke'] . '"', $svg);
            } else {
                $svg = preg_replace('/\s(stroke)="[^"]*"/', '', $svg);
            }

            if (isset($options['fill'])) {
                $svg = preg_replace('/\s(fill)="[^"]*"/', ' fill="' . $options['fill'] . '"', $svg);
            } else {
                $svg = preg_replace('/\s(fill)="[^"]*"/', '', $svg);
            }

            $svg = str_replace('<svg', sprintf('<svg %s="%s"', $key, $value), $svg);
        }

        return $svg;
    }
}