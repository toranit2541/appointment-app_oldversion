<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create($request->all());

        return redirect()->route('admins.index')->with('success', 'สร้างผู้ใช้งานสำเร็จ');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admins.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admins.index')->with('success', 'อัพเดตผู้ใช้งานสำเร็จ');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admins.index')->with('success', 'ลบผู้ใช้งานสำเร็จ');
    }

    // public function appointments()
    // {
    //     $appointments = Appointment::all();
    //     return view('admins.appointments', compact('appointments'));
    // }

    public function appointments()
    {
        // Ensure the 'admin_approve_status' column is used correctly
        $pendingAppointments = Appointment::where('admin_approve_status', 'pending')->get();
        $approvedAppointments = Appointment::where('admin_approve_status', 'approved')->get();

        // Debugging: Check if the variables contain data
        // dd($pendingAppointments, $approvedAppointments);

        return view('admins.appointments', compact('pendingAppointments', 'approvedAppointments'));
    }
    public function showAppointment(Appointment $appointment)
    {
        return view('admins.appointment_show', compact('appointment'));
    }

    public function editAppointment(Appointment $appointment)
{
    return view('admins.appointment_edit', compact('appointment'));
}

    public function approveAppointment($id)
    {
        // Find the appointment by ID
        $appointment = Appointment::findOrFail($id);

        // Update the status to 'approved'
        $appointment->admin_approve_status = 'approved';
        $appointment->save();

        return redirect()->route('admins.appointments.index')->with('success', 'Appointment approved successfully!');
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        $request->validate([
            'prefix' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'id_card' => 'required',
            'birthdate' => 'required|date',
            'email' => 'required|email',
            'appointment_date' => 'required|date',
        ]);

        $appointment->update([
            'prefix' => $request->prefix,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'id_card' => $request->id_card,
            'birthdate' => $request->birthdate,
            'email' => $request->email,
            'appointment_date' => $request->appointment_date,
        ]);

        return redirect()->route('admins.appointments')->with('success', 'Appointment updated successfully!');
    }


    public function destroyAppointment(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admins.appointments')->with('success', 'Appointment deleted successfully!');

    }


    public function exportAppointments()
    {
        // Fetch only approved appointments
        $appointments = Appointment::where('admin_approve_status', 'approved')->get();

        $csvFileName = 'approved_appointments_' . date('Ymd_His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        return response()->streamDownload(function () use ($appointments) {
            $handle = fopen('php://output', 'w');

            // Add CSV column headers
            fputcsv($handle, ['ลำดับ', 'คำนำหน้า', 'ชื่อ', 'นามสกุล', 'อีเมล', 'วัน-เดือน-ปี เกิด', 'เลขบัตรประชาชน', 'วันที่จอง', 'สร้างเมื่อ']);

            // Write approved appointments to the CSV file
            foreach ($appointments as $appointment) {
                fputcsv($handle, [
                    $appointment->id,
                    $appointment->prefix,
                    $appointment->first_name,
                    $appointment->last_name,
                    $appointment->email,
                    $appointment->birthdate,
                    $appointment->id_card,
                    $appointment->appointment_date,
                    $appointment->created_at,
                ]);
            }

            fclose($handle);
        }, $csvFileName, $headers);
    }


}