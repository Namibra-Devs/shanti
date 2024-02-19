<?php

namespace App\Exports;

use App\BasicExtra;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventBookingExport implements FromCollection, WithHeadings, WithMapping
{
    public $bookings;

    public function __construct($bookings)
    {
        $this->bookings = $bookings;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->bookings;
    }

    public function map($booking): array
    {
        return [
            $booking->transaction_id,
            $booking->name,
            $booking->email,
            $booking->phone,
            !empty($booking->event) ? $booking->event->title : '-',
            $booking->amount,
            $booking->quantity,
            $booking->payment_method,
            $booking->status,
            $booking->created_at
        ];
    }

    public function headings(): array
    {
        return [
            'Ticket ID', 'Name', 'Email', 'Phone', 'Event', 'Amount', 'Quantity', 'Gateway', 'Status', 'Date'
        ];
    }
}
