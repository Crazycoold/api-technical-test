<?php

namespace App\Traits;

use App\Models\basic\basic;
use App\Models\bookings\bookings;
use App\Models\bookings\buyers;
use App\Models\bookings\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

trait DataManagement
{
    use ApiResponser;

    protected function getData()
    {
        return response()->json(events::with(['place'])->get());
    }

    protected function validateDni(Request $request)
    {
        $data = buyers::where('dni', $request->record)->first();
        if ($data != null) {
            $bookings = bookings::where('id_buyers', $data->id)->with(['events'])->get();
        } else {
            $bookings = null;
        }

        return response()->json(['data' => $data, 'bookings' => $bookings]);
    }

    protected function save(Request $request)
    {
        try {
            DB::beginTransaction();
            $basic = new basic();
            if ($request->record['id'] == '') {
                $validador = Validator::make($request->record, [
                    'dni' => 'required|max:20|string',
                    'first_name' => 'required|max:50|string',
                    'last_name' => 'required|max:50|string',
                    'first_surname' => 'required|max:50|string',
                    'last_surname' => 'required|max:50|string',
                    'phone' => 'required|max:10|string',
                    'email' => 'required|max:50|string',
                    'event' => 'required|max:50|string|exists:events,id',
                    'ticket' => 'required|integer',
                ]);
                if ($validador->fails()) {
                    return response()->json([
                        'status' => 'validator',
                        'errors' => $validador->errors(),
                    ]);
                }

                $buyers = new buyers();
                $buyers->id = $basic->generateId('BURS');
                $buyers->dni = $request->record['dni'];
                $buyers->first_name = strtoupper($request->record['first_name']);
                $buyers->last_name = strtoupper($request->record['last_name']);
                $buyers->first_surname = strtoupper($request->record['first_surname']);
                $buyers->last_surname = strtoupper($request->record['last_surname']);
                $buyers->phone = $request->record['phone'];
                $buyers->email = $request->record['email'];
                $buyers->save();

                $bookings = new bookings();
                $bookings->id = $basic->generateId('BOGS');
                $bookings->id_buyers = $buyers->id;
                $bookings->id_events = $request->record['event'];
                $bookings->tickets = $request->record['ticket'];
                $bookings->save();

                $events = events::where('id', $request->record['event'])->first();
                $events->availability = intval($events->availability) - intval($request->record['ticket']);
                $events->save();

                if ($events) {
                    DB::commit();
                    return response()->json([
                        'status' => 'save',
                    ]);
                } else {
                    DB::rollBack();
                    return response()->json([
                        'status' => 'error']);
                }
            } else {
                $validador = Validator::make($request->record, [
                    'dni' => 'required|max:20|string',
                    'first_name' => 'required|max:50|string',
                    'last_name' => 'required|max:50|string',
                    'first_surname' => 'required|max:50|string',
                    'last_surname' => 'required|max:50|string',
                    'phone' => 'required|max:10|string',
                    'email' => 'required|max:50|string',
                    'event' => 'required|max:50|string|exists:events,id',
                    'ticket' => 'required|integer',
                ]);
                if ($validador->fails()) {
                    return response()->json([
                        'status' => 'validator',
                        'errors' => $validador->errors(),
                    ]);
                }

                $buyers = buyers::find($request->record['id']);
                $buyers->dni = $request->record['dni'];
                $buyers->first_name = strtoupper($request->record['first_name']);
                $buyers->last_name = strtoupper($request->record['last_name']);
                $buyers->first_surname = strtoupper($request->record['first_surname']);
                $buyers->last_surname = strtoupper($request->record['last_surname']);
                $buyers->phone = $request->record['phone'];
                $buyers->email = $request->record['email'];
                $buyers->save();

                $bookings = new bookings();
                $bookings->id = $basic->generateId('BOGS');
                $bookings->id_buyers = $buyers->id;
                $bookings->id_events = $request->record['event'];
                $bookings->tickets = $request->record['ticket'];
                $bookings->save();

                $events = events::where('id', $request->record['event'])->first();
                $events->availability = intval($events->availability) - intval($request->record['ticket']);
                $events->save();

                if ($events) {
                    DB::commit();
                    return response()->json([
                        'status' => 'save',
                    ]);
                } else {
                    DB::rollBack();
                    return response()->json([
                        'status' => 'error']);
                }
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'code' => $e->getCode(),
            ],
            ]);
        }
    }
}
