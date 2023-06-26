<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a class="btn btn-dark rounded-0" href="{{ route('designer.upload-design') }}">Upload Design</a>
            </div>
        </div>
        <hr>

        <div class="row">
            @if($uploadProductDesigns->count() === 0)
            <div class="alert alert-dark text-center" role="alert">
                Tidak Ada Design Yang Butuh Verifikasi
              </div>
            @endif
            @foreach ($uploadProductDesigns as $uploadProductDesign)
                <div class="col-lg-5">
                    <img src="{{ $uploadProductDesign->image }}" alt="" width="320" height="320">
                    <div class="d-flex justify-content-center mt-2">
                        <button class="btn btn-warning text-center">Desain menunggu verifikasi admin <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

            <div class="col-lg-7">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nomer ID</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $uploadProductDesign->id }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $uploadProductDesign->title }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $uploadProductDesign->description }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $uploadProductDesign->designCategory->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tags</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $uploadProductDesign->tags }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">URL</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ $uploadProductDesign->url }}" disabled>
                </div>
            </div>

            @endforeach
        </div>
        <hr>
        <div class="row mt-3">
            <p>Daftar desain yang sudah disetujui.</p>
            <p>Informasi jumlah penjualan tiap item.</p>
        </div>
        <div class="row mt-4 justify-content-start" style="gap : 2rem">
            @forelse ($uploadProductDesignApproveds as $uploadProductDesignApproved)
                <div class="col-lg-2 col-6 mt-2">
                    <a href="" class="text-decoration-none text-dark">
                        <div class="card child-card border-0">
                            <img src="{{ $uploadProductDesignApproved->image }}" class="" alt="..." style="border : 0.5px solid black">
                            <div class="card-body mt-2 p-0">
                                <p class="card-title" style="font-family: 'Myriad-Pro Bold';">ID : {{ $uploadProductDesignApproved->id }}</p>
                                <p class="card-title">Terjual : 0</p>

                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="alert alert-dark text-center" role="alert">
                    Tidak ada design yang sudah di setujui
                </div>
            @endforelse

        </div>
    </div>

</div>
