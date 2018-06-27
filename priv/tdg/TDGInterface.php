<?php

interface TDG{

public static get($index);

public static getAll($filters);

public static save($valueObject);

public static insert($valueObject);

public static update($valueObject);

public static delete($index);

}