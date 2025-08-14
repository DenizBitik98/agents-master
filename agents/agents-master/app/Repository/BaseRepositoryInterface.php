<?php

namespace App\Repository;

interface BaseRepositoryInterface
{
    /**
     * @return mixed
     */
    public function query();

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $id
     * @param $params
     * @return mixed
     */
    public function update($id, $params);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
