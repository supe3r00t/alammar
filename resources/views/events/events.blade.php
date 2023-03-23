@extends('layouts.main')
@section('title','ورش العمل')
@section('content')


    <table class="table">
        <thead>
        <tr>
            <h1>لقائات العمل</h1>

            <th scope="col"></th>
            <th scope="col">انتقال للتسجيل</th>
            <th scope="col">اسم الفعالية</th>
            <th scope="col">تاريخ  ابتداء التسجيل</th>
            <th scope="col">تاريخ انتهاء التسجيل</th>


        </tr>
        </thead>
        <tbody>
        @if($events->count())
            @foreach($events as $event)
                <tr>

                    <th scope="row"></th>
                    <td>
                        <a class="btn btn-secondary" href="{{route('events.show', $event)}}" role="button">{{$event->id}}</a>
                    </td>
                    <td>{{$event->title}}</td>
                    <td>{{$event->start_date}}</td>
                    <td>{{$event->end_date}}</td>


                </tr>
            @endforeach
        @endif


        </tbody>
    </table>

@endsection
