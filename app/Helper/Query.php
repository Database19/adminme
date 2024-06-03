<?php

use Illuminate\Support\Facades\DB;

function _db($table){
    return DB::table($table);
}

function getField($table, $kolom = []){
    if($kolom == []){
        return DB::getSchemaBuilder()->getColumnListing($table);
    }
    
    $get = DB::getSchemaBuilder()->getColumnListing($table);
    $kolom = array_intersect($kolom, $get);
    return $kolom;
}

function getMenu(){
    $menus = _db('menus')->where('is_active', 1)->get();
    
    $menuTree = [];
    foreach ($menus as $menu) {
        if ($menu->parent_id === null) {
            $menuTree[$menu->id] = $menu;
            $menuTree[$menu->id]->children = [];
        }
    }

    foreach ($menus as $menu) {
        if ($menu->parent_id !== null && isset($menuTree[$menu->parent_id])) {
            $menuTree[$menu->parent_id]->children[] = $menu;
        }
    }

    return array_values($menuTree);
}

