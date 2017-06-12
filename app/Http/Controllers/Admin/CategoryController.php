<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $dis['nestableMenuSrc'] = $this->getNestableMenuSrc(0);

        return view('admin.category.category', $dis);
    }

    public function updateCategory(Request $request)
    {
        $deletedNodes = explode(' ', ltrim($request->get('deleted_nodes')));
        Category::whereIn('id', $deletedNodes)->delete();
        $menuNodesJson = json_decode($request->get('menu_nodes'));
        $this->recursiveSaveMenu($menuNodesJson, 0);

        return back();
    }

    public function recursiveSaveMenu($jsonArr, $parentId)
    {
        foreach ($jsonArr as $key => $row) {
            $parent = $this->saveMenuNode($row, $parentId);

            if (!empty($row->children)) {
                $this->recursiveSaveMenu($row->children, $parent);
            }

        }
    }

    private function saveMenuNode($jsonItem, $parentId)
    {
        $data = [
            'id' => $jsonItem->id ?: 0,
            'name' => $jsonItem->title ?: '',
            'slug' => $jsonItem->slug ?: str_slug($jsonItem->title),
            'parent_id' => $parentId,
        ];

        $item = Category::findOrNew($data['id']);
        foreach ($data as $key => $row) {
            if ($key != 'id') {
                $item->$key = $row;
            }
        }

        $item->save();

        return $item->id;
    }

    public function getNestableMenuSrc($parentId)
    {
        $menu_nodes = $this->getMenuNodes($parentId);
        $html_src = '';
        $html_src = '<ol class="dd-list">';
        foreach ($menu_nodes as $key => $row) :
            $html_src .= '<li class="dd-item dd3-item" data-slug="' . $row->slug . '" data-title="' . $row->name . '" data-id="' . $row->id . '">';
            $html_src .= '<div class="dd-handle dd3-handle"></div>';
            $html_src .= '<div class="dd3-content">';
            $html_src .= '<span class="text pull-left" data-update="title">' . $row->name . '</span>';
            $html_src .= '<span class="text pull-right">category</span>';
            $html_src .= '<a href="#" title="" class="show-item-details"><i class="fa fa-angle-down"></i></a>';
            $html_src .= '<div class="clearfix"></div>';
            $html_src .= '</div>';
            $html_src .= '<div class="item-details">';

            $html_src .= '<label class="pad-bot-5 dis-inline-block">';
            $html_src .= '<span class="text pad-top-5" data-update="slug">Title</span>';
            $html_src .= \Form::text('title', $row->name);
            $html_src .= '</label>';

            $html_src .= '<label class="pad-bot-10">';
            $html_src .= '<span class="text pad-top-5 dis-inline-block" data-update="class">Slug</span>';
            $html_src .= \Form::text('slug', $row->slug);
            $html_src .= '</label>';

            $html_src .= '<div class="text-right">';
            $html_src .= '<a href="#" title="" class="btn red btn-remove btn-sm">Remove</a>';
            $html_src .= '<a href="#" title="" class="btn blue btn-cancel btn-sm">Cancel</a>';
            $html_src .= '</div>';
            $html_src .= '</div>';
            $html_src .= '<div class="clearfix"></div>';
            $html_src .= $this->getNestableMenuSrc($row->id);
            $html_src .= '</li>';
        endforeach;
        $html_src .= '</ol>';

        return $html_src;

    }

    public function getMenuNodes($parentId)
    {
        if (Category::count() < 1) {
            return [];
        }

        return Category::where('parent_id', $parentId)->get();
    }
}
