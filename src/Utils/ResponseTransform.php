<?php

namespace Humble23\CartolaFcClient\Utils;

use SimpleXMLElement;

class ResponseTransform
{
    protected $client;


    public function __construct($client)
    {
        $this->client = $client;
    }

    public function transform($response)
    {
        switch ($this->client->getResponseType()) {
            case 'json':
                return $response;
            case 'array':
                return json_decode($response, true);
            case 'xml':
                $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
                return $this->array_to_xml(json_decode($response, true), $xml_data);
            default:
                throw new \Exception('Invalid response type');
        }
    }

    private function array_to_xml($data, &$xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (is_numeric($key)) {
                    $key = 'item' . $key; //dealing with <0/>..<n/> issues
                }
                $subnode = $xml_data->addChild($key);
                $this->array_to_xml($value, $subnode);
            } else {
                $xml_data->addChild("$key", htmlspecialchars($value));
            }
        }

        return $xml_data;
    }
}
