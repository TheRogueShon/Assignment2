<?php
namespace Quwi\framework;
interface ObserverInterface
{
    public function update(Observable_Model $ob);
}