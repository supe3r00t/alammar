

@extends('layouts.main')
@section('title','استعراض ورش العمل')
@section('content')




    <h1>{{$event->title}}</h1>
<h4>{{$event->start_date}}</h4>
<h4>{{$event->end_date}}</h4>
<h4>{{$event->max_guests}}</h4>


@foreach($errors->all() as $error)
    <div>{{$error}}</div>
@endforeach
@if($event->guests->count() < $event->max_guests)
    <form method="post" action="{{route('events.signup', $event)}}">
        @csrf
        <div>
            <label for="name">Name:</label>
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
