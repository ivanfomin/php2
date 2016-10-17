<?php

namespace App;

abstract class Model
{

    public static $table;

    public $id;

    public static function findAll()
    {
        $db = new Db();
        $data = $db->query(
            'SELECT * FROM ' . static::$table,
            [],
            static::class
        );
        return $data;
    }

    public static function findById($id)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $data = $db->query($sql, [':id' => $id], static::class);
        return $data[0] ?? false;
    }

    public function isNew()
    {
        return empty($this->id);
    }

    protected function insert()
    {
        $columns = [];
        $binds = [];
        $data = [];
        foreach ($this as $column => $value) {
            if ('id' == $column) {
                continue;
            }
            $columns[] = $column;
            $binds[] = ':' . $column;
            $data[':' . $column] = $value;
        }

        $sql = '
                INSERT INTO ' . static::$table . '
                (' . implode(', ', $columns) . ')
                VALUES
                (' . implode(', ', $binds) . ')
                ';
        $db = new Db();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    protected function update()
    {
        $data = [];
        $flag = false; //чтобы не поставить запятую перед WHERE
        $sql = 'UPDATE ' . static::$table . ' SET ';
        foreach ($this as $column => $value) {
            $data[':' . $column] = $value;
            if ('id' == $column) {
                continue;
            }
            if ($flag === true) $sql = $sql . ', ';
            $flag = true;
            $sql = $sql . $column . ' = ' . ':' . $column;
        }
        $sql = $sql . ' WHERE id= ' .  ':id';
        $db = new Db();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id= ' . $this->id;

        $db = new Db();
        $db->execute($sql);

    }


}