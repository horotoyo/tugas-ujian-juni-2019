<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;
use App\Model\Member;
use App\Model\Book;

class BorrowForm extends Form
{
    protected $send = '<i class="fa fa-send"></i>';

    public function buildForm()
    {
        $this
            ->add('member_id', Field::SELECT, [
                'choices' => Member::pluck('name', 'id')->toArray(),
                'empty_value' => '- Member -',
                'label' => 'Nama Member',
                'attr' => [
                    'class' => 'select2 form-control',
                ],
            ])
            ->add('book_id', Field::SELECT, [
                'choices' => Book::pluck('title', 'id')->toArray(),
                'empty_value' => '- Buku -',
                'label' => 'Judul Buku',
                'attr' => [
                    'class' => 'select2 form-control',
                ],
            ])
            ->add('staff_name', Field::TEXT, [
                'rules' => 'required',
                'label' => 'Staff Perpus',
                'attr' => [
                	'placeholder' => 'Nama Staff',
                	'Value' => 'Suryo Widiyanto',
                ],
            ])
            ->add('time_period', Field::NUMBER, [
                'rules' => 'required',
                'label' => 'Jangka Waktu Pinjam',
                'attr' => [
                	'placeholder' => 'Masukan Jangka Waktu',
                ],
            ])
            ->add('borrow_date', Field::DATE, [
                'rules' => 'required',
                'label' => 'Tanggal Pinjam',
            ])
            ->add('return_date', Field::DATE, [
                'label' => 'Tanggal Kembali',
            ])
            ->add('status', Field::CHOICE, [
                'empty_value' => '- Status -',
                'choices' => [
                	'missing' => 'missing',
                	'on time' => 'on time',
                	'late' => 'late'],
            ])
            ->add('note', Field::TEXTAREA, [
                'rules' => 'required',
                'label' => 'Catatan',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
                ]
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
            	'attr' => [
            		'class' => 'btn btn-primary',
            	],
            	'label' => $this->send.' Kirim',
        	]);
    }
}
