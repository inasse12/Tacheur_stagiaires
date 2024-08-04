@extends('layouts.auth')
@section('content')
    <main class="main-content position-relative max-height-vh-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            @if (Request::is('getnewTravailforTacheur'))
                                <h6>Demandes de travails reçue</h6>

                            @elseif (Request::is('acceptforTacheur'))
                                <h6>Services accepté</h6>

                            @elseif (Request::is('refuseforTacheur'))
                                <h6>Services refusé</h6>

                            @elseif (Request::is('getallTravailforTacheur'))
                                <h6>Tous les demandes de travails reçue</h6>

                            @elseif (Request::is('finishfortacheur'))
                                <h6>Services terminés</h6>
                            @endif

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adresse</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">task details</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">start work & hours</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Services and client</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Etat</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($travails as $travail)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $travail->adresse }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $travail->adresse }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $travail->detailTache }}</p>
                                                    <p class="text-xs text-secondary mb-0">{{ $travail->detailTache }}</p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $travail->startTravail }}
                                                    </p>
                                                    <p class="text-xs text-secondary mb-0">{{ $travail->nbr_houre }} Hours
                                                    </p>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            @if ($travail->tacheur_service->tacheur->user && $travail->tacheur_service->tacheur->user->image)
                                                                <img src="{{ Storage::url($travail->tacheur_service->tacheur->user->image->path) }}"
                                                                    class="avatar avatar-sm me-3" alt="user1">
                                                            @else
                                                                <img src="{{ asset('images/img/team-2.jpg') }}"
                                                                    class="avatar avatar-sm me-3" alt="user1">
                                                            @endif
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{ $travail->tacheur_service->service->nom }}</h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $travail->user->nom }} {{ $travail->user->prenom }}</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="d-flex flex-column justify-content-center">
                                                    {{ $travail->etat }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('message', $travail->id) }}">Message</a>
                                                </td>

                                                @if (!$travail->etat)
                                                    <form action="{{ route('acceptorrefus', $travail->id) }}" method="POST">
                                                        @csrf
                                                        <td>
                                                            <select name="etat" id="etat-select">
                                                                <option value="choose" selected disabled>Accept or Refuse:</option>
                                                                <option value="refuse">Refuse</option>
                                                                <option value="accept">Accept</option>
                                                            </select>

                                                            <div id="motif-input" style="display: none;">
                                                                <label for="motifRefus">Motif Refus :</label>
                                                                <input type="text" name="motifRefus" id="motifRefus"
                                                                    placeholder="Motif Refus . . ." autofocus>
                                                            </div>

                                                            <button type="submit" class="btn">Confirm</button>
                                                        </td>
                                                    </form>
                                                @else
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <td>
                                                            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                                        </td>
                                                    </form>
                                                @endif

                                            </tr>
                                        @empty
                                            <td rowspan="6" colspan="6">
                                                <span>No request found !</span>
                                            </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        const selectBox = document.getElementById('etat-select');
        const motifInput = document.getElementById('motif-input');

        selectBox.addEventListener('change', () => {
            if (selectBox.value === 'refuse') {
                motifInput.style.display = 'block';
            } else {
                motifInput.style.display = 'none';
            }
        });
    </script>
@endsection
