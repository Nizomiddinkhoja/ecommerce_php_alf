<?php


interface ControllerInterface
{
    public function read();

    public function create();

    public function update();

    public function delete();

    public function save();
}
