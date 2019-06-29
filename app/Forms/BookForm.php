<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
use App\Model\Category;

class BookForm extends Form
{
	protected $send = '<i class="fa fa-send"></i>';

    public function buildForm()
    {
    	$this
            ->add('isbn', Field::TEXT, [
                'rules' => 'required',
                'label' => 'ISBN',
                'attr' => [
                	'placeholder' => 'Masukan ISBN',
                ],
            ])
        	->add('title', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Judul Buku',
                'attr' => [
                	'placeholder' => 'Masukan Judul Buku',
                ],
            ])
            ->add('category_id', Field::SELECT, [
                'choices' => Category::pluck('name', 'id')->toArray(),
                'empty_value' => '- Pilih Kategori Buku -',
                'label' => 'Kategori Buku',
                'attr' => [
                    'class' => 'select2 form-control',
                ]
            ])
            ->add('description', Field::TEXTAREA, [
                'rules' => 'required',
                'label' => 'Deskripsi',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
                ]
            ])
            ->add('author', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Penulis',
                'attr' => [
                	'placeholder' => 'Masukan Penulis Buku',
                ],
            ])
            ->add('publisher', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Penerbit',
                'attr' => [
                	'placeholder' => 'Masukan Penerbit Buku',
                ],
            ])
            ->add('print', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Cetakan Ke - ',
                'attr' => [
                	'placeholder' => 'ex: 1 (Cetakan pertama)',
                ],
            ])
            ->add('date_rilies', Field::DATE, [
                'rules' => 'required',
                'label' => 'Tanggal Rilis',
                'attr' => [
                	'placeholder' => 'Masukan Tanggal Rilis',
                ],
            ])
            ->add('place_rilies', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Tempat Rilis',
                'attr' => [
                	'placeholder' => 'Masukan Tempat Rilis',
                ],
            ])
            ->add('quantity', Field::NUMBER, [
                'rules' => 'required',
                'label' => 'Jumlah yang diinputkan',
                'attr' => [
                	'placeholder' => 'Masukan Jumlah Barang',
                ],
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
            	'attr' => [
            		'class' => 'btn btn-primary',
            	],
            	'label' => $this->send.' Kirim',
        	]);
    }
}
