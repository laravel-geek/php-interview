<?php

class SomeObject
{
    protected $name;

    public function __construct(string $name)
    {
    }

    public function getObjectName()
    {
    }
}

/**
 * Сделал класс независимым от количеста входящих элементов
 * Можно, конечно, подумать над созданием абстр. класса  handleObjects
 * от которого наследоваться. Возможно, преждевременно.
 * Интерфейс (которым обычно лечат нарушение принципа O-C) здесь пока, как кажется, избыточен.
 */
class SomeObjectsHandler
{


    public function __construct()
    {
    }

    public function handleObjects(array $objects): array
    {
        $handlers = [];

        foreach ($objects as $object) {
            $this->objectName = getObjectName();
            $handlers[] = $object->getObjectName;
        }

        return $handlers;
    }
}


$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler();
$soh->handleObjects($objects);