<?php

namespace MarcW\Heroicons;

class HeroiconOptions
{
    public static function applyOptions(string $svg, array $options): string
    {
        if (isset($options['class'])) {
            $svg = str_replace('<svg', sprintf('<svg class="%s"', $options['class']), $svg);
        }

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

        return $svg;
    }
}