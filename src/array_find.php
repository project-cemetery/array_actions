<?php

/**
 * @author Igor Kamyshev
 *
 * @param array    $arr
 * @param callable $callback
 *
 * @return mixed|null
 */
function array_find(array $arr, callable $callback)
{
    $elements = array_filter($arr, $callback);

    return array_head($elements);
}
