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
    return (count($arr) > 0)
        ? $arr[0]
        : null;
}
