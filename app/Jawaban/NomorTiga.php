<?php

namespace App\Jawaban;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class NomorTiga {

    public function getData() {
        $events = Event::where('user_id', Auth::id())->get(); 
        $data = [];
        foreach ($events as $event) {
            $data[] = [
                'id' => $event->id,
                'event' => $event->event,
                'start' => $event->start,
                'end' => $event->end,
            ];
        }
        return $data;
    }

    public function getSelectedData(Request $request) {
        $event = Event::where('id', $request->id)
                      ->where('user_id', Auth::id())
                      ->first();
        if ($event) {
            $data = [
                'id' => $event->id,
                'event' => $event->event,
                'start' => $event->start,
                'end' => $event->end,
            ];
        } else {
            $data = [];
        }
        return response()->json($data);
    }

    public function update(Request $request) {
        $event = Event::where('id', $request->id)
                      ->where('user_id', Auth::id())
                      ->first(); 
        if ($event) {
            $event->event = $request->event;
            $event->start = $request->start;
            $event->end = $request->end;
            $event->save();
        }
        return redirect()->route('event.home');
    }

    public function delete(Request $request) {
        Event::where('id', $request->id)
             ->where('user_id', Auth::id())
             ->delete(); 
        return redirect()->route('event.home');
    }
}
?>
