<?php 
namespace Anhnvph45648\Asm\Models;
use Anhnvph45648\Asm\Commons\Model;



class Cart extends Model
{
    protected string $tableName = 'carts';

    public function findByUserID($userID){
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('user_id = ?')
        ->setParameter(0, $userID)
        ->fetchAssociative();
    }
}