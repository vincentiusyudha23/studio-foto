<?php

namespace App\Livewire;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PemesananTable extends DataTableComponent
{
    public ?int $userId = null;
    public ?int $limit = null;

    public function mount($userId = null, $limit = null)
    {
        $this->userId = $userId;
        $this->limit = $limit;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setColumnSelectDisabled()
            ->setEmptyMessage('Tidak ada data')
            ->setSearchEnabled();
            
        if($this->limit){
            $this->setPaginationDisabled();
        }
    }

    public function builder(): Builder
    {
        return Pemesanan::query()
            ->when($this->userId, fn($q) => $q->where('user_id', $this->userId))
            ->with('user')
            ->latest()
            ->when($this->limit, fn($q) => $q->limit($this->limit));
    }

    public function columns(): array
    {
        return [
            Column::make('Booking ID', 'id')
                ->format(function($val, $row, Column $column){
                    return $row->bookingFormattedId();
                })
                ->sortable(),
            Column::make('Nama Klien', 'id')
                ->format(function($val, $row){
                    $data = Pemesanan::find($val);
                    return $data->user->full_name;
                })
                ->sortable(),
            Column::make('Tipe Order', 'tipe_paket')
                ->format(function($val, $row, Column $column){
                    return ucfirst($val);
                })
                ->sortable(),
            Column::make('Status', 'status')
                ->format(fn($val) => getStatusEnum($val))
                ->html()
                ->sortable(),
            Column::make('Total Foto', 'id')
                ->format(fn($val, $row, Column $column) => $row->foto()->count())
                ->sortable(),
            Column::make('Tanggal Pemesanan', 'created_at')
                ->sortable(),
            Column::make('Aksi', 'id')
                ->view('livewire.action.pemesanan-table-action')
            
        ];
    }

    public function delete($id)
    {
        Pemesanan::find($id)->delete();
    }
}
