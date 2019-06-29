<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Form;
use App\Model\Member;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\MemberForm;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource. php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ajax           = route('members.data');
        $members        = Member::all();
        return view('admin.members.index', compact('ajax', 'members'));
    }


    public function data(Request $request)
        {
            $data = Member::all();
            return DataTables::of($data)
                ->addColumn('action', function ($index) {
                    $tag = Form::open(array("url" => route('members.destroy',$index->id), "method" => "DELETE"));
                    $tag .= "<a href=".route('members.edit', $index->id)." class='btn btn-primary btn-xs' style='margin-right:0.3vw'>Edit</a>";
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
        $form = $formBuilder->create(MemberForm::class, [
            'method'    => 'POST',
            'url'       => route('members.store')
        ]);

        return view('admin.members.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {

        $form = $formBuilder->create(MemberForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Member::create($request->all());
        return redirect(route('members.index'))->with('success', trans('message.create'));
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
        $form = $formBuilder->create(MemberForm::class, [
            'method'    => 'PUT',
            'url'       => route('members.update', $id)
        ]);
        // dd($form);
        $member   = Member::find($id);
        return view('admin.members.edit', compact('member', 'form'));
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
        $form = $formBuilder->create(MemberForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Member::find($id)->update($request->all());
        return redirect(route('members.index'))->with('success', trans('message.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
        return redirect(route('members.index'));
    }
}
