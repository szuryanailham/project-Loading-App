<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class RegistrationsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DB::table('registrations')
            ->join('events', 'registrations.event_id', '=', 'events.id')
            ->select(
                'registrations.id',
                'events.name as event_name',   // ganti ID dengan nama event
                'registrations.name',
                'registrations.email',
                'registrations.phone',
                'registrations.Alamat',
                'registrations.birth_date',
                'registrations.gender',
                'registrations.source',
                'registrations.payment_proof',
                'registrations.status',
                'registrations.notes',
                'registrations.created_at',
                'registrations.updated_at'
            )
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Event Name',   // judul kolom diganti juga
            'Name',
            'Email',
            'Phone',
            'Alamat',
            'Birth Date',
            'Gender',
            'Source',
            'Payment Proof',
            'Status',
            'Notes',
            'Created At',
            'Updated At',
        ];
    }
}
