<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Form;
use App\Model\Borrow;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\BorrowForm;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource. php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajax          = route('borrows.data');
        $borrows        = Borrow::all();
        return view('admin.borrows.index', compact('ajax', 'borrows'));
    }


    public function data(Request $request)
        {
            $data = Borrow::all();
            return DataTables::of($data)
                ->editColumn('member_id', function ($index) {
                    return isset($index->member->name) ? $index->member->name : '-';
                })
                ->editColumn('borrow_date', function ($index) {
                    return date('d M Y', strtotime($index->borrow_date));
                })
                ->editColumn('return_date', function ($index) {
                    if ($index->return_date) {
                        return date('d M Y', strtotime($index->return_date));
                    } else {
                        return '<span class="label label-warning">BELUM KEMBALI</span>';
                    }
                })
                ->editColumn('book_id', function ($index) {
                    return isset($index->book->title) ? $index->book->title : '-';
                })
                ->addColumn('action', function ($index) {
                    $tag = Form::open(array("url" => route('borrows.destroy',$index->id), "method" => "DELETE"));
                    $tag .= "<a href=".route('borrows.edit', $index->id)." class='btn btn-primary btn-xs' style='margin-right:0.3vw'>Edit</a>";
                    $tag .= "<button type='submit' class='deletedata btn btn-danger btn-xs' onclick='javascript:return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Delete</button>";
                    $tag .= Form::close();
                    return $tag;
                })
                ->rawColumns(['id', 'return_date', 'action'])
                ->make(true);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(BorrowForm::class, [
            'method'    => 'POST',
            'url'       => route('borrows.store')
        ]);

        $date = date('Y-m-d');
        return view('admin.borrows.create', compact('form', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {

        $form = $formBuilder->create(BorrowForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Borrow::create($request->all());
        return redirect(route('borrows.index'))->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(BorrowForm::class, [
            'method'    => 'PUT',
            'url'       => route('borrows.update', $id)
        ]);

        $borrow   = Borrow::find($id);
        return view('admin.borrows.edit', compact('borrow', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(BorrowForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Borrow::find($id)->update($request->all());
        return redirect(route('borrows.index'))->with('success', trans('message.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Borrow::find($id)->delete();
        return redirect(route('borrows.index'));
    }
}
