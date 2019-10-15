<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalenadar\Facades\Calendar;
use  Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Requestinput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Alert;
use App\Mail\SendEmail;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $event = [];

        foreach ($events as $row) {
            
            $event[] = \Calendar::event(
                $row->title,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }
        
        $calendar = \Calendar::addEvents($event);
        return view('eventpage',compact('events','calendar')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
        return view('addevent');
    }

    public function create(Request $request)
    {


        $this->validate($request,[
            'start_date'=>'required',
            'email_visit'=>'required',
            'phone_visit'=>'required',
        ]);
       
       
       
        if (Event::where('start_date', $request->start_date)->count()>=4) {
            return redirect('/')->with('error','Hora Ocupada');
        }else{
            $end = new Carbon($request->start_date);
            
            $events = new Event(array(
                'title' => "Llamada",
                'color' => '#ffd700',
                'email_visit' => $request->email_visit,
                'phone_visit' => $request->phone_visit,
                'name_visit' => $request->name_visit,
                'start_date' => $request->start_date,
                'end_date' =>   $end->addHours(1),
                'status' => "Llamar",
            ));
   
            $events->save();

           

            $data= array(
               'init'=>$request->start_date,
               'finish'=>$end,
            );
            
            
            
            $mail = new SendEmail($data);
            Mail::to($events->email_visit)
            ->send($mail);



            return redirect('/')->with('success','Cita agregada');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'start_date'=>'required',
        ]);
        
        
        
        if (Event::where('start_date', '=', Input::get('start_date'))->count()>=4) {
            return redirect('home')->with('error','Hora Ocupada');
        }else{
            $end = new Carbon($request->get('start_date'));
            $events = new Event(array( 
                'title' => "Habilitacion",
                'color' => '#5e227f',
                'users_id' => auth()->id(),
                'start_date' => $request->get('start_date'),
                'end_date' =>   $end->addHours(1),
            ));
   
            $events->save();

            $data= array(

               'init'=>$request->get('start_date'),
               'finish'=>$end,
            );

            Mail::send('emails.Appointment', $data, function ($message) {

                $message->from('lawiert02@gmail.com','Curso laravel');

                $message->to(auth()->user()->email)->subject('Agendamiento de cita ');

            });
            
            return redirect('home')->with('success','Cita agregada');
        }        

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$events =Event::join('users','users.id','=','events','events.users_id')->Select('events.id','events.title','events.color','events.start_date','events.end_date','users.email');
        $events = Event::with(['user:id,email'])->orderBy('id','DESC')->paginate(3);

        //return response()->json($events);
        //return view('display')->with('events',$events);
        
        return view('cancel', [
            "events"=>$events
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events =Event::find($id);
        return view('status',compact('events','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'status'=>'required',
        ]);


        $events = Event::find($id);
     
        $events->status = $request->input('status');
      
        $events->save();

        return redirect('cancel')->with('success','Cita Actualizada');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $events = Event::find($id);
        $events->delete();
        return redirect('cancel')->with('success','cita cancelada correctamente');
    }
    public function read()
    {
        $result= Event::Select(['start_date',
                                'end_date'
                                ])->where('id_user','=',auth()->id());
        return view('eventpage',compact('result')); 
    }
}
