<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Status;
use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $statuses = Status::all('status');
        $category = Category::all('category');
        $ordersQuery = Order::query();

        if($request->filled('status')) {
          $ordersQuery->where('status', '=', $request->status);
        }

        if($request->filled('category')) {
          $ordersQuery->where('category', '=', $request->category);
        }

        if($request->filled('date_from')) {
          $ordersQuery->whereDate('created_at', '>=', $request->date_from);
        }

        if($request->filled('date_to')) {
          $ordersQuery->whereDate('created_at', '<=', $request->date_to);
        }

        $contacts = $ordersQuery->orderBy('id', 'DESC')->simplePaginate(4);
        return view('admin.contacts.index', [
          'contacts' => $contacts,
          'statuses' => $statuses,
          'category' => $category,
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
      $contact = new Order;
      return view('admin.contacts.one-message', ['contact' => $contact->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $contact = new Order;
      $statuses = Status::all('status');
      $category = Category::all('category');
      return view('admin.contacts.update', [
        'contact' => $contact->find($id),
        'statuses' => $statuses,
        'category' => $category,
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
      $contact = Order::find($id);
      $contact->name = $req->input('name');
      $contact->status = $req->input('status');
      $contact->email = $req->input('email');
      $contact->category = $req->input('category');
      $contact->message = $req->input('message');

      $contact->save();

      return redirect()->route('admin.contacts.index', $id)->with('success', 'Сообщение обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();

        return redirect(route('admin.contacts.index'));
    }
}
