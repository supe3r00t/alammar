{{$event->title}}


<form action="{{route('admin.events.update',$event->id)}}" method="POST">
    @csrf
    @method('patch')
    <input type="text" name="title" value="{{$event->title}}"><br>
    <div>

        <select class="form-select" name="type">
            //الاف الشرطية لحفظ الايفنت عند تعديل
            <option value="event" @if($event->type === 'event') selected @endif>لقائات عمل</option>
            <option value="workshop" @if($event->type === 'workshop') selected @endif>ورش عمل</option>
        </select>
        <label for="start_date"> تاريخ بداء الحدث :</label>
        <input type="start_date"  name="start_date" value="{{$event->start_date}}">
    </div>
    <input type="max_guests" name="max_guests" value="{{$event->max_guests}}">
    <div>
        <label for="end_date"> تاريخ انتهاء الحدث:</label>
        <input type="end_date" id="end_date" value="{{$event->end_date}}">
    </div>



    <button type="submit">ارسال</button>

</form>


