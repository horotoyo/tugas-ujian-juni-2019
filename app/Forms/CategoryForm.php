<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class CategoryForm extends Form
{
	protected $send = '<i class="fa fa-send"></i>';

    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Kategori Buku',
            ])
            ->add($this->send.' Submit', 'submit', [
            	'attr' => [
            			'class' => 'btn btn-primary',
            		],
        	]);
    }
}
