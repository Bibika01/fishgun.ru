<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Telegram\Bot;
use \Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::query()->where('status', 1)->paginate(6);

        return view('reviews', compact('reviews') );
    }

    public function add(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'text'  => 'required',
            ]
        );

        if ($validator->fails())
        {
//            return response()->json(['errors' => $validator->errors()->all() ]);

            return redirect()->back();
        }

        try
        {
            $review = new Review();

            $review->name = $request->name;
            $review->email = $request->email;
            $review->text  = $request->text;
            $review->status = false;

            $review->save();

            try
            {
                Bot::send__new__review(
                    $review->id,
                    $review->name,
                    $review->email,
                    $review->text,
                    date_format($review->created_at,'Y-m-d'),
                    date_format($review->created_at,'H:i:s')
                );
            }
            catch(\Exception $e)
            {

            }

//            return response()->json(['success' => $review->name.' ваш отзыв добавлен']);
            return redirect()->back();
        }
        catch (\Exception $e)
        {
//            return response()->json(['failed' => 'Что то пошло не так']);
            return redirect()->back();
        }

    }
}
