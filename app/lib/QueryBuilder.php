<?php

namespace App\lib\QueryBuilder;

use App\lib\Connection\Connection;
use PDO;
use Aura\SqlQuery\QueryFactory;

class QueryBuilder {

    private $pdo;
    private $queryFactory;

    public function __construct(PDO $pdo, QueryFactory $qf) {
        $this->pdo = $pdo;
         $this->queryFactory = $qf;
    }

    public function getAllFromTable($table,$column_order_by = null) {
        $select = $this->queryFactory->newSelect();
        if ($column_order_by != null) {
            $select->cols(['*'])->from($table)->orderBy([$column_order_by . ' DESC']);
        }else {
            $select->cols(['*'])->from($table);
        }

        $stm = $this->pdo->prepare($select->getStatement());
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertData($data,$table) {
        $insert = $this->queryFactory->newInsert();
        $insert->into($table)->cols($data);
        $stm = $this->pdo->prepare($insert->getStatement());
        $stm->execute($insert->getBindValues());
    }

    public function updateData($data,$id,$table) {
        $update = $this->queryFactory->newUpdate();
        $update->table($table)->cols($data)->where('id = :id');
        $update->bindValue('id', $id);
        $stm = $this->pdo->prepare($update->getStatement());
        $stm->execute($update->getBindValues());
    }

    public function deleteData($data,$table) {
        $delete = $this->queryFactory->newDelete();
        $delete->from($table)->where('id = :id');
        $delete->bindValues($data);
        $stm = $this->pdo->prepare($delete->getStatement());
        $stm->execute($delete->getBindValues());
    }

    public function getRowsByCondition($data, $table, $condition) {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])->from($table)->where($condition .'= :'.$condition);
        $select->bindValues($data);
        $stm = $this->pdo->prepare($select->getStatement());
        $stm->execute($select->getBindValues());
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataOrderByAndLimit($table,$column_order_by,$limit = 5) {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])->from($table)->orderBy([$column_order_by . ' DESC'])->limit($limit);
        $stm = $this->pdo->prepare($select->getStatement());
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNextPosts($table,$page,$column_order_by = 'date_created') {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])->from($table)->setPaging(5)->page($page)->orderBy([$column_order_by . ' DESC']);
        $stm = $this->pdo->prepare($select->getStatement());
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}