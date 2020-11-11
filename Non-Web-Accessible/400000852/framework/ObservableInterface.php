<?php
namespace Quwi\framework;

interface ObservableInterface
{
    public function attach(ObserverInterface $o);

    public function detach(ObserverInterface $o);

    public function notify();
}