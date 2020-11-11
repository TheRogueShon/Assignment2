<?php
namespace Quwi\framework;

interface Command_Interface
{
    public function execute(CommandContext $context) : bool;
}