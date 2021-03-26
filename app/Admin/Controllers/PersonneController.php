<?php

namespace App\Admin\Controllers;

use App\Models\Personne;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PersonneController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Personne';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Personne());
        $grid->column('nom', __('nom'));
        $grid->column('order', __('order'));
        $grid->column('personne_id', __('Parent'));


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
        $show = new Show(Personne::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('nom', __('Nom'));
        $show->field('order', __('order'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Personne());
        $personnes = Personne::all();
        $array = array();
        foreach ($personnes as  $personne){
            $array[$personne->id]= $personne->nom;
        }

        $form->display('id', __('ID'));
        $form->text('nom', __('nom'));
        $form->number('order', __('order'));
        $form->select('personne_id', 'Parent')->options($array);

        return $form;
    }
}
