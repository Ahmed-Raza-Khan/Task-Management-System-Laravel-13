<?php

namespace App\Repositories\Contracts;

interface TaskRepositoryInterface extends BaseRepositoryInterface
{
    public function getByUser($userId);
    public function getByUserPaginated($userId, $perPage = 10);
    public function getCompleted();
    public function getHighPriority();
    public function markAsCompleted($id);
}
