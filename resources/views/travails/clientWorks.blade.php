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
                            @if (session('demandeService'))
                                <div class="alert alert-danger">
                                    {{ session('demandeService') }}
                                </div>
                            @endif

                            @switch(Request::path())
                                @case('getnewTravailforClient')
                                    <h6>Mes services demandés</h6>
                                    @break

                                @case('acceptforClient')
                                    <h6>Services accepté</h6>
                                    @break

                                @case('finishforClient')
                                    <h6>Services terminés</h6>
                                    @break

                                @case('refuseforClient')
                                    <h6>Services refusé</h6>
                                    @break

                                @case('getallTravailforClient')
                                    <h6>Tous les demandes de travails</h6>
                                    @break
                            @endswitch

                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Service & adresse</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Détails Service</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Debut service & heures travail</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Fin service</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tacheur</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Etat</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($travails as $travail)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{ $travail->tacheur_service->service->nom }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{ $travail->adresse }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $travail->detailTache }}</p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $travail->startTravail }}
                                                    </p>
                                                    <p class="text-xs text-secondary mb-0">{{ $travail->nbr_houre }} heures
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $travail->finTravail }}</p>
                                                </td>

                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            @if ($travail->tacheur_service->tacheur->user && $travail->tacheur_service->tacheur->user->image)
                                                                <img src="{{ Storage::url($travail->tacheur_service->tacheur->user->path) }}"
                                                                    class="avatar avatar-sm me-3" alt="user1">
                                                            @else
                                                                <img src="{{ asset('images/sign.jpg') }}"
                                                                    class="avatar avatar-sm me-3" alt="user1">
                                                            @endif
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{ $travail->tacheur_service->tacheur->user->nom }}
                                                                {{ $travail->tacheur_service->tacheur->user->prenom }}</h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $travail->tacheur_service->tarifs }}$ /h</p>
                                                        </div>
                                                    </div>
                                                </td>

                                                @if ($travail->etat)
                                                    <td class="align-middle text-center text-sm">
                                                        @if ($travail->etat == 'accept')
                                                            <span
                                                                class="badge badge-sm bg-gradient-success">{{ $travail->etat }}</span>
                                                        @elseif ($travail->etat == 'refuse')
                                                            <span
                                                                class="badge badge-sm bg-gradient-danger">{{ $travail->etat }}</span>
                                                            <p class="text-xs font-weight-bold mb-0">Motif de refus:
                                                                <br>{{ $travail->motifRefus }}</p>
                                                        @else
                                                            <span class="badge badge-sm bg-gradient-success">{{ $travail->etat }}</span>
                                                    <td>
                                                        <form action="{{ route('deleteDemandeService', $travail->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                    <td>
                                                            <input type="image" src="{{ asset('images/supprimer.jpg') }}" alt="Submit" width="48" height="48">
                                                        </td>
                                                    </form>
                                                    </td>
                                                    <td>
                                                  <form action="{{ route('updateDemandeService', $travail->id) }}" method="POST">
                                                       @csrf
                                                      @method('PUT')
                                                     

                                                        <input type="image" src="{{ asset('images/stylo.png') }}" alt="Update" width="25" height="25">
                                                        </form>
                                                         </td>

                                                @endif
                                                </td>
                                                @if ($travail->etat == 'accept')
                                                    <td>
                                                        <a class="badge badge-sm bg-gradient-info"
                                                            href="{{ route('message', $travail->id) }}">Message</a>
                                                    </td>
                                                    <td>
                                                        <a class="badge badge-sm bg-gradient-success"
                                                            href="{{ route('Fin_travail', $travail->id) }}">Finsh</a>
                                                    </td>
                                                @endif
                                            @else
                                                <td class="text-sm">En cours . . .</td>
                                        @endif

                                        </tr>
                                    @empty
                                        <td rowspan="6" colspan="6" class="text-center p-3">
                                            <span>Pas de services</span>
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
@endsection
