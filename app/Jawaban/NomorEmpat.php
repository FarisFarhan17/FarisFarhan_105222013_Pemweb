<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class NomorEmpat {

    public function getJson() {
        $events = Event::with('user')->get();

        $data = $events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->event . ' - ' . $event->user->name,
                'start' => $event->start,
                'end' => $event->end,
                'color' => $event->user_id == Auth::id() ? '#007bff' : '#6c757d', 
            ];
        });

        return response()->json($data);
    }
}
?>