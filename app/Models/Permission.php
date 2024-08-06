<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    use HasFactory;

    protected $fillable   = ['name', 'slug', 'values', 'created_by'];

    protected $casts = [
        'name'          => 'string',
        'slug'          => 'string',
        'values'        => 'json',
        'created_by'    => 'integer'
    ];


    /**
     * Make the permissions combination while create new permission by passing slug name of the module
     *
     * @param string $slug
     * @param array $permissions
     * @return array
     */
    public static function make_permission_array(string $slug, $permissions = null): array
    {
        if (is_null($permissions)) {
            $permissions = ['read', 'create', 'update', 'delete'];
        }
        $res = [];
        foreach ($permissions as $permission) {
            $res[trim($permission)] = str_replace(' ', '', $slug . '_' . trim($permission));
        }
        return $res;
    }
    protected function slug(): Attribute
    {
        return Attribute::make(
            set: function () {
                $field = 'slug';
                $separator = '_';
                $slug = Str::slug($this->name, $separator);

                $count = $this::where($field, $slug)->count();
                if ($count > 0) {
                    $suffix = 1;
                    do {
                        $newSlug = $slug . $separator . $suffix;
                        $count = $this::where($field, $newSlug)->count();
                        $suffix++;
                    } while ($count > 0);
                    $slug = $newSlug;
                }
                return ['slug' => $slug];
            }
        );
    }
}
