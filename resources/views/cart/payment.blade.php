@extends('layouts.store')
@section('content')
<hr>
<div class="row justify-content-center">
    <div class="col-md-6 col-10 my-4 p-3">
        <h3>Dados de Entrega</h3>
            <address class="ms-3">
                <span>{{Auth()->user()->address}}, </span> <span>{{Auth()->user()->number}}</span><br>
                <span>{{Auth()->user()->city}}, </span> <span>{{Auth()->user()->state}} </span><br>
                <span>Telefone para contato: {{Auth()->user()->cellphone}}

            </address>
            <a href="{{ route('user.edit') }}" class="float-end me-4">Trocar o endereço</a>
    </div>
    <div class="col-md-6 col-10 my-4 p-3 bg-light">
        <h3>Resumo da Compra</h3>
        <div class="ms-3">
            <div>
                <span>Quantidade de produtos comprados:</span>
                <a href="{{ route('cart.show') }}" class="float-end me-4">{{ \App\Models\Cart::count()}} produto(s)</a>
            </div>
            <div>
                <span>Frete:</span>
                <span class="float-end me-4 fw-bold">Grátis</span>
            </div>
            <div>
                <span class="h4">Total a pagar:</span>
                <span class="float-end me-4 h4">R$ {{ number_format(\App\Models\Cart::totalValue(), 2, ',' , '.') }}</span>
            </div>
        </div>
    </div>
</div>
<hr>
<form style="margin-top: 25px; margin-bottom: 70px;" method="POST" action="{{ route('order.add') }}">
    <h2>Dados de pagamento</h2>
    @csrf
    <div class="container p-0">
        <div class="card px-4">
            <h3 class="h8 py-3">Seus Dados</h3>
            <div class="row gx-3">
            <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Número do Cartão</p>
                        <input class="form-control mb-3" type="number" placeholder="xxxx xxxx xxxx xxxx" style="background-color: #0C4160; color: white">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Nome do titular (como está gravado no Cartão)</p>
                        <input class="form-control mb-3" type="text" placeholder="NOME" value="" style="background-color: #0C4160; color: white;">
                    </div>
                </div>

                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">Validade</p>
                        <input class="form-control mb-3" type="text" placeholder="MM/YYYY" style="background-color: #0C4160; color: white;">
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex flex-column">
                        <p class="text mb-1">CVV/CVC</p>
                        <input class="form-control mb-3 pt-2 " type="number" placeholder="***" style="background-color: #0C4160; color: white;">
                    </div>
                </div>
                <div class="col-12">
                    <div>
                    <button type="submit" class="btn btn-lg btn-success float-end" style="color: white; background: #30092a; border: none; padding: 15px; border-radius: 12px;"><span class="fas fa-arrow-right"></span>Efetuar Pagamento</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
@endsection
