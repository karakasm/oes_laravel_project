<div class="row justify-content-center">
    <div class="col-12 col-lg-8 ">
        <div class="card border-0" style="transform: none;">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="text-primary me-3 me-sm-none">Duyurular</h4>
                {{-- <input type="text" wire:model.debounce.500ms="search" class="form-control w-50 shadow-none" --}}
                    {{-- placeholder="Duyuru Bul...">--}}
                <div class="input-group w-50">
                    <input type="text" wire:model.lazy="search" class="form-control shadow-none"
                        placeholder="Duyuru Ara">
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
            <div wire:loading.remove wire:target="search" class="card-body">
                <div class="list-group list-group-flush">
                    @if(count($announcements))
                    @foreach($announcements as $anno)
                    <li class="list-group-item">
                        <div class="d-flex mb-2 w-100 justify-content-between">
                            <h5>{!! $anno->title !!}</h5>
                            <p class="text-danger">{{$anno->status}}</p>
                        </div>
                        <div class="vstack gap-1">
                            <small class="text-muted ">{{$anno->updated_at->format("d F Y H:i")}}</small>
                            <p>{!! \Illuminate\Support\Str::limit(htmlspecialchars_decode($anno->content),150) !!} </p>
                        </div>
                        <div class="hstack gap-2">
                            <small class="text-muted">{{$anno->course->code." ".$anno->course->number." -
                                ".$anno->course->name." / CRN: ".$anno->course->id}}</small>
                            <a href="{{route('courses.announcements.show',['course'=>$anno->course,'announcement' => $anno])}}"
                                class="btn btn-sm btn-outline-primary ms-auto">Detay</a>
                            <a href="{{route('courses.announcements.edit',['course'=>$anno->course,'announcement' => $anno])}}"
                                class="btn btn-sm btn-outline-success">Güncelle</a>
                            <button type="button" class="btn btn-sm btn-outline-danger"
                                wire:click.prevent="delete({{$anno->id}})" data-bs-toggle="modal"
                                data-bs-target="#deleteModal">Sil</button>
                        </div>
                    </li>
                    <hr class="m-0">
                    @endforeach
                    @else
                    <div class="alert alert-info" role="alert">
                        İlgili sınıfa/sorguya ait bir duyuru bulunmamaktadır!
                    </div>
                    @endif
                </div>

            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center mt-2" wire:target="search"
            wire:loading.class="d-none">
            {{ $announcements->links() }}
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
                    <p>Duyuruyu silmek istediğine emin misin?</p>
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