<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Cours;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $statuses = Status::all('status');
      $ordersQuery = Cours::query();

      $contacts = $ordersQuery->orderBy('id', 'DESC')->simplePaginate(4);
      return view('admin.courses.index-cours', [
        'contacts' => $contacts,
        'statuses' => $statuses,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $contact = new Cours();
      return view('admin.courses.one-cours', ['contact' => $contact->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $contact = new Cours();
      $statuses = Status::all('status');
      return view('admin.courses.update-cours', [
        'contact' => $contact->find($id),
        'statuses' => $statuses,
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
      $contact = Cours::find($id);
      $contact->name = $req->input('name');
      $contact->description = $req->input('description');
      $contact->contacts = $req->input('contacts');
      $contact->cost = $req->input('cost');
      $contact->status = $req->input('status');


      $contact->save();

      return redirect()->route('admin.courses.index', $id)->with('success', 'Сообщение обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
