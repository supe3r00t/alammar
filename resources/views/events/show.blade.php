

@extends('layouts.main')
@section('title','استعراض ورش العمل')
@section('content')





    <div class="card" style="width: 18rem;">
        <div class="card-header">
            <h5> الفعالية</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"> <h2>اسم الفعالية:  {{$event->title}}</h2></li>
            <li class="list-group-item"> تاريخ البداية:  {{$event->start_date}}</li>
            <li class="list-group-item"> تاريخ النهاية:  {{$event->start_date}}</li>
            <li class="list-group-item"> عدد الزوار المسموح به:  {{$event->max_guests}}</li>

        </ul>
    </div>
@foreach($errors->all() as $error)
    <div>{{$error}}</div>
@endforeach
@if($event->guests->count() < $event->max_guests)
    <form method="post" action="{{route('events.signup', $event)}}">
        @csrf



        <div>
            <label for="name">اسم الزائر:</label>
            <select name="title" id="">
                <option value="mr">Mr</option>
                <option value="mrs">Mrs</option>
                <option value="ms">Ms</option>
            </select>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone">
        </div>
        <button type="submit">Signup</button>
    </form>
@else
    <h1>التسجيل مغلق، انتهى العدد المسموح به</h1>
@endif


@endsection
