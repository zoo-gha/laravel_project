@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="text-center m-2 fs-2">Qui Nous Somme?</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="col-lg-12 col-md-6">
                    <div >
                        <h3>Présentation moha shop</h3>
                        <p>Le mini super marché Moha-Shop et une nouvelle entreprise dans le but de vente des biens. L'entreprise a été créer récemment et son objectif principal est de faciliter la vie des clients qui ont peu de temps en raison de leur préoccupation pour leur travail pour obtenir leurs biens en douceur et facilement sans avoir à se déplacer dans les excellents supermarchés en fournissant tous les produits et plus avec un coût adorable et moins cher que les autres entreprises.</p>
                        <p>L'entreprise a divisé ses produits en plusieurs sections pour faciliter le processus d'acquisition par les clients, ainsi que pour organiser le travail et réduire la période de recherche d'objets de collection.
                            Il affiche également diverses marques bien connues de grande qualité. Parmi les divisions, on retrouve : Le rayon fromage, le rayon lessive, le rayon jus, le rayon sucres de toutes sortes et boissons gazeuses, ainsi que le rayon boulangerie et les confiseries, et rayon bonbons…
                            </p>
                    </div>
                    <div class="col-lg-12  fs-1">
                        <i class="fab fa-facebook-f fs-1"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 image-section">
                <img src="{{ asset('frontend/img/logo.png') }}" alt='logo'/>
            </div>
        </div>
    </div>
@endsection
