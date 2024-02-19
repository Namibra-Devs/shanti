<?php

namespace App\Exports;

use App\BasicExtra;
use App\ProductOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PorductOrderExport implements FromCollection, WithHeadings, WithMapping
{
    public $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->orders;
    }

    public function map($order): array
    {

        return [
            $order->order_number,
            $order->billing_fname,
            $order->billing_email,
            $order->billing_number,
            $order->billing_city,
            $order->billing_country,
            // $order->shpping_fname,
            // $order->shpping_email,
            // $order->shpping_number,
            // $order->shpping_city,
            // $order->shpping_country,
            $order->method,
            !empty($order->shipping_method) ? $order->shipping_method : '-',
            $order->payment_status,
            $order->order_status,
            $order->cart_total,
            $order->discount,
            $order->tax,
            $order->shipping_charge,
            $order->total,
            $order->created_at
        ];
    }

    public function headings(): array
    {
        return [
            'Order Number', 'Billing Name', 'Billing Email', 'Billing Phone', 'Billing City', 'Billing Country', 'Payment Status', 'Order Status', 'Cart Total', 'Discount', 'Tax', 'Shipping Charge', 'Total', 'Date'
        ];
    }
}
