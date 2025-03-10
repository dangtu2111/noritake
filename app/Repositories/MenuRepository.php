<?php
namespace App\Repositories;

use App\Repositories\Interfaces\MenuRepositoryInterface;
use App\Models\Menu;
use App\Repositories\BaseRepository;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{
    protected $model;
    
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function pagination(
        array $column = ['*'], 
        array $condition = [], 
        array $relation = [], 
        array $orderBy = ['id', 'DESC'], 
        int $perPage = 5
    ) {
        $query = $this->model->select($column);
    
        if (!empty($condition)) {
            // Nếu $condition là mảng kết hợp, ví dụ: ['publish' => 1]
            if (array_keys($condition) !== range(0, count($condition) - 1)) {
                foreach ($condition as $field => $value) {
                    if ($value !== null) {
                        $query->where($field, '=', $value);
                    }
                }
            } else {
                // Nếu $condition là mảng số, mỗi phần tử là một mảng điều kiện dạng [column, operator, value]
                foreach ($condition as $cond) {
                    if (is_array($cond) && count($cond) >= 3) {
                        $query->where($cond[0], $cond[1], $cond[2]);
                    }
                }
            }
        }
    
        if (!empty($relation)) {
            $query->with($relation);
        }
    
        if (!empty($orderBy) && count($orderBy) >= 2) {
            $query->orderBy($orderBy[0], $orderBy[1]);
        }
    
        return $query->paginate($perPage);
    }
    
    public function updateById(int $id, array $payload = [])
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->update($payload);
            return $model->fresh();
        }
        return false;
    }
    public function getParentMenus()
    {
        return $this->model->whereNull('parent_id')
                        ->orderBy('order', 'DESC')
                        ->get();
    }
    public function find($id)
{
    return $this->model->find($id);
}

public function updateMenu(int $id, array $payload = [])
{
    $model = $this->model->find($id); // Tìm menu theo ID

    if ($model) {
        // Nếu slug không có hoặc trống, tự tạo lại từ name
        if (empty($payload['slug'])) {
            $payload['slug'] = Str::slug($payload['name']);
        }

        $model->update($payload);
        return $model->fresh(); // Lấy dữ liệu mới sau khi cập nhật
    }

    return false;
}
public function getSubMenusByParentId($parentId)
{
    return $this->model->where('parent_id', $parentId)
                       ->orderBy('order', 'DESC')
                       ->get();
}
public function deleteMenus(array $menuIds)
{
    return Menu::whereIn('id', $menuIds)->delete();
}
public function getMenusWithChildren(array $menuIds)
{
    return Menu::whereIn('id', $menuIds)
        ->has('children') // Chỉ lấy menu có con
        ->pluck('id')
        ->toArray();
}




}