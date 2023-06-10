<?php

namespace App\Imports\Dashboard\Orders;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Order;
class OrdersExcelReportImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {   
            if ($row[0] == null ) {
                continue;
            } else {
                $order = Order::where('number' , $row[0])->first();
                if ($order) {
                    $order->shipping_statues_id = $row[1];
                    $order->save();
                }
            }
        }
    }
}
