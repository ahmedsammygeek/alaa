<?php

namespace App\Http\Livewire\Dashboard\Marketers;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Jobs\DeleteImagesFromAWSJob;
class ListAllMarkters extends Component
{
    use WithPagination;
    public $rows = 10;
    public $search = '';

    protected $listeners = ['deleteItem'];



    public function deleteItem($item_id)
    {
        $marketer = User::find($item_id);
        $image = 'users/'.$marketer->image;
        $marketer->delete();
        DeleteImagesFromAWSJob::dispatch($image);
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
        $marketers = User::query();

        $marketers->where(function($query){
            $query->where('type' , User::MARKETER );
        });

        $marketers->when($this->search , function($query){
            $query->where('name' , 'LIKE' , '%'.$this->search.'%' )->orWhere('name' , 'LIKE' , '%'.$this->search.'%' )->orWhere('phone' , 'LIKE' , '%'.$this->search.'%' )->orWhere('email' , 'LIKE' , '%'.$this->search.'%' );
        });
        $marketers = $marketers->latest()->paginate($this->rows);
        return view('livewire.dashboard.marketers.list-all-markters' , compact('marketers'));
    }
}
