@extends('layouts.admin')

@section('content')
    <div class="card container">
        <div class="col-lg-12 d-flex align-items-center justify-content-between mt-3 mb-3">
            <h3 class="m-2 ml-0">Новые отзывы</h3>
        </div>
        @if( count($reviews) > 0 )
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Ел. почта</th>
                    <th scope="col">Сообщение</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->email }}
                        <td>{{ $review->text }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.reviews.accept', $review->id) }}">
                                <span class="fas fa-check"></span>
                            </a>
                            <a class="btn btn-danger" href="{{ route('admin.reviews.remove', $review->id) }}">
                                <span class="fas fa-times"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <div class="col-lg-1">
                    {{ $reviews->links() }}
                </div>
            </table>
        @else
            <p class="m-2 mb-4 text text-secondary">Новых отзывов нет</p>
        @endif
    </div>
@endsection
