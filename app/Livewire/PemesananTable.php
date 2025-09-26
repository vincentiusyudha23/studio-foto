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
            Column::make('Booking ID', 'id')
                ->format(function($val, $row, Column $column){
                    return $row->bookingFormattedId();
                })
                ->sortable(),
            Column::make('Nama Klien', 'id')
                ->format(function($val, $row){
                    $data = Pemesanan::find($val);
                    $metadata = json_decode($data->metadata, true);
                    return data_get($metadata, 'nama_lengkap', $data->user->full_name);
                })
                ->sortable(),
            Column::make('Tanggal Pemotretan', 'tanggal_pelaksanaan')
                ->format(fn($val) => $val->format('d-m-Y'))
                ->sortable(),
            Column::make('Waktu Pemotretan', 'id')
                ->format(function($val, $row, Column $column){
                    $data = Pemesanan::find($val);
                    $metadata = json_decode($data->metadata, true);
                    return data_get($metadata, 'jam_potret');
                }),
            Column::make('Status', 'status')
                ->format(fn($val) => getStatusEnum($val))
                ->html()
                ->sortable(),
            Column::make('Total Foto', 'id')
                ->format(fn($val, $row, Column $column) => $row->foto()->count())
                ->sortable(),
            Column::make('Created At', 'created_at')
                ->sortable(),
            Column::make('Aksi', 'id')
                ->view('livewire.action.pemesanan-table-action')
            
        ];
    }
}
