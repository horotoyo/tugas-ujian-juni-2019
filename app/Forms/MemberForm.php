<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class MemberForm extends Form
{
	protected $send = '<i class="fa fa-send"></i>';

    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Nama Member',
            ])
            ->add('address', Field::TEXT, [
            	'rules' => 'required',
            	'label' => 'Alamat',
            ])
            ->add('birth_place', Field::TEXT, [
            	'rules' => 'required',
            	'label' => 'Tempat Lahir',
            ])
            ->add('birth_date', Field::DATE, [
            	'rules' => 'required',
            	'label' => 'Tanggal Lahir',
            ])
            ->add('email', Field::EMAIL, [
            	'rules' => 'required',
            	'label' => 'Email',
            ])
            ->add('phone', Field::NUMBER, [
            	'rules' => 'required',
            	'label' => 'Nomor HP',
            ])
            ->add('submit', 'submit', [
            	'attr' => [
            			'class' => 'btn btn-primary',
            		],
            	'label' => $this->send.' Kirim',
        	]);
    }
}
