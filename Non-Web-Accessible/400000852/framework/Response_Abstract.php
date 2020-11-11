<?php
abstract class Response_Abstract 
{
    protected $data = [];

    public function showAllData(string $sep='<br>') : string 
    {
        return implode($sep, $this->data);
    }

    abstract public function addEntries(array $entries) : bool;

    abstract public function getEntry(int $i) : string;

    abstract public function getEntries(int $start, int $end): string;
}