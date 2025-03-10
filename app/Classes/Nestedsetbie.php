<?php

namespace App\Classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Nestedsetbie
{
    protected $data;
    protected $count;
    protected $count_level;
    protected $lft;
    protected $rgt;
    protected $level;
    protected $table;

    public function __construct($table = 'menus')
    {
        $this->table = $table;
        $this->data = [];
        $this->count = 0;
        $this->count_level = 0;
        $this->lft = [];
        $this->rgt = [];
        $this->level = [];
    }

    /**
     * Lấy dữ liệu menu từ bảng menus
     */
    public function get()
    {
        $result = DB::table($this->table)
            ->select('id', 'name', 'slug', 'parent_id', 'lft', 'rgt', 'level', 'order', 'type', 'publish')
            ->whereNull('deleted_at')
            ->orderBy('lft', 'asc')
            ->get()
            ->toArray();
        $this->data = $result;
    }

    /**
     * Xây dựng mảng quan hệ cha – con.
     * Nếu parent_id là null thì thay bằng 0 để đánh dấu menu gốc.
     */
    public function set()
    {
        $relations = [];
        if (is_array($this->data)) {
            foreach ($this->data as $item) {
                // Nếu parent_id null, coi như là gốc (key = 0)
                $parent = $item->parent_id ?? 0;
                if (!isset($relations[$parent])) {
                    $relations[$parent] = [];
                }
                $relations[$parent][] = $item->id;
            }
        }
        return $relations;
    }

    /**
     * Đệ quy tính toán các giá trị lft, rgt và level.
     * Sử dụng $start = 0 làm nút gốc ảo (các menu có parent_id = null)
     */
    public function recursive($start = 0, $relations = [])
    {
        $this->lft[$start] = ++$this->count;
        $this->level[$start] = $this->count_level;

        if (isset($relations[$start])) {
            foreach ($relations[$start] as $childId) {
                $this->count_level++;
                $this->recursive($childId, $relations);
                $this->count_level--;
            }
        }

        $this->rgt[$start] = ++$this->count;
    }

    /**
     * Cập nhật lại các trường nested set (lft, rgt, level) cho các menu.
     */
	public function updateNestedSet()
	{
		if (is_array($this->level) && is_array($this->lft) && is_array($this->rgt)) {
			foreach ($this->data as $item) {
				$id = $item->id;
				// Bỏ qua nút gốc ảo nếu cần (nếu id == 0)
				if ($id == 0) {
					continue;
				}
				if (isset($this->level[$id]) && isset($this->lft[$id]) && isset($this->rgt[$id])) {
					DB::table($this->table)
						->where('id', $id)
						->update([
							'level'   => $this->level[$id],
							'lft'     => $this->lft[$id],
							'rgt'     => $this->rgt[$id],
							'user_id' => Auth::id(),
						]);
				}
			}
		}
	}
	

    /**
     * Trả về mảng dropdown để hiển thị danh sách menu,
     * với mục gốc (key = 0) có nhãn mặc định.
     */
    public function dropdown($rootText = '[Root]')
    {
        $this->get();
        $dropdown = [];
        $dropdown[0] = $rootText;

        if (is_array($this->data)) {
            foreach ($this->data as $item) {
                $indent = str_repeat('|-----', max(0, $item->level - 1));
                $dropdown[$item->id] = $indent . $item->name;
            }
        }
        return $dropdown;
    }
}