<?php

namespace App\Http\Controllers\Api;

use App\Models\Lead;
use App\Mail\LeadToLead;
use App\Mail\LeadToAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $validation_rules = [
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|max:256',
            'message'       => 'required|string|max:6000',
            'mailinglist'   => 'required|boolean'
        ];



        try {
            $lead = Lead::create($form_data);

            Mail::to($lead->email)->send(new LeadToLead($lead));

            Mail::to('admin@bool.press')->send(new LeadToAdmin($lead));
        } catch(\Exception $error) {
            return response()->json([
                'success'   => false,
                'response'  => 'C\' è stato un errore, riprovare'
            ], 500);
        }

        return response()->json([
            'success'   => true,
            'response'  => 'Il messaggio è stato inviato, riceverai una email al più presto'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
