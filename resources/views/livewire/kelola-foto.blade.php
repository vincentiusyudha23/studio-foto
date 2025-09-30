<div class="w-100 card shadow-sm" x-data="kelolaFoto">
    <style>
        #lp__upload-image .modal-body{
            min-height: 60dvh; /* Diperkecil sedikit agar tombol tidak ketutup */
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
        }

        #lp__upload-image .dropzone{
            height: 100%;
            min-height: unset !important;
            border: 2px dashed #ccc !important;
            border-radius: 8px;
            background: #fafafa;
            display: flex;
            align-items: center;
            justify-content: center; 
            flex-wrap: wrap;
            transition: all 0.3s ease;
            margin: 0;
        }
        
        #lp__upload-image .dropzone:hover {
            border-color: #0d6efd !important;
            background-color: #f8f9fa;
        }
        
        #lp__upload-image .dropzone .dz-message {
            text-align: center;
            margin: 0;
        }
        
        #lp__upload-image .modal-content {
            min-height: 70vh; /* Memastikan modal cukup tinggi */
        }
        
        #lp__upload-image .modal-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid #dee2e6;
            background: #f8f9fa;
        }
        
        .img-card {
            position: relative;
            width: 200px;
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .img-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1) !important;
        }
        
        .img-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .img-card:hover img {
            transform: scale(1.05);
        }
        
        .img-title {
            background-color: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            transition: background-color 0.3s ease;
        }
        
        .img-card:hover .img-title {
            background-color: #e9ecef;
        }

        .img-card:hover .img-title>span{
            color: black;
        }
        
        .img-title span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 70%;
        }
        
        .empty-state {
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }
        
        .spinner-border {
            width: 3rem;
            height: 3rem;
        }
        
        @media (max-width: 768px) {
            .img-card {
                width: 150px;
                height: 180px;
            }
            
            .img-card img {
                height: 140px;
            }
            
            .img-title {
                font-size: 0.8rem;
            }
            
            #lp__upload-image .modal-body {
                min-height: 50dvh; /* Lebih kecil di mobile */
                padding: 1rem;
            }
        }
        
        @media (max-width: 576px) {
            .img-card {
                width: 100%;
                max-width: 250px;
                height: auto;
            }
            
            .d-flex.flex-wrap {
                justify-content: center !important;
            }
            
            #lp__upload-image .modal-dialog {
                margin: 0.5rem;
            }
        }
    </style>
    
    <!-- Loading Overlay -->
    <div class="loading-overlay" wire:loading.flex wire:target="loadImage,deleteImage,download">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    
    <div class="card-header bg-white py-3">
        <h5 class="card-title mb-0 fw-semibold text-primary">
            <i class="las la-images me-2"></i>Kelola Foto Pesanan #{{ $bookingId ?? '' }}
        </h5>
    </div>
    
    <div class="card-body" wire:loading.remove wire:target="loadImage,deleteImage,download">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <p class="text-muted mb-0">Total Foto: <span class="fw-semibold">{{ count($images ?? []) }}</span></p>
            </div>
            @if (auth()->user()->hasRole('admin'))
                <button class="btn btn-primary fw-semibold d-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#lp__upload-image">
                    <i class="las la-plus-circle text-white fw-semibold fs-5"></i>
                    Tambah Foto
                </button>
            @endif
        </div>

        @if (count($images ?? []) > 0)
            <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3">
                @foreach ($images as $image)
                    <div class="img-card m-1 shadow-sm border">
                        <a href="{{ data_get($image, 'image') ?? '#' }}" class="w-100 h-100 d-block" target="_blank">
                            <img src="{{ getThumbnail(data_get($image, 'public_id')) }}" alt="image" loading="lazy">
                        </a>

                        <div class="w-100 img-title py-2 px-2">
                            <span class="fw-medium" title="{{ data_get($image, 'title') ?? '' }}">{{ data_get($image, 'title') ?? 'Untitled' }}</span>

                            <div class="dropdown">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="las la-ellipsis-v fs-6"></i>
                                </button>
                                <ul class="dropdown-menu shadow">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2" href="{{ $image['image'] }}" target="_blank">
                                            <i class="las la-eye"></i> Lihat
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center gap-2" href="#" wire:click.prevent="download({{ $image['id'] }})">
                                            <i class="las la-download"></i> Download
                                        </a>
                                    </li>
                                    @if (auth()->user()->hasRole('admin'))
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="#" wire:click.prevent="deleteImage({{ $image['id'] }})">
                                                <i class="las la-trash"></i> Hapus
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="las la-images"></i>
                <h5 class="fw-semibold">Belum Ada Foto!</h5>
                <p class="text-center">
                    @if (auth()->user()->hasRole('admin'))
                        Klik tombol "Tambah Foto" untuk mengunggah foto pertama untuk pesanan ini.
                    @else
                        Belum ada foto yang diunggah untuk pesanan ini.
                    @endif
                </p>
            </div>
        @endif
    </div>

    <!-- Modal Upload -->
    <div class="modal fade" tabindex="-1" id="lp__upload-image">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title d-flex align-items-center gap-2">
                        <i class="las la-cloud-upload-alt"></i> Unggah Foto
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <p class="text-muted mb-2">Format yang didukung: JPG, PNG, GIF</p>
                        <p class="text-muted mb-0">Maksimal ukuran file: 10MB per foto</p>
                    </div>
                    <div class="dropzone flex-grow-1" id="dropzone__lp">
                        <div class="dz-message needsclick d-flex flex-column justify-content-center align-items-center h-100">
                            <i class="las la-cloud-upload-alt display-4 text-muted mb-3"></i>
                            <h5 class="text-muted">Seret file ke sini atau klik untuk memilih</h5>
                            <span class="text-muted">Unggah hingga 10 foto sekaligus</span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" x-ref="uploadBtn" x-on:click="processUpload" class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="las la-upload"></i> Unggah
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        Alpine.data('kelolaFoto', () => ({
            dropzoneTag: null,
            async processUpload(){
                if(this.dropzoneTag == null) return;
                this.dropzoneTag.processQueue();
            },
            initializeDropzone(){
                let element = document.querySelector("#dropzone__lp");

                if (element.dropzone) {
                    element.dropzone.destroy();
                    delete element.dropzone;
                }

                const $this = this;
                const wire = $wire;
                this.dropzoneTag = new Dropzone(element, {
                    url: '{{ route("admin.upload-foto-ps") }}',
                    paramName: 'images',
                    maxFiles: 10,
                    uploadMultiple: true,
                    parallelUploads: 10,
                    maxFilesize: 10,
                    addRemoveLinks: true,
                    acceptedFiles: 'image/*',
                    autoProcessQueue: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    sending: function(file, xhr, formData) {
                        $this.$refs.uploadBtn.disabled = true;
                        formData.append('pesanan_id', '{{ $pesanan_id }}');
                    },
                    init: function(){
                        const dzMessage = document.querySelector('.dz-message');
                        
                        this.on("addedfile", function(file) {
                            if (dzMessage) {
                                dzMessage.classList.add('d-none');
                            }
                        });

                        this.on("removedfile", function(file) {
                            if (this.files.length === 0 && dzMessage) {
                                dzMessage.classList.remove('d-none');
                            }
                        });

                        this.on("maxfilesexceeded", function(file) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Maksimum Upload!',
                                text: 'Maksimum Upload 10 Foto'
                            });
                            this.removeFile(file);
                        });

                        this.on("queuecomplete", function(){
                            this.removeAllFiles();
                        });
                    },
                    success: function (file, response) {
                        if(response.type == 'success'){
                            $this.$refs.uploadBtn.disabled = false;
                            toastr.success(response.msg);
                            $this.updateImages();
                            this.removeFile(file);
                        }
                    },
                    error: function(file, response){
                        if(response.type === 'error'){
                            let errors = '';

                            if(Array.isArray(response.msg)){
                                errors = '<ul style="text-align:left;">';
                                response.msg.forEach(function(msg){
                                    errors += `<li>${msg}</li>`;
                                });
                                errors += '</ul>';
                            } else {
                                errors = response.msg;
                            }

                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal Upload',
                                html: errors
                            });
                        } else {
                            if (file && file.status === 'canceled') {
                                toastr.error("Foto gagal ter-upload!");
                            } else {
                                toastr.error("Foto tidak boleh lebih dari 10 MB");
                            }
                        }

                        $this.$refs.uploadBtn.disabled = false;
                    }
                });
            },
            async updateImages(){
                await @this.call('loadImage');
                const modal = bootstrap.Modal.getInstance(document.getElementById('lp__upload-image'));
                if (modal) {
                    modal.hide();
                }
            },
            init(){
                Dropzone.autoDiscover = false;
                this.$nextTick(() => {
                    this.initializeDropzone();
                });

                Livewire.hook('commit', ({ component, commit, respond, succeed, fail}) => {
                    succeed(() => {
                        if(component.id === @this.__instance.id){
                            this.$nextTick(() => {
                                this.initializeDropzone();
                            });
                        }
                    })
                });

                // Reset dropzone ketika modal ditutup
                document.getElementById('lp__upload-image').addEventListener('hidden.bs.modal', () => {
                    if (this.dropzoneTag) {
                        this.dropzoneTag.removeAllFiles(true);
                        const dzMessage = document.querySelector('#dropzone__lp .dz-message');
                        if (dzMessage) {
                            dzMessage.classList.remove('d-none');
                        }
                    }
                });
            }
        }));
    </script>
@endscript