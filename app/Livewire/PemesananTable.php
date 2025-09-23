<?php

namespace App\Livewire;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class PemesananTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setEmptyMessage('Tidak ada data')
            ->setSearchEnabled();
    }

    public function builder(): Builder
    {
        return Pemesanan::query()->with('user')->latest();
    }

    public function columns(): array
    {
        return [
            Column::make('Nama Paket', 'id')
                ->sortable(),
            Column::make('Tipe Paket', 'id')
                ->sortable(),
            Column::make('Nama Klien', 'id')
                ->format(function($row){
                    return $row->user->full_name;
                })
                ->sortable(),
            Column::make('Tanggal Pemotretan', 'tanggal_pelaksanaan')
                ->sortable(),
            Column::make('Status', 'id')
                ->sortable(),
            Column::make('Created At', 'created_at')
                ->sortable(),
            
        ];
    }
}
