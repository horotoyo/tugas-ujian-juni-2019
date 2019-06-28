<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Form;
use App\Model\Category;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\CategoryForm;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource. php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajax           = route('categories.data');
        $categories     = Category::all();
        return view('admin.categories.index', compact('ajax', 'categories'));
    }


    public function data(Request $request)
        {
            $data = Category::all();
            return DataTables::of($data)
                ->editColumn('created_at', function ($index) {
                        return $index->created_at->format('d M Y');
                })
                ->addColumn('action', function ($index) {
                    $tag = Form::open(array("url" => route('categories.destroy',$index->id), "method" => "DELETE"));
                    $tag .= "<a href=".route('categories.edit', $index->id)." class='btn btn-primary btn-xs' style='margin-right:0.3vw'>Edit</a>";
                    $tag .= "<button type='submit' class='deletedata btn btn-danger btn-xs'>Delete</button>";
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
        $form = $formBuilder->create(CategoryForm::class, [
            'method'    => 'POST',
            'url'       => route('categories.store')
        ]);

        return view('admin.categories.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {

        $form = $formBuilder->create(CategoryForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Category::create($request->all());
        return redirect(route('categories.index'))->with('success',trans('message.create'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect(route('categories.index'));
    }
}
