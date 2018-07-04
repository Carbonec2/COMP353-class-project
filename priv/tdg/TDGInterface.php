<?php

interface TDG{

public static function get($index);

public static function getAll($filters);

public static function save($valueObject);

public static function insert($valueObject);

public static function update($valueObject);

public static function delete($index);

}