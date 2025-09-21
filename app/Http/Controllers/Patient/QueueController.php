<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Queue;
use Illuminate\Support\Facades\Auth;

class QueueController extends Controller
{
    public function index()
    {
        $queues = Queue::with('appointment')
            ->whereHas('appointment', fn($q) => $q->where('patient_id', Auth::id()))
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('patient.queue.index', compact('queues'));
    }
}
