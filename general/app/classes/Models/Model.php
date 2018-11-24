<?php

namespace Classes\Models;

interface Model
{

    public function create();

    public function read(int $id);

    public function edit();

    public function delete();

}