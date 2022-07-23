<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;


//use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */




         public function index(Content $content)
         {
             return $content
                 ->title($this->title)
                 ->body($this->tree());
         }

         /**
          * Make a grid builder.
          *
          * @return Tree
          */
         protected function tree()
         {
             return Category::tree(function (Tree $tree) {

                 $tree->branch(function ($branch) {

                     //$src = config('admin.upload.host') . '/' . $branch['logo'] ;

                     //$logo = "<img src='$src' style='max-width:30px;max-height:30px' class='img'/>";

                     return "{$branch['title']}";

                 });
             });
         }












    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('Id'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('order', __('Order'));
        $grid->column('title', __('Title'));
        $grid->column('icon', __('Icon'));


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('order', __('Order'));
        $show->field('title', __('Title'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
     /**
        * Make a form builder.
        *
        * @return Form
        */
       protected function form()
       {
           $form = new Form(new Category());
           $form->display('id', 'ID');
           $form->select('parent_id')->options(Category::selectOptions());
           $form->text('title')->rules('required');
           $form->display('created_at', 'Created At');
           $form->display('updated_at', 'Updated At');

           return $form;
       }
}
