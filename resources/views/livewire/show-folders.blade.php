<div class="row mt-2">
    <div class="col-12 col-md-6">
        <form wire:submit.prevent='save'>
            <div class="input-group input-group-sm mb-1">
                <input type="file" class="form-control shadow-none" wire:model="folders" id="upload{{ $iteration }}"
                    multiple>
                <button class=" btn btn-primary" type="submit" wire:target='folders' wire:loading.class="disabled">
                    Yükle
                </button>
            </div>
            <div class="text-warning my-1" wire:loading wire:target='folders'>
                Bekleyiniz...
            </div>
            @error ('folders.*') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </form>
    </div>
    <div class="row justify-content-center mt-3">
        <div class=" col-12 col-md-10">
            <div class="card border border-0" style="transform: none;">
                <div class="card-header  border border-0 d-flex align-items-center justify-content-between">
                    <h4 class="text-primary me-3 me-sm-none">Dosyalar</h4>
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
                    <table class="table table-striped table-sm align-middle">
                        <thead class="text-center">
                            <tr>
                                <th>Sıra</th>
                                <th class="text-start">İsim</th>
                                <th>Tür</th>
                                <th>Boyut</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if(count($all))
                            @foreach ( $all as $folder )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $folder->name }}</td>
                                <td>{{ $folder->extension}}</td>
                                @if (intdiv($folder->size,1000000) == 0)
                                <td>{{ intdiv($folder->size,1000)." KB" }}</td>
                                @else
                                <td>{{ intdiv($folder->size,1000000)." MB" }}</td>
                                @endif
                                <td>
                                    <a href="#" type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        wire:click.prevent="delete({{$folder->id}})">Sil</a>
                                    <a href="#" type="button" wire:loading.class='disabled'
                                        wire:click='download({{ $folder }})' class="btn btn-sm btn-success">İndir</a>
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
            <div class="d-flex align-items-center justify-content-center mt-2" wire:target="search"
                wire:loading.class="d-none">
                {{ $all->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" wire:ignore.self id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Silme İşlemi Onaylama</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <p>Dosyayı silmek istediğine emin misin?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Hayır, Silme</button>
                    <button type="button" id="modal-delete-btn" wire:click.prevent="deleteConfirm()"
                        class="btn btn-sm btn-danger" data-bs-dismiss="modal">
                        Evet, Sil
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>