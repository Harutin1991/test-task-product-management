<?php

printf(
    '<h%d data-sk="%s" %s%s>%s</h%d>',
    $level ?? 3,
    $sk ?? 'heading',
    !empty($classes) ? 'class="' . $classes . '"' : '',
    !empty($styles) ? 'style="' . $styles . '"' : '',
    $string ?? 'Heading',
    $level ?? 3
);
