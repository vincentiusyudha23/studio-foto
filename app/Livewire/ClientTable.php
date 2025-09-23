<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class ClientTable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setEmptyMessage('Tidak ada data')
            ->setSearchEnabled();
    }

    public function builder(): Builder
    {
        return User::query()->where('role', 'customer')->latest();
    }

    public function columns(): array
    {
        return [
            Column::make('Nama', 'id')
                ->format(function ($val){
                    $user = User::find($val);
                    return <<<HTML
                        <a href="#" class="text-decoration-none text-black">
                            {$user->full_name}
                        </a>
                    HTML;
                })
                ->html()
                ->sortable(),
            Column::make("No hp", "no_hp")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make('Pemesanan', 'id')
                ->format(function($val){
                    return 20;
                })
                ->sortable(),
            Column::make('Aksi', 'id')
                ->view('livewire.action.user-table-action')
        ];
    }
}
