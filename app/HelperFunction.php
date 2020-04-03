<?php

function getPaginate($object, $offset = 0)
{
    $request = request();

    if ($request->first > 0) {
        $offset = ($request->first / $request->rows) + 1;
    }

    return $object->paginate($request->rows, ['*'], 'page', $offset);
}