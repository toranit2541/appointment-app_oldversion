<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function approveAppointment(Appointment $appointment)
    {
        $appointment->update(['admin_approve_status' => 'approved']);

        return redirect()->route('admins.appointments.index')->with('success', 'Appointment approved successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prefix' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'id_card' => 'required|unique:appointments,id_card',
            'birthdate' => 'required|date',
            'email' => 'required|email',
            'appointment_date' => 'required|date',
            
        ]);

        // Extract hour from the input appointment date
        $appointmentDate = $request->appointment_date;
        $startOfHour = date('Y-m-d H:00:00', strtotime($appointmentDate));
        $endOfHour = date('Y-m-d H:59:59', strtotime($appointmentDate));

        // Check if there's already a booking in this hour slot
        $existingAppointment = Appointment::whereBetween('appointment_date', [$startOfHour, $endOfHour])->exists();

        if ($existingAppointment) {
            return back()->withErrors(['appointment_date' => 'This time slot is already booked. Please choose another time.'])->withInput();
        }

        // If no conflict, proceed with the appointment creation
        Appointment::create([
            'prefix' => $request->prefix,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'id_card' => $request->id_card,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
            'appointment_date' => $appointmentDate,
            'admin_approve_status' => 'pending', // Default value
        ]);

        return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully!');
    }


    public function calendar()
    {
        return view('appointments.calendar');
    }

    public function events()
    {
        $appointments = Appointment::all();

        $events = [];
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->first_name . ' ' . $appointment->last_name,
                'start' => $appointment->appointment_date,
            ];
        }

        return response()->json($events);
    }

    public function createBooking(Request $request)
    {
        $selectedDate = $request->query('date'); // Get the date from URL query
        return view('appointments.createbooking', compact('selectedDate'));
    }
}
