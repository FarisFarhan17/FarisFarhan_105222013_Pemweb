<?php

namespace App\Jawaban;

use Illuminate\Http\Request;
use App\Models\Event;

class NomorTiga {

    public function getData() {
        $events = Event::all();
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
        $event = Event::find($request->id); // Mengambil data berdasarkan ID saja
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
        $event = Event::find($request->id); 
        if ($event) {
            $event->event = $request->event;
            $event->start = $request->start;
            $event->end = $request->end;
            $event->save();
        }
        return redirect()->route('event.home')->with('success', 'Jadwal berhasil diupdate.');
    }

    public function delete(Request $request) {
        Event::where('id', $request->id)->delete(); 
        return redirect()->route('event.home')->with('success', 'Jadwal berhasil dihapus.');
    }
}

?>
