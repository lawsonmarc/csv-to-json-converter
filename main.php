<?php

$filepath = $argv[1];

$lines = file($filepath);
$headers = array();
$dataObjects = array();

foreach ($lines as $index => $line)
{
    if ($index === 0)
    {
        # this is the header line
        $headers = str_getcsv($line);
    }
    else
    {
        $data = str_getcsv($line);
        $obj = new stdClass();
        foreach ($headers as $index => $header)
        {
            $obj->$header = $data[$index];
        }

        $dataObjects[] = $obj;
    }
}

print json_encode($dataObjects, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);


