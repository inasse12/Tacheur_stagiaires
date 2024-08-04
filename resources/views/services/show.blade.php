@extends('layouts.app')

@section('link-css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css"
        integrity="sha512-cHxvm20nkjOUySu7jdwiUxgGy11vuVPE9YeK89geLMLMMEOcKFyS2i+8wo0FOwyQO/bL8Bvq1KMsqK4bbOsPnA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

<div>
    {{-- @include('layouts.sidebar') --}}
    @section('content')
        <div class="container my-5 py-5">

            <!--Section: Design Block-->
            <section>

                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">

                            <div class="card-body">
                                <p class="text-uppercase h4 text-font">Country:</p>
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="https://mdbcdn.b-cdn.net/img/Others/extended-example/usa2.webp"
                                            class="rounded-circle me-2" style="width: 35px;" alt="USA" />
                                    </div>
                                    <div class="col-md-8">
                                        <select class="select">
                                            <option value="1">United States</option>
                                            <option value="2">Spain</option>
                                            <option value="3">Poland</option>
                                            <option value="4">Italy</option>
                                            <option value="5">Greece</option>
                                            <option value="6">Germany</option>
                                            <option value="7">Croatia</option>
                                            <option value="8">Sweden</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card mb-4 accordion" id="accordionExample">
                            <div class="card body accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <div class="accordion-button collapsed text-uppercase text-font h4" type="button"
                                        data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        Promo/Student Code or Vouchers
                                    </div>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-mdb-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="form-outline d-flex">
                                            <input type="text" id="form1" class="form-control" />
                                            <label class="form-label" for="form1">Enter code</label>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="text-uppercase fw-bold mb-3 text-font">Email address</p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>{{ Auth()->user()->email ?? null }}</p>
                                    </div>
                                    {{-- <div class="col-md-7">
                    <button type="button" class="btn btn-outline-dark float-end button-color "
                      data-mdb-ripple-color="dark">
                      Change
                    </button>
                  </div> --}}
                                </div>


                            </div>
                        </div>
                    </div>

                    @if ($TacheurService)
                        <div class="col-md-4 mb-4 position-static">
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h5 class="mb-0 text-font">Parcourir les tâcheurs et les prix</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            @if ($TacheurService->tacheur->user->image)
                                                <img id="img"
                                                    src="{{ Storage::url($TacheurService->tacheur->user->image->path) }}"
                                                    class="rounded-3" style="width: 100px;" alt="TACHEUR" />
                                            @else
                                                <img src="{{ Storage::url($TacheurService->service->images->path) }}"
                                                    class="rounded-3" style="width: 100px;" alt="Blue Jeans Jacket" />
                                            @endif

                                        </div>
                                        <div class="col-md-6 ms-3">
                                            <span id="tarif" class="mb-0 text-price">{{ $TacheurService->tarifs }}
                                                DH</span>
                                            <p id="nom" class="mb-0 text-descriptions">
                                                {{ $TacheurService->tacheur->user->nom }} </p>
                                            <span id="prenom"
                                                class="text-descriptions fw-bold">{{ $TacheurService->tacheur->user->prenom }}
                                            </span>
                                            <span id="email"
                                                class="text-descriptions fw-bold">{{ $TacheurService->tacheur->user->email }}
                                            </span>
                                            <p id="tele" class="text-descriptions mt-0">
                                                {{ $TacheurService->tacheur->user->telephone }} </p>
                                        </div>
                                    </div>
                                    <div class="card-footer mt-4">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 text-muted">
                                                Subtotal
                                                <span id="total1">{{ $TacheurService->tarifs }} DH</span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center px-0 fw-bold text-uppercase">
                                                TOTAL À PAYER
                                                <span id="total2">{{ $TacheurService->tarifs }} DH</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-8 mb-4">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0 text-font text-uppercase">Delivery address</h5>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{ route('ChoixServices') }}">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="date" id="form11Example1" class="form-control"
                                                    name="startTravail" />
                                                <label class="form-label" for="form11Example1">start Travail</label>
                                                <x-input-error :messages="$errors->get('startTravail')" class="mt-2" />

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-outline">
                                                <input type="date" id="form11Example2" class="form-control"
                                                    name="finTravail" />
                                                <label class="form-label" for="form11Example2">fin Travail</label>
                                                <x-input-error :messages="$errors->get('finTravail')" class="mt-2" />

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Text input -->
                                    <div class="form-outline mb-4">
                                        <input type="number" min="1" value="1" id="form11Example3"
                                            class="form-control" name="nbr_houre" onchange="changeprice()" />
                                        <label class="form-label" for="form11Example3">nbr houre</label>
                                        <x-input-error :messages="$errors->get('nbr_houre')" class="mt-2" />

                                    </div>

                                    <!-- Text input -->
                                    <div class="form-outline mb-4">
                                        <input type="text" id="form11Example4" class="form-control" name="adresse" />
                                        <label class="form-label" for="form11Example4">Address</label>
                                        <x-input-error :messages="$errors->get('adresse')" class="mt-2" />

                                    </div>
                                    <!-- Message input -->
                                    <div class="form-outline mb-4">
                                        <textarea class="form-control" id="form11Example7" rows="4" name="detailTache"></textarea>
                                        <label class="form-label" for="form11Example7">detaille Tache</label>
                                        <x-input-error :messages="$errors->get('detailTache')" class="mt-2" />

                                    </div>
                                    @if ($TacheurService)
                                        <!-- Checkbox -->
                                        <input type="text"  class="form-control" id="idt"
                                            name="tacheur_service_id" value="{{ $TacheurService->id }}" hidden />
                                    @endif

                                    {{-- Show taskers --}}
                                    <button type="button" class="btn btn-primary bg-green-900" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Show taskers
                                        available</button>

                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="py-2">
                                                        <h5 class="modal-title mb-0 text-font" id="exampleModalLabel">
                                                            Taskers availiable</h5>
                                                    </div>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- <form> --}}
                                                    @foreach ($Tacheurs as $tasker)
                                                        <div class="mb-3">
                                                            <span>Choose Tasker :</span>
                                                            <input data-bs-dismiss="modal" aria-label="Close" type="radio" id="tasker{{ $tasker->id }}" name="tasker" value="{{ $tasker->id }}"
                                                                onclick="choix('{{ $tasker->id }}','{{ $tasker->tarifs }}','{{ $tasker->tacheur->user->email }}','{{ $tasker->tacheur->user->telephone }}','{{ $tasker->tacheur->user->nom }}','{{ $tasker->tacheur->user->prenom }}','{{ Storage::url($tasker->tacheur->user->image->path ?? null) }}')">

                                                            <p class="col-form-label fw-bold">
                                                                {{ $tasker->tacheur->user->nom }}
                                                                {{ $tasker->tacheur->user->prenom }}</p>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    @if ($tasker->tacheur->user->image)
                                                                        <img src="{{ Storage::url($tasker->tacheur->user->image->path) }}"
                                                                            class="rounded-3" style="width: 100px;"
                                                                            alt="Blue Jeans Jacket" />
                                                                    @else
                                                                        <img src="{{ Storage::url($tasker->service->images->path) }}"
                                                                            class="rounded-3" style="width: 100px;"
                                                                            alt="Blue Jeans Jacket" />
                                                                    @endif
                                                                </div>
                                                                <div class="col-md-6 ms-3">
                                                                    <p class="text-descriptions">Price :
                                                                        <strong>{{ $tasker->tarifs }} DH
                                                                            per/hours</strong>
                                                                    </p>
                                                                    <p class="text-descriptions">Email :
                                                                        <strong>{{ $tasker->tacheur->user->email }}</strong>
                                                                    </p>
                                                                    <p class="text-descriptions mt-0">Phone :
                                                                        <strong>{{ $tasker->tacheur->user->telephone }}</strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <hr>
                                                        </div>
                                                    @endforeach
                                                    {{-- </form> --}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" style="background-color: grey;"
                                                        class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" style="background-color: rgb(70, 64, 153);"
                                                        class="btn btn-primary" data-bs-dismiss="modal"
                                                        aria-label="Close">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>

                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn button-order col-md-10">Place order</button>
                        </div>

                    </div>
                    </form>
                    @if ($TacheurService)
                        <input type="number" name="" id="trf" hidden
                            value="{{ $TacheurService->tarifs }}">
                    @endif




                </div>

            </section>
            <!--Section: Design Block-->

        </div>

        <style>
            .text-font {
                font-family: futura-pt, Tahoma, Geneva, Verdana, Arial, sans-serif;
                font-weight: 700;
                letter-spacing: .156rem;
                font-size: 1.125rem;
            }

            .text-price {
                padding: 0 .625rem;
                font-family: futura-pt, Tahoma, Geneva, Verdana, Arial, sans-serif;
                font-style: normal;
                font-size: .75rem;
                font-weight: 700;
                line-height: .813rem;
                letter-spacing: 1.6px;
            }

            .text-descriptions {
                font-family: futura-pt, Tahoma, Geneva, Verdana, Arial, sans-serif;
                font-style: normal;
                font-size: .75rem;
                font-weight: 400;
                line-height: 1.125rem;
                margin: .313rem 0 .938rem;
                padding: 0 .625rem;
            }

            .button-color {
                color: #4e4e4e;
                border-color: #4e4e4e;
            }

            .button-order {
                font-family: futura-pt, Tahoma, Geneva, Verdana, Arial, sans-serif;
                font-style: normal;
                font-size: .75rem;
                font-weight: 700;
                background-color: hsl(90, 40%, 50%);
                color: white;
            }

            .title-style {
                font-family: Georgia, 'Times New Roman', Times, serif;
                font-weight: 700;
                font-size: 20px;
                color: hsl(52, 0%, 98%);
            }

            .title-quote {
                font-family: Georgia, 'Times New Roman', Times, serif;
                font-weight: 400;
                color: hsl(52, 0%, 98%);
            }

            #toTop {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 30px;
                z-index: 99;
                font-size: 15px;
                outline: none;
                background-color: lightblue;
                /* color: white; */
                cursor: pointer;
                padding: 15px;
                border-radius: 50px;
            }

            #toTop:hover {
                background-color: #555;
                color: white;
            }
        </style>

        <script>
            // Get the button
            let mybutton = document.getElementById("toTop");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

            function choix(id, tarifs, email, phone, nom, prenom, path) {

                document.getElementById('tarif').innerHTML = tarifs + "DH";
                document.getElementById('trf').value = Number(tarifs);
                document.getElementById('total1').innerHTML = Number(Number(document.getElementById('form11Example3').value) *
                    Number(tarifs)) + "DH";
                document.getElementById('total2').innerHTML = Number(Number(document.getElementById('form11Example3').value) *
                    Number(tarifs)) + "DH";
                document.getElementById('email').innerHTML = email;
                document.getElementById('tele').innerHTML = phone;
                document.getElementById('nom').innerHTML = nom;
                document.getElementById('prenom').innerHTML = prenom;
                document.getElementById('img').src = path;
                document.getElementById('idt').value = id;

            }

            function changeprice() {
                document.getElementById('total1').innerHTML = Number(Number(document.getElementById('form11Example3').value) *
                    Number(document.getElementById('trf').value)) + "DH";
                document.getElementById('total2').innerHTML = Number(Number(document.getElementById('form11Example3').value) *
                    Number(document.getElementById('trf').value)) + "DH";

            }
        </script>
    @endsection
</div>
