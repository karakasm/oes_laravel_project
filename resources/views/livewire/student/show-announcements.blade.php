<div class="row justify-content-center">
    <div class="col-12 col-lg-8 ">
        <div class="card border-0" style="transform: none;">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="text-primary">Duyurular</h4>
                <input type="text" wire:model="search" class="form-control w-50 shadow-none"
                       placeholder="Duyuru Bul...">
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @if(count($announcements))
                        @foreach($announcements as $anno)
                            <li class="list-group-item">
                                <h5 class="mb-2">{!! $anno->title  !!}</h5>
                                <div class="vstack gap-1">
                                    <small class="text-muted ">{{$anno->created_at->format("d F Y H:i")}}</small>
                                    <p>{!! \Illuminate\Support\Str::limit(htmlspecialchars_decode($anno->content),150)  !!}  </p>
                                </div>
                                <div class="hstack gap-2">
                                    <small class="text-muted">{{$anno->course->code." ".$anno->course->number." - ".$anno->course->name." / CRN: ".$anno->course->id}}</small>
                                    <a href="{{route('student.courses.announcements.show',['course'=>$anno->course,'announcement' => $anno])}}" class="btn btn-sm btn-outline-primary ms-auto">Detay</a>
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
        {{ $announcements->links() }}
    </div>
</div>
