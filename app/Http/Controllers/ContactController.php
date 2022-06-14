<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Callback;
use App\Models\Review;
use App\Models\User;
use App\Models\Order;
use App\Models\Cours;
use App\Models\Category;
use App\Models\StorageCours;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
  public function callback(ContactRequest $req) {

    $callback = new Callback();
    $callback->number = $req->input('number');

    $callback->save();

    return redirect()->route('home')->with('success', 'Заявка на звонок отправлена');
  }

  public function review_submit(Request $req) {

    $valid = $req->validate([
      'name' => 'required|min:5|max:50',
      'category' => 'required',
      'message' => 'required|min:5',
    ]);

    $contact = new Review();
    $contact->user_id = Auth::id();
    $contact->name = $req->input('name');
    $contact->category = $req->input('category');
    $contact->message = $req->input('message');

    $contact->save();

    return redirect()->route('reviews_user')->with('success', 'Отзыв отправлен');
  }

  public function submit(Request $req) {
    $valid = $req->validate([
      'message' => 'required|min:5',
    ]);


    $contact = new Order();
    $contact->user_id = Auth::id();
    $contact->name = Auth::user()->name;
    $contact->email = Auth::user()->email;
    $contact->category = $req->input('category');
    $contact->message = $req->input('message');

    $contact->save();

    return redirect()->route('user')->with('success', 'Сообщение добавлено');
  }

  public function allData() {
    $contact = new Order;
    $user_id = Auth::user()->id;

    $cours = [];
    $cours = StorageCours::query()->where('user_id', '=', $user_id)->get();

    $data = [];
    $data = $contact->where('user_id', '=', $user_id)->orderBy('id', 'DESC')->get();

    return view('all_message', ['data' => $data, 'cours' => $cours]);
  }

  public function allReview() {
    $contact = new Review;
    $data = [];

    $cat = new Category;
    $category = [];

    return view('reviews', ['data' => $contact->all(), 'category' => $cat->all()]);
  }

  public function politic() {

    return view('politic');
  }

  public function oneMessage($id) {
    $contact = new Order;
    return view('one-message', ['data' => $contact->find($id)]);
  }

  public function oneReview($id) {
    $contact = Review::find($id);
    return view('one-review', ['data' => $contact]);
  }

  public function update($id) {

    $contact = new Order;

    $cat = new Category;
    $category = [];

    return view('update', ['data' => $contact->find($id), 'category' => $cat->all()]);
  }

  public function update_submit($id, Request $req) {

    $contact = Order::find($id);
    $contact->name = $req->input('name');
    $contact->email = $req->input('email');
    $contact->category = $req->input('category');
    $contact->message = $req->input('message');

    $contact->save();

    return redirect()->route('order-data-one', $id)->with('success', 'Сообщение обновлено');
  }

  public function delete($id) {
    Order::find($id)->delete();
    return redirect()->route('order-data')->with('success', 'Сообщение пользователя удалено');
  }

  public function user_home() {
    $contact = new Category;
    $category = [];

    return view('user', ['category' => $contact->all()]);
  }

  public function create_cours() {
    // $contact = Cours::query()->where('status', '=', 'Подтвержден')->get();
    $contact = Cours::orderBy('id', 'DESC')->get();
    $cours = [];

    return view('create', ['cours' => $contact->all()]);
  }

  public function create_cours_submit(Request $req) {

    $valid = $req->validate([
      'name' => 'required|min:5|max:50',
      'description' => 'required|min:5',
      'contacts' => 'required|min:5',
      'cost' => 'required|regex:/[0-9]/|max:4',
    ]);

    $cours = new Cours;
    $cours->user_id = Auth::id();
    $cours->name = $req->input('name');
    $cours->description = $req->input('description');
    $cours->contacts = $req->input('contacts');
    $cours->cost = $req->input('cost');
    $cours->image = $req->image->store('img/'.$req->file('image')->getClientOriginalName(), 'public');
    $cours->save();

    return redirect()->route('create-cours')->with('success', 'Курс создан');
  }

  public function courses() {

    $contact = Cours::query()->where('status', '=', 'Подтвержден')->get();
    $cours = [];

    return view('courses', ['cours' => $contact->all()]);
  }

  public function cours_submit(Request $req, $id) {

    $storage_cours = new StorageCours();

    $contact = Cours::find($id);

    $storage_cours->user_id = Auth::id();
    $storage_cours->name = $contact->name;
    $storage_cours->description = $contact->description;
    $storage_cours->contacts = $contact->contacts;
    $storage_cours->cost = $contact->cost;
    $storage_cours->status = 'Оформлен';
    $storage_cours->image = '';
    $storage_cours->save();

    return redirect()->route('user')->with('success', 'Курс оформлен');
  }
}
