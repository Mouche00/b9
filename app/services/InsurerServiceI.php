<?php

interface InsurerServiceI
{
    public function create(Insurer $insurer);
    public function read();
    public function update(Insurer $insurer);
    public function delete($id);
    public function fetch($id);
}