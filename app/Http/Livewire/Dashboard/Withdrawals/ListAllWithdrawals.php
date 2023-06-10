<?php

namespace App\Http\Livewire\Dashboard\Withdrawals;

use Livewire\Component;
use App\Models\Withdrawals;
use Livewire\WithPagination;
use App\Exports\Dashboard\Withdrawals\WithdrawalsExcelReportExport;
use App\Imports\Dashboard\Withdrawals\WithdrawalsExcelReportImport;
use Excel;
use Livewire\WithFileUploads;
class ListAllWithdrawals extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $rows = 10 ;
    public $search ;
    public $status = 'all' ;
    public $start_date;
    public $end_date;
    public $file;

    protected $listeners = ['deleteItem'];


    public function UploadFile()
    {
        $this->validate([
            'file' => 'required|mimes:xlx,xlsx',
        ]);
        Excel::import(new WithdrawalsExcelReportImport, $this->file);
        $this->emit('withdrawalsUpdated');

    }



    public function excelReport()
    {
        $withdrawals = Withdrawals::when($this->search , function($query){
            $query->where('number' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->status != 'all' , function($query){
            $query->where('status' , $this->status );
        })
        ->when($this->start_date , function($query){
            $query->whereDate('created_at' , '>=' , $this->start_date );
        })
        ->when($this->end_date , function($query){
            $query->whereDate('created_at' , '<=' , $this->end_date );
        })
        ->get();

        return Excel::download(new WithdrawalsExcelReportExport($withdrawals), 'withdrawals.xlsx');
    }

    public function deleteItem($item_id)
    {
        $Withdrawal = Withdrawals::find($item_id);
        $Withdrawal->delete();
        $this->emit('itemDeleted');
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedRows()
    {
        $this->resetPage();
    }

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $withdrawals = Withdrawals::when($this->search , function($query){
            $query->where('number' , 'LIKE' , '%'.$this->search.'%' );
        })
        ->when($this->status != 'all' , function($query){
            $query->where('status' , $this->status );
        })
        ->when($this->start_date , function($query){
            $query->whereDate('created_at' , '>=' , $this->start_date );
        })
        ->when($this->end_date , function($query){
            $query->whereDate('created_at' , '<=' , $this->end_date );
        })
        ->paginate($this->rows);
        return view('livewire.dashboard.withdrawals.list-all-withdrawals' , compact('withdrawals'));
    }
}
