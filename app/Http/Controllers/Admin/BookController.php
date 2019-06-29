<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Form;
use App\Model\Book;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\BookForm;

class BookController extends Controller
{
    /**
     * Display a listing of the resource. php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajax           = route('books.data');
        $books        = Book::all();
        return view('admin.books.index', compact('ajax', 'books'));
    }


    public function data(Request $request)
        {
            $data = Book::all();
            return DataTables::of($data)
                ->editColumn('category_id', function ($index) {
                    return isset($index->category->name) ? $index->category->name : '-';
                })
                ->addColumn('action', function ($index) {
                    $tag = Form::open(array("url" => route('books.destroy',$index->id), "method" => "DELETE"));
                    $tag .= "<a href=".route('books.edit', $index->id)." class='btn btn-primary btn-xs' style='margin-right:0.3vw'>Edit</a>";
                    $tag .= "<button type='submit' class='deletedata btn btn-danger btn-xs' onclick='javascript:return confirm(\"Apakah anda yakin ingin menghapus data ini?\")'>Delete</button>";
                    $tag .= Form::close();
                    return $tag;
                })
                ->rawColumns(['id', 'action'])
                ->make(true);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(BookForm::class, [
            'method'    => 'POST',
            'url'       => route('books.store')
        ]);

        return view('admin.books.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {

        $form = $formBuilder->create(BookForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Book::create($request->all());
        return redirect(route('books.index'))->with('success', trans('message.create'));
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
        $form = $formBuilder->create(BookForm::class, [
            'method'    => 'PUT',
            'url'       => route('books.update', $id)
        ]);
        
        $book   = Book::find($id);
        return view('admin.books.edit', compact('book', 'form'));
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
        $form = $formBuilder->create(BookForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Book::find($id)->update($request->all());
        return redirect(route('books.index'))->with('success', trans('message.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect(route('books.index'));
    }
}
