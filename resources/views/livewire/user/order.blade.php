<div>
    <div class="main">
        @forelse ($transactions as $transaction)
        <article class="card mt-3">
            <div class="card-body">
                <h6 style="font-family:'Myriad-Pro Bold';">Order ID: {{ $transaction->code }}</h6>
                <article class="card">
                    <div class="card-body">
                        <div class="row ms-5">
                            <div class="col-4"> <strong style="font-family:'Myriad-Pro Bold';">Penerima :</strong> <br>
                                {{ auth()->user()->first_name }} </div>
                            <div class="col-4"> <strong style="font-family:'Myriad-Pro Bold';">Status :</strong> <br>
                                {{ $transaction->status }} </div>
                            <div class="col-4"> <strong style="font-family:'Myriad-Pro Bold';">Kurir :</strong>
                                {{ $transaction->courier }} <br> <strong style="font-family:'Myriad-Pro Bold';">Resi :</strong>
                                {{ $transaction->resi }} </div>
                        </div>
                    </div>
                </article>
                <hr>
                <ul class="row justify-content-centers">
                    @foreach ($transaction->transactionDetails as $transactionDetail)
                    <li class="col-6">
                        <figure class="itemside mb-3">
                            <div class="aside">
                                <img src="{{ $transactionDetail->uploadProductDesign->uploadProductDesignVariants->first()->image }}" class="border " width="100">
                            </div>
                            <figcaption class="info align-self-center">
                                <p class="title fs-5" style="font-family:'Myriad-Pro Bold';">{{ $transactionDetail->uploadProductDesign->category->name }} <br> <span> {{ $transactionDetail->size }}, <br> Qty : x1</span>
                                </p><span class="fs-4" style="font-family: 'Myriad-Pro Bold';">Rp {{ number_format($transactionDetail->price, 0, ',','.') }} </span>
                            </figcaption>
                        </figure>
                    </li>
                    @endforeach


                </ul>
                <hr>
            </div>
        </article>
        @empty
        <div class="alert alert-dark text-center mt-5" role="alert">
            Tidak ada data pesanan
          </div>

        @endforelse

    </div>
</div>
