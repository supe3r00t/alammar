@extends('layouts.main')
@section('title','ورشة عمل')
@section('content')


        <table class="table">
            <thead>
            <tr>
                <h1>ورش العمل</h1>

                <th scope="col"></th>
                <th scope="col">انتقال للتسجيل</th>
                <th scope="col">اسم الفعالية</th>
                <th scope="col">تاريخ  ابتداء التسجيل</th>
                <th scope="col">تاريخ انتهاء التسجيل</th>


            </tr>
            </thead>
            <tbody>
            @if($workshops->count())
                @foreach($workshops as $workshop)
                    <tr>

                        <th scope="row"></th>
                        <td>
                        <a class="btn btn-secondary" href="{{route('events.show', $workshop)}}" role="button">#</a>
                        </td>
                        <td>{{$workshop->title}}</td>
                        <td>{{$workshop->start_date}}</td>
                        <td>{{$workshop->end_date}}</td>


                    </tr>
                @endforeach
            @endif


            </tbody>
        </table>


@endsection
