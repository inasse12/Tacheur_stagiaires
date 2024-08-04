@extends('layouts.auth')
@section('content')

    @if (Auth()->user()->role == 'Client')
        <main class="main-content position-relative max-height-vh-100 mt-1 border-radius-lg ">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Services <span class="text-xs text-secondary mb-0">juste</span>
                                    ({{ $services->count() }})</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nom</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Description</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Action</th>
                                                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> --}}
                                                {{-- <th class="text-secondary opacity-7"></th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td>
                                                    <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img class="avatar avatar-sm me-3"
                                                                    src="{{ Storage::url($service->path) }}"
                                                                    alt="SERVICE">
                                                                {{-- <img src="{{ asset('images/img/team-2.jpg') }}"
                                                                    class="avatar avatar-sm me-3" alt="user1"> --}}
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $service->nom }}</h6>
                                                                {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">{{ $service->description }}
                                                        </p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <a href="{{ route('Travail', $service->id) }}">
                                                            <span class="badge badge-sm bg-gradient-success">obtenir de
                                                                l'aide avec ce service</span>
                                                        </a>
                                                    </td>
                                                    {{-- <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            Edit
                                                        </a>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <a href="{{ route('services.index') }}">Voir plus de services</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @elseif (Auth()->user()->role == 'Tacheur')
        <main class="main-content position-relative max-height-vh-100 mt-1 border-radius-lg ">

            <div class="container-fluid py-4">

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">L'argent d'aujourd'hui
                                            </p>
                                            <h5 class="font-weight-bolder mb-0">
                                                {{ $todaySolde }} Dhs
                                                <span class="text-success text-sm font-weight-bolder">+55%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Totale d'argents</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                {{ $totalSolde }} Dhs
                                                <span class="text-success text-sm font-weight-bolder">+3%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Ton Service</p>
                                            <h5 class=" text-sm mb-0">
                                                {{ $tonservice->service->nom ?? null }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Services Finis</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                {{ $servicesCount }}
                                                <span class="text-success text-sm font-weight-bolder">+5%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>

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

                                <h6>Demandes de travails reçue</h6><br>

                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Adresse</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    task details</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    start work & hours</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Services and client</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Etat</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Action</th>
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
                                                                <p class="text-xs text-secondary mb-0">
                                                                    {{ $travail->adresse }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $travail->detailTache }}</p>
                                                        <p class="text-xs text-secondary mb-0">{{ $travail->detailTache }}
                                                        </p>
                                                    </td>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $travail->startTravail }}
                                                        </p>
                                                        <p class="text-xs text-secondary mb-0">{{ $travail->nbr_houre }}
                                                            Hours
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
                                                                    {{ $travail->user->nom }} {{ $travail->user->prenom }}
                                                                </p>
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
                                                        <form action="{{ route('acceptorrefus', $travail->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <td>
                                                                <select name="etat" id="etat-select">
                                                                    <option value="choose" selected disabled>Accept or
                                                                        Refuse:</option>
                                                                    <option value="refuse">Refuse</option>
                                                                    <option value="accept">Accept</option>
                                                                </select>

                                                                <div id="motif-input" style="display: none;">
                                                                    <label for="motifRefus">Motif Refus :</label>
                                                                    <input type="text" name="motifRefus"
                                                                        id="motifRefus" placeholder="Motif Refus . . ."
                                                                        autofocus>
                                                                </div>

                                                                <button type="submit" class="btn">Confirm</button>
                                                            </td>
                                                        </form>
                                                    @else
                                                        <form action="#" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <td>
                                                                <button type="button"
                                                                    class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
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
    @endif

@endsection
