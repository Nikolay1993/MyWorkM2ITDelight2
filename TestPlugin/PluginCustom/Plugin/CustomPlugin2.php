<?php

namespace TestPlugin\PluginCustom\Plugin;

class CustomPlugin2
{

    //добавляет аргумет в метод до его вызова
    public function beforeSetTitle(\TestPlugin\PluginCustom\Controller\Test\Test $subject, $title)
    {
        //изменяем аргумент сет тайтл до вывозва его в контроллере
        $title = $title . " 2 before ";

        //возвращаем аргумент тайтл в контроллер
        return $title;
    }

    //добавляем вывод после вызова метода
    public function afterGetTitle(\TestPlugin\PluginCustom\Controller\Test\Test $subject, $result)
    {
        //добавлем вывод после результата вывода метода гет тайтл
        $afterInput = '<div style="bolt">' . $result . ' plugin 2 after ' .'</div>';

        //возвращаем результат вывода в контроллер
        return $afterInput;

    }


    //Добавляем вывод до и полсе вызова метода гет тайтл, по приаритету after будет вызван позже
    public function aroundGetTitle(\TestPlugin\PluginCustom\Controller\Test\Test $subject, callable $proceed)
    {

        //добавем вывод хелло до и после вызова метода гет тайтл
        $result = ' plugin 2 before around | '. $proceed() . ' | plugin 2 after around | ';

        //возвращаем вывод в контроллер
        return $result;
    }

}