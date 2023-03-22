<div class="row justify-content-center">
    <div class="col-12 col-lg-8 ">
        <div class="card border-0" style="transform: none;">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="text-primary">Duyurular</h4>
                {{-- <input type="text" wire:model="search" class="form-control w-50 shadow-none"
                    placeholder="Duyuru Bul..."> --}}
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
            <div wire:target="search" wire:loading.remove class="card-body">
                <div class="list-group list-group-flush">
                    @if(count($announcements))
                    @foreach($announcements as $anno)
                    <li class="list-group-item">
                        <h5 class="mb-2">{!! $anno->title !!}</h5>
                        <div class="vstack gap-1">
                            <small class="text-muted ">{{$anno->updated_at->format("d F Y H:i")}}</small>
                            <p>{!! \Illuminate\Support\Str::limit(htmlspecialchars_decode($anno->content),150) !!} </p>
                        </div>
                        <div class="hstack gap-2">
                            <small class="text-muted">{{$anno->course->code." ".$anno->course->number." -
                                ".$anno->course->name." / CRN: ".$anno->course->id}}</small>
                            <a href="{{route('student.courses.announcements.show',['course'=>$anno->course,'announcement' => $anno])}}"
                                class="btn btn-sm btn-outline-primary ms-auto">Detay</a>
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
        <div class="mt-2 d-flex align-items-center justify-content-center" wire:target="search"
            wire:loading.class="d-none">
            {{ $announcements->links() }}
        </div>
    </div>
</div>