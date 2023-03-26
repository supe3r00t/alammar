<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
    $now = now()->format('Y-m-d H:i:s');
    $events = Event::where('start_date', '<=', $now)
        ->where('end_date', '>=', $now)->where('type', 'event')->get();

    $workshops = Event::where('start_date', '<=', $now)
        ->where('end_date', '>=', $now)->where('type', 'workshop')->get();

    return view('events.index', compact('events', 'workshops'));
}

    public function show(Event $event){
        // تشيك على الوقت اذا كان يساوي نفس تاريخ
        $now = now()->format('Y-m-d H:i:s');
        if($event->start_date <= $now
            && $event->end_date >= $now )
        {
            return view('events.show', compact('event'));
        }else{
            // في حال عدم تحقق الشرط، نرجع للصفحة الرئيسية لعرض الأحداث
            return redirect()->route('events.index');
        }
    }

    public function signup(Event $event){

        $validatedData = request()->validate([
            'name' => 'required|min:5|max:40',
            'phone' => 'required|min:10|max:10',
            'title' => 'required'
        ]);

        $now = now()->format('Y-m-d H:i:s');
        // كم عدد الضيوف في هذا الحدث
        $guestsCount = $event->guests->count();
        // كم عدد الهواتف المسجلة بنفس الرقم المرسل
        $phoneExist = $event->guests()->where('phone', request('phone'))->count();

        if(
            $guestsCount < $event->max_guests
            && !$phoneExist
            && $event->start_date <= $now // تاريخ البداية اصغر من الآن حتى مايجيب شيء مافتح
            && $event->end_date >= $now // تاريخ النهاية اكبر من الآن حتى مايجيب شيء منتهي
        ){
            $event->guests()->create(request()->all());
            return back();
        }else{
            return back()->withErrors(['msg' =>
                "الرجاء التحقق من أنك لم تقم بالتسجيل مسبقا وان هذا الحدث متاح التسجيل به"]);

        }




    }

    public function create()
    {

       return view('events.create');
    }


    public function store(Request $request)
    {

        Event::create([

          'title'=> $request->title,
        'workshop'=>$request->workshop,
        'event'=>$request->event,
        'start_date' =>$request->start_date,
        'end_date'=>$request->end_date,
       'max_guests'=>$request->max_guests,



        ]);



      return response('تم ارسالة الفعالية بنجاح');
    }


        public function workshops(Event $workshop){
        $now = now()->format('Y-m-d H:i:s');
        // select * from events where start_date <= $now;
        $workshops = Event::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)->where('type', 'workshop')->get();

        return view('events.workshop', compact( 'workshops'));
    }



   public function events(){

    $now = now()->format('Y-m-d H:i:s');
//    $event = Event::where('start_date', '<=', $now)
//        ->where('end_date', '>=', $now)->where('type', 'event')->get();

       $name = 'Ahmad';
    $events = Event::where('start_date', '<=', $now)
        ->where('end_date', '>=', $now)->where('type', 'event')->get();

    return view('events.events', compact( 'events', 'name'));



    }



    public function edit(Event $event){


        return view('admin.events.edit', compact('event'));
    }
    public function update(Event $event){
        $event->update(request()->all());
        return back();
    }
}
