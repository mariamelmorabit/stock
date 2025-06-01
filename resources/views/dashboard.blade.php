@extends('layout.app')
@section('content')

<div class="header d-flex justify-between align-center px-4 py-3 rounded shadow-sm bg-white mb-4">
    <h4 class="fw-bold text-primary">Bienvenue, {{$user->name}} !</h4>
    
    <a href="{{ route('email.form') }}" class="btn btn-outline-primary btn-sm fw-semibold">Envoyer un email</a>
    
</div>

<div class="text-center mx-auto" style="max-width: 900px;">
    <h1 class="display-3 mb-2" style="color:#007bff; font-weight: 900;">✨ Bienvenue ✨</h1>
<br><br>
    <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
        <a href="{{ route('customers') }}" class="btn btn-light shadow-sm border-primary text-primary fw-bold px-4 py-2 rounded-pill btn-hover-scale">Liste des Clients</a>
        <a href="{{ route('suppliers') }}" class="btn btn-light shadow-sm border-secondary text-secondary fw-bold px-4 py-2 rounded-pill btn-hover-scale">Liste des Fournisseurs</a>
        <a href="{{ route('products') }}" class="btn btn-light shadow-sm border-info text-info fw-bold px-4 py-2 rounded-pill btn-hover-scale">Produits par Catégorie</a>
        <a href="/products-by-supplier" class="btn btn-light shadow-sm border-danger text-danger fw-bold px-4 py-2 rounded-pill btn-hover-scale">Produits par Fournisseur</a>
        <a href="/products-by-store" class="btn btn-light shadow-sm border-primary text-primary fw-bold px-4 py-2 rounded-pill btn-hover-scale">Produits par Magasin</a>
        <a href="{{ route('product.by.order') }}" class="btn btn-light shadow-sm border-warning text-warning fw-bold px-4 py-2 rounded-pill btn-hover-scale">Commandes</a>
        <a href="{{ route('orders') }}" class="btn btn-light shadow-sm border-primary text-primary fw-bold px-4 py-2 rounded-pill btn-hover-scale">Commandes (Méthode JS)</a>
        <a href="{{ route('orders.view') }}" class="btn btn-light shadow-sm border-secondary text-secondary fw-bold px-4 py-2 rounded-pill btn-hover-scale">Commandes (Méthode Vue)</a>
    </div>
</div>

<div class="container mx-auto px-4">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10 d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('ordered.products') }}" class="btn btn-outline-info rounded shadow px-4 py-3 btn-hover-scale">Produits Commandés</a>
            <a href="{{ route('same.products.customers') }}" class="btn btn-outline-warning rounded shadow px-4 py-3 btn-hover-scale">Clients ayant commandé les mêmes produits qu’Annabel Stehr</a>
            <a href="{{ route('products.orders_count') }}" class="btn btn-outline-dark rounded shadow px-4 py-3 btn-hover-scale">Nombre de Commandes par Produit</a>
            <a href="{{ route('products.more_than_6_orders') }}" class="btn btn-outline-primary rounded shadow px-4 py-3 btn-hover-scale">Produits avec plus de 6 Commandes</a>
            <a href="{{ route('orders.totals') }}" class="btn btn-outline-danger rounded shadow px-4 py-3 btn-hover-scale">Total par Commande</a>
            <a href="{{ route('orders.greater_than_60') }}" class="btn btn-outline-secondary rounded shadow px-4 py-3 btn-hover-scale">Commandes dont le Total dépasse celle n°60</a>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-10 d-flex flex-wrap justify-content-center gap-3">
            <a href="{{ route('customers.orders') }}" class="btn btn-outline-info rounded shadow px-4 py-3 btn-hover-scale">Requête 1</a>
            <a href="{{ route('suppliers.products') }}" class="btn btn-outline-warning rounded shadow px-4 py-3 btn-hover-scale">Requête 2</a>
            <a href="{{ route('products.same_stores') }}" class="btn btn-outline-dark rounded shadow px-4 py-3 btn-hover-scale">Requête 3</a>
            <a href="{{ route('products.countbystore') }}" class="btn btn-outline-primary rounded shadow px-4 py-3 btn-hover-scale">Requête 4</a>
            <a href="{{ route('store.value') }}" class="btn btn-outline-danger rounded shadow px-4 py-3 btn-hover-scale">Requête 5</a>
            <a href="{{ route('sotre.greater_than_lind') }}" class="btn btn-outline-secondary rounded shadow px-4 py-3 btn-hover-scale">Requête 6</a>
        </div>
    </div>

    <div class="card shadow rounded-4 overflow-hidden mb-5 bg-white">
        <div class="card-header text-primary fw-bold fs-4" style="border-bottom: 2px solid #007bff;">
            Session
        </div>
        <div class="card-body">
            <h5 class="mb-4">Bonjour depuis la session :
                @if(Session::has("SessionName"))
                    <span class="badge bg-success fs-5">{{ Session("SessionName") }}</span>
                @else
                    <span class="text-muted fst-italic">Aucune valeur de session</span>
                @endif
            </h5>

            <form method="POST" action="{{ url('saveSession') }}" class="row g-3 align-items-center">
                @csrf
                <div class="col-auto flex-grow-1">
                    <input type="text" id="txtSession" name="txtSession" class="form-control form-control-lg rounded-pill border-primary" placeholder="Votre nom..." required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4">Enregistrer Session</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow rounded-4 overflow-hidden bg-white">
        <div class="card-header text-info fw-bold fs-4" style="border-bottom: 2px solid #17a2b8;">
            Cookies
        </div>
        <div class="card-body">
            <h5 class="mb-4">Bonjour depuis les cookies :
                @if(Cookie::has("UserName"))
                    <span class="badge bg-success fs-5">{{ Cookie::get("UserName") }}</span>
                @else
                    <span class="text-muted fst-italic">Aucune valeur de cookie</span>
                @endif
            </h5>

            <form method="POST" action="{{ url('saveCookie') }}" class="row g-3 align-items-center">
                @csrf
                <div class="col-auto flex-grow-1">
                    <input type="text" id="txtCookie" name="txtCookie" class="form-control form-control-lg rounded-pill border-info" placeholder="Votre nom..." required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-info btn-lg rounded-pill px-4">Enregistrer Cookie</button>
                </div>
            </form>
        </div>
    </div>
</div>
<a href="{{ route('chart.index') }}" class="btn btn-outline-primary rounded shadow px-4 py-3 btn-hover-scale">Voir Chart Produits</a>

<style>
    body {
        background-color: #f9fafb;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #222;
    }

    .btn-hover-scale {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .btn-hover-scale:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 123, 255, 0.25);
        text-decoration: none;
    }

    .btn-light {
        border-width: 2px !important;
    }

    .card {
        border: none;
    }

    .form-control:focus {
        box-shadow: 0 0 5px 2px rgba(0, 123, 255, 0.3);
        border-color: #007bff;
    }
</style>
@endsection
