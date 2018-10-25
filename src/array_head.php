<?php

/**
 * @author Igor Kamyshev
 *
 * @param array $arr
 *
 * @return mixed|null
 */
function array_head(array $arr)
{
    $elements = array_values($arr);

    return (count($elements) > 0)
        ? $elements[0]
        : null;
}
