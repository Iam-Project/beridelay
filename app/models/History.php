<?php namespace BeriDelay\Models;

use System\Models\Model;
use System\Traits\SoftDelete;

/**
 * Модель "История"
 * @package BeriDelay\Models
 */
class History extends Model
{
    use SoftDelete;

    /**
     * @var int ID пользователя
     */
    public $user_id;

    /**
     * @var int ID задания
     */
    public $task_id;

    /**
     * @var int ID цели
     */
    public $target_id;

    /**
     * @var string Описание цели от пользователя
     */
    public $description;

    /**
     * @var string Комментарий администратора
     */
    public $comment;

    public $validation = [
        'user_id' => 'required|integer',
        'task_id' => 'required|integer',
        'target_id' => 'required|integer',
        'status' => 'in:0,1,2,3'
    ];
}