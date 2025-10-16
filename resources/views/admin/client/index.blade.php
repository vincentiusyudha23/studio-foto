@extends('admin.master')

@section('title', 'Klien')

@section('content')
    <div class="py-2 h-100" x-data="userData">
        <div class="card" style="min-height: 200px;">
            <div class="card-body">
                <livewire:client-table/>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('userData', () => ({
                deleteUser(id){
                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: 'Data pengguna ini akan dihapus secara permanen!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#b39ddb',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if(result.isConfirmed){
                            Livewire.dispatch('deletedUser', { id: id });
                        }
                    });
                },
                init(){
                    
                }
            }));
        });
    </script>
@endsection