<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Izinkan semua user untuk melakukan request ini
        return true;
    }

    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:20',
            'Alamat'        => 'required|string|max:255',
            'birth_date'    => 'required|date',
            'gender'        => 'required|in:male,female',
            'event_id'      => 'required|integer|exists:events,id',
            'source'        => 'required|string|max:50',
            'social_media'  => 'required|string|max:50',
            'notes'         => 'required|string',
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'required'      => ':attribute wajib diisi.',
            'string'        => ':attribute harus berupa teks.',
            'max'           => ':attribute tidak boleh lebih dari :max karakter.',
            'email'         => 'Format :attribute tidak valid.',
            'date'          => ':attribute harus berupa tanggal yang valid.',
            'in'            => ':attribute harus bernilai male atau female.',
            'integer'       => ':attribute harus berupa angka.',
            'exists'        => ':attribute tidak ditemukan dalam data event.',
            'file'          => ':attribute harus berupa file.',
            'mimes'         => ':attribute harus berupa file dengan format jpg, jpeg, png, atau pdf.',
            'payment_proof.max' => 'Ukuran file :attribute tidak boleh lebih dari 2MB.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'          => 'Nama',
            'email'         => 'Email',
            'phone'         => 'Nomor Telepon',
            'Alamat'        => 'Alamat',
            'birth_date'    => 'Tanggal Lahir',
            'gender'        => 'Jenis Kelamin',
            'event_id'      => 'ID Event',
            'source'        => 'Sumber',
            'social_media'  => 'Media Sosial',
            'notes'         => 'Catatan',
            'payment_proof' => 'Bukti Pembayaran',
        ];
    }
}
