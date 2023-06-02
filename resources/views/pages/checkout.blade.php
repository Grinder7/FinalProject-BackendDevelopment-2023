@extends('layouts.app')
@section('title', 'Checkout - IndoJuni')
@section('styles')
    <style>
        .container {
            max-width: 960px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>
@endsection
@section('content')
    <div class="containers" style="padding-top:6rem">
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Checkout</h2>
                    <p class="lead">Lengkapi Formulir di Bawah Sesuai Identitas Anda</p>
                </div>

                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Keranjang Anda</span>
                            {{-- PAKE PHP COUNT() --}}
                            <span class="badge bg-primary rounded-pill">{{ count(['aa', 'bb']) }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Product name</h6>
                                    <small class="text-body-secondary">Brief description</small>
                                </div>
                                <span class="text-body-secondary">$12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Second product</h6>
                                    <small class="text-body-secondary">Brief description</small>
                                </div>
                                <span class="text-body-secondary">$8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">Third item</h6>
                                    <small class="text-body-secondary">Brief description</small>
                                </div>
                                <span class="text-body-secondary">$5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (IDR)</span>
                                <strong>$20</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Alamat Pembayaran</h4>
                        <form class="needs-validation" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="firstName" class="form-label">Nama Depan</label>
                                    <input type="text" class="form-control" id="firstName" placeholder=""
                                        value="{{ $payments[0]->firstname }}" required>
                                    <div class="invalid-feedback">
                                        Nama depan harus valid.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastName" class="form-label">Nama Belakang</label>
                                    <input type="text" class="form-control" id="lastName" placeholder=""
                                        value="{{ $payments[0]->lastname }}" required>
                                    <div class="invalid-feedback">
                                        Nama belakang harus valid.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span
                                            class="text-body-secondary">(Opsional)</span></label>
                                    <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                        value="{{ $payments[0]->email }}">
                                    <div class="invalid-feedback">
                                        Mohon masukkan email yang valid untuk pembaruan pengiriman.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                                        value="{{ $payments[0]->address }}" required>
                                    <div class="invalid-feedback">
                                        Mohon masukkan alamat pengiriman anda.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="address2" class="form-label">Alamat 2 <span
                                            class="text-body-secondary">(Opsional)</span></label>
                                    <input type="text" class="form-control" id="address2"
                                        placeholder="Apartment or suite" value="{{ $payments[0]->address2 }}">
                                </div>

                                <div class="col-md-5">
                                    <label for="country" class="form-label">Negara</label>
                                    <select class="form-select" id="country" disabled>
                                        <option>Indonesia</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="state" class="form-label">Kota/Kabupaten</label>
                                    <select class="form-select" id="state" required>
                                        <option value="">Pilih...</option>
                                        <option>Malang</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Mohon masukkan kota/kabupaten anda.
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="zip" class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" id="zip" placeholder=""
                                        value="{{ $payments[0]->zip }}"required>
                                    <div class="invalid-feedback">
                                        Kode pos diperlukan.
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="save-info"
                                    @if ($payments[0]->remember_detail) checked @endif>
                                <label class="form-check-label" for="save-info">Simpan informasi ini untuk
                                    kedepannya</label>
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Pembayaran</h4>

                            <div class="my-3">
                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                        checked required>
                                    <label class="form-check-label" for="credit">Kartu Kredit</label>
                                </div>
                                <div class="form-check">
                                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input"
                                        required>
                                    <label class="form-check-label" for="debit">Kartu Debit</label>
                                </div>
                                <div class="form-check">
                                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input"
                                        required>
                                    <label class="form-check-label" for="paypal">PayPal</label>
                                </div>
                            </div>

                            <div class="row gy-3">
                                <div class="col-md-6">
                                    <label for="cc-name" class="form-label">Nama pada kartu</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                    <small class="text-body-secondary">Nama Lengkap sesuai kartu</small>
                                    <div class="invalid-feedback">
                                        Nama pada kartu diperlukan
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="cc-number" class="form-label">Nomor Kartu</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Nomor kartu diperlukan
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="cc-expiration" class="form-label">Masa Berlaku</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder=""
                                        required>
                                    <div class="invalid-feedback">
                                        Tanggal kadaluarsa diperlukan
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="cc-cvv" class="form-label">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback">
                                        CVV diperlukan
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" type="submit">Lanjutkan Pembayaran</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    @endsection
    @section('scripts')
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>
    @endsection
