<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function new()
    {
        $reviews = Review::query()->where('status', false)->paginate(10);

        return view('admin.reviews.new', compact('reviews') );
    }

    public function all()
    {
        $reviews = Review::query()->where('status', true)->paginate(10);

        return view('admin.reviews.all', compact('reviews') );
    }

    public function add()
    {
        return view('admin.reviews.add');
    }

    public function store(Request $request)
    {
        $review = new Review();

        $review->name = $request->get('name');
        $review->email = $request->get('email');
        $review->text  = $request->get('text');
        $review->status = true;
        $review->created_at = $request->get('date').' '.$request->get('time');

        $review->save();

        return redirect()->back()->with('success', 'Отзыв успешно добавлен');
    }

    public function edit(Request $request)
    {

    }

    public function update(Request $request)
    {
        return redirect()->back()->with('success', 'Отзыв успешно отредактирован');
    }

    public function accept(Review $review)
    {
        $review->status = true;

        $review->save();

        session()->flash('success', 'Отзыв принят');

        return redirect()->back();
    }

    public function remove(Review $review)
    {
        $review->delete();

        session()->flash('success', 'Отзыв удален');

        return redirect()->back();
    }
}
