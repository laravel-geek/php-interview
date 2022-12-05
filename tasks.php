<?php


$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
    ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];


/**
 *  1. выделить уникальные записи (убрать дубли) в отдельный массив.
 *  в конечном массиве не должно быть элементов с одинаковым id.
 *
 *  Ну это так - для развлечения. Если б не PSR - в одну выглядит красивее
 */

$noDublesArray = array_filter(
    $array,
    function ($arrayKey) use ($array) {
        return in_array(
            $arrayKey,
            array_keys(
                array_unique(
                    array_map(function ($key) {
                        return $key['id'];
                    }, $array)
                )
            )
        );
    },
    ARRAY_FILTER_USE_KEY
);

echo '<pre>';
// var_dump($filteredArray);


/*  2. отсортировать многомерный массив по ключу (любому)
 *
 *  в случае строковых ключей, можно будет допилить, но идея понятна
 */

usort($array, function ($a, $b) {
    return $a['id'] <=> $b['id'];
});

// var_dump($array);

/**
 *  3. вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным `id`)
 *
 */

function filter($keyValue)
{
    // toDo
    // array_map();
}

// array_filter($array, "filter");


/**
 * 4.  изменить в массиве значения и ключи (использовать `name => id` в качестве пары `ключ => значение`)
 *
 * toDo
 */

function keyValueChange($n)
{
    // return '$n'}}';
}

$new = array_flip(array_map("keyValueChange", array_flip($array)));


var_dump($array);


/**
 * 5. В базе данных имеется таблица с товарами `goods` (id INTEGER, name TEXT),
 * таблица с тегами `tags` (id INTEGER, name TEXT) и таблица связи товаров и тегов
 * `goods_tags` (tag_id INTEGER, goods_id INTEGER, UNIQUE(tag_id, goods_id)).
 * Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе.
 *
 */

$sql = "SELECT g.id, g.name
FROM goods g JOIN goods_tags gt ON gt.goods_id = g.id
GROUP BY g.id, g.name
HAVING COUNT(DISTINCT gt.tag_id) = (SELECT COUNT(t.id) FROM tags t)";


/**
 * 6. Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины, и все они (каждый) поставили высокую оценку (строго выше 5). ```
 * create table evaluations
 * (
 * respondent_id uuid primary key, -- ID респондента
 * department_id uuid,             -- ID департамента
 * gender        boolean,          -- true — мужчина, false — женщина
 * value         integer        -- Оценка
 * );
 * ```
 *
 */

$sql = "SELECT department_id FROM evaluations WHERE gender=true GROUP BY department_id HAVING MIN(value) > 5";