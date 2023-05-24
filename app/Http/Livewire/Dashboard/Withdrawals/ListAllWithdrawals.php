<?php

namespace App\Http\Livewire\Dashboard\Withdrawals;

use Livewire\Component;
use App\Models\Withdrawals;
use Livewire\WithPagination;
class ListAllWithdrawals extends Component
{
    use WithPagination;
    public $rows = 10;
    public $search = '';

    protected $listeners = ['deleteItem'];

 

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
        $withdrawals = Withdrawals::query()->with(['user']);

        if($this->search != '')
            $withdrawals = $withdrawals->where('number' , 'LIKE' , '%'.$this->search.'%');

        $withdrawals = $withdrawals->latest()->paginate($this->rows);


        return view('livewire.dashboard.withdrawals.list-all-withdrawals' , compact('withdrawals'));
    }
}
