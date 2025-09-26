<div class="w-100" x-data="kelolaFoto">
    <style>
        #lp__upload-image .modal-body{
            height: 70dvh;
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
        }
    </style>

    <div wire:loading.remove wire:target="loadImage">
        @if (auth()->user()->hasRole('admin'))
            <div class="d-flex justify-content-end px-1 mb-3">
                <button class="btn btn-primary fw-semibold d-flex align-items-center justify-content-center gap-1" data-bs-toggle="modal" data-bs-target="#lp__upload-image">
                    <i class="las la-plus text-white fw-semibold fs-5"></i>
                    Tambah Foto
                </button>
            </div>
        @endif

        <div class="d-flex flex-wrap gap-3">
            @if (count($images ?? []) > 0)
                @foreach ($images as $image)
                    <div class="img-card m-1 shadow-sm border rounded">
                        <a href="{{ data_get($image, 'image') ?? '#' }}" class="w-100 h-100">
                            <img src="{{ getThumbnail(data_get($image, 'public_id')) }}" alt="image" loading="lazy">
                        </a>

                        <div class="w-100 img-title py-2 px-1 rounded-bottom">
                            <span>{{ data_get($image, 'title') ?? '' }}</span>

                            <div class="dropend">
                                <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="las la-ellipsis-v fs-6"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ $image['image'] }}" target="_blank">Lihat</a></li>
                                    <li><a class="dropdown-item" href="#" wire:click.prevent="download({{ $image['id'] }})">Download</a></li>
                                    @if (auth()->user()->hasRole('admin'))
                                        <li><a class="dropdown-item" href="#" wire:click.prevent="deleteImage({{ $image['id'] }})">Hapus</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="d-flex justify-content-center align-items-center w-100" style="height: 300px;">
                    <h5 class="fw-semibold opacity-50">Belum Ada Foto!</h5>
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="lp__upload-image">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Unggah Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="dropzone" id="dropzone__lp"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" x-ref="uploadBtn" x-on:click="processUpload" class="btn btn-primary w-100">Unggah</button>
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
                // await @this.call('loadImage');
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
            }
        }));
    </script>
@endscript
