

@extends('layouts.main')
@section('title','لوحة تحكم')
@section('content')
<style>
    td, tr {
        border: 1px solid black;
    }
</style>
<table>


    <div class="card" style="width: 10rem;">
        <div class="card-body">
            <h5 class="card-title">انشاء احداث</h5>
            <a href="{{route('events.create')}}" class="btn btn-secondary stretched-link">{{ __('Create') }}</a>
        </div>
    </div>




    <tr>
        <th scope="col">انتقال </th>
        <th scope="col">نوع الحدث</th>
        <th scope="col">تاريخ  ابتداء التسجيل</th>
        <th scope="col">تاريخ انتهاء التسجيل</th>
        <th scope="col">عدد الضيوف المسموح</th><br>
        <th scope="col">تعديل</th>
        <th scope="col">حذف</th>



    </tr>
    @foreach($events as $event)
        <tr>
            <td><a href="{{route('admin.events.show', $event)}}">{{$event->title}}</a></td>
            <td>{{$event->type}}</td>
            <td>{{$event->start_date}}</td>
            <td>{{$event->end_date}}</td>
            <td>{{$event->max_guests}}</td>
            <td><a href="{{route('admin.events.edit', $event)}}">{{ __('Edit') }}</a></td>
            <td><a href="{{route('admin.events.delete', $event)}}">{{ __('Delete') }}</a></td>


        </tr>

    @endforeach

</table>

@endsection
