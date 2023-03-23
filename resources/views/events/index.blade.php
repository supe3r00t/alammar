@extends('layouts.main')
@section('title','ملتقى جامعة المجمعة الأول')
@section('content')


    <table class="table">
        <thead>
        <tr>

            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">لقاءات العمل</h5>
                    <a href="{{route('events.events')}}" class="btn btn-secondary stretched-link">Events</a>
                </div>
            </div>

<br>

            <div class="card" style="width: 10rem;">
                <div class="card-body">
                    <h5 class="card-title">ورش  العمل</h5>
                    <a href="{{route('events.workshop')}}" class="btn btn-secondary stretched-link">Workshop</a>
                </div>
            </div>


    </table>

@endsection
