<div class="row justify-content-center mt-3">
    <div class=" col-12">
        <div class="card" style="transform: none;">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="text-primary me-3 me-sm-none">Dosyalarım</h4>
                <div class="input-group w-50">
                    <input type="text" wire:model.lazy="search" class="form-control shadow-none"
                        placeholder="Dosya Ara">
                    <button class="btn btn-sm btn-outline-primary rounded-end" type="button"
                        wire:loading.class="disabled">
                        <span wire:loading wire:target="search" class="spinner-border spinner-border-sm"
                            role="status"></span>
                        <small class="d-none" wire:loading wire:target="search"
                            wire:loading.class.remove="d-none">Yükleniyor</small>
                        <i class="bi bi-search" wire:target="search" wire:loading.remove></i>
                    </button>
                </div>
            </div>
            <div wire:loading.remove wire:target="search" class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sıra</th>
                            <th>İsim</th>
                            <th>Uzantı</th>
                            <th>Boyut</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($folders))
                        @foreach ( $folders as $folder )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $folder->name }}</td>
                            <td>{{ $folder->extension}}</td>
                            @if (intdiv($folder->size,1000000) == 0)
                            <td>{{ intdiv($folder->size,1000)." KB" }}</td>
                            @else
                            <td>{{ intdiv($folder->size,1000000)." MB" }}</td>
                            @endif
                            <td>
                                <a href="#" type="button" wire:loading.class='disabled'
                                    wire:click='download({{ $folder }})' class="btn btn-sm btn-success">İndir</a>
                                @if(session()->has('file-not-found'))
                                <span class="text-warning my-1">
                                    {{ session('file-not-found') }}
                                </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="alert alert-info" role="alert">
                                İlgili sınıfa/sorguya ait bir dosya bulunmamaktadır!
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>