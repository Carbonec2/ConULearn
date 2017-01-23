<?php

interface DAO{
   
    public static function get($id);
    public static function save($object);
    public static function getAll($filters);
    public static function insert($object);
    public static function update($object);
    
    
}