<?php

namespace App\Services;

use App\Category;

class CategoryService
{

    public function createCategory(array $data): array
    {
        try {
            $category = new Category();

            $last_index = Category::orderBy('desktop_index', 'name')->first()->desktop_index;

            if ($data['desktop_index'] == '') {
                $category->desktop_index = $last_index + 1;
                $attach_number = $last_index + 1;
            } else {
                $category->desktop_index = $data['desktop_index'];
                $attach_number = $data['desktop_index'];
            }

            $category->mobile_index = $data['mobile_index'] == '' ? $last_index + 1 : $data['mobile_index'];

            $attach_desktop_hex_bg         = $data['desktop_hex_bg'];
            $attach_desktop_hex_bg_name = time() . 'category-' . $attach_number . '.svg';
            $attach_desktop_hex_bg->move('images/hex/desktop', $attach_desktop_hex_bg_name);

            $attach_mobile_hex_bg         = $data['mobile_hex_bg'];
            $attach_mobile_hex_bg_name     = time() . 'category-' . $attach_number . '.svg';
            $attach_mobile_hex_bg->move('images/hex/mobile', $attach_mobile_hex_bg_name);

            $attach_hex_icon             = $data['hex_icon'];
            $attach_hex_icon_name         = time() . 'category-' . $attach_number . '.svg';
            $attach_hex_icon->move('images/hex/icon', $attach_hex_icon_name);

            $category->desktop_hex_bg     = $attach_desktop_hex_bg_name;
            $category->mobile_hex_bg     = $attach_mobile_hex_bg_name;
            $category->hex_icon         = $attach_hex_icon_name;

            $category->name = $data['name'];
            $category->urn = $data['urn'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];

            $category->save();
            $msg = ['success', 'Categoria adicionada com sucesso'];
        } catch (\Exception $e) {
            $msg = ['error', 'Ops, tivemos um problema, entre em contato com um de nossos adminsitradores: ' . $e->getMessage()];
        }
        return $msg;
    }
}
