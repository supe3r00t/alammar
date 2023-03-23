

@extends('layouts.main')
@section('title','أنشاء ورش جديدة')
@section('content')

<form action="{{route('events.store')}}" method="post">
@csrf
    <input type="text" name="title" placeholder="عنوان الفعالية"><br>
    <div>

        <select class="form-select" aria-label="type">
            <option value="1">لقائات عمل</option>
            <option value="2">ورش عمل</option>
        </select>
        <label for="start_date"> تاريخ بداء الحدث :</label>
        <input type="date" id="start_date" name="start_date">
    </div>
    <input type="max_guests" name="max_guests" placeholder="عدد الزوار">
    <div>
        <label for="end_date"> تاريخ انتهاء الحدث:</label>
        <input type="date" id="end_date" name="end_date">
    </div>



<button type="submit">ارسال</button>

</form>

@endsection
