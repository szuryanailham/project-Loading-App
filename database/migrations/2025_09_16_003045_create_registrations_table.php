<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistrationsExport implements FromCollection, WithHeadings
{
    /**
     * Ambil semua data registrations
     */
    public function collection()
    {
        return Registration::select(
            'id',
            'event_id',
            'name',
            'email',
            'phone',
            'Alamat',
            'birth_date',
            'gender',
            'source',
            'payment_proof',
            'status',
            'notes',
            'created_at',
            'updated_at'
        )->get();
    }

    /**
     * Header kolom untuk Excel
     */
    public function headings(): array
    {
        return [
            'ID',
            'Event ID',
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
