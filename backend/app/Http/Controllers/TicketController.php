<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\AssignTicketRequest;
use App\Http\Requests\UpdateTicketStatusRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with(['user:id,name', 'category:id,name', 'assignedTech:id,name'])->get();
        return response()->json($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = 1;

        $ticket = Ticket::create($data);

        return response()->json([
            'message' => 'Ticket creado exitosamente',
            'ticket' => $ticket
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(UpdateTicketStatusRequest $request, Ticket $ticket)
    {
        $ticket->status = $request->validated()['status'];

        $ticket->save();

        $ticket->load(['user:id,name', 'category:id,name', 'assignedTech:id,name']);

        return response()->json([
            'message' => 'Estado del ticket actualizado exitosamente',
            'ticket' => $ticket
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function assignTicket(AssignTicketRequest $request, Ticket $ticket) {
        $ticket->assigned_to = $request->validated()['assigned_to'];

        $ticket->status = 'in_progress';

        $ticket->save();

        $ticket->load(['assignedTech:id,name']);

        return response()->json([
            'message' => 'Ticket asignado exitosamente',
            'ticket' => $ticket
        ]);
    }
}
