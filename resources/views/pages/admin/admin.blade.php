@extends('layouts.adm')

@section('content')

<div class="card bg-light border-secondary align-self-middle p-3" id="mainBox">
  <div class = "d-flex justify-content-between mb-5">
    <h1 id = "randomText">Create New Data</h1>
    <a class = "btn btn-outline-danger align-right squareButton hideSidebar">X</a>
  </div>

  <div class = "d-flex">
    <div class="d-flex card bg-secondary border-secondary p-1" id="imgBox">
      <img src="{{asset('images/app/product/0lxKQl2mvqEh70XLvgIA.png')}}" class="centerItem " alt="cover" style="object-fit: cover">
    </div>

    <div class = "ms-5 w-50">
      <div class = "input-group mb-3">
        <span class = "input-group-text w-25">Name</span>
        <input type="text" class = "form-control" value = "Input">
      </div>

      <div class = "input-group mb-3">
        <span class = "input-group-text">Description</span>
        <textarea type="text" class = "form-control" rows = "5"></textarea>
      </div>

      <div class = "input-group mb-3">
        <span class = "input-group-text">Stock</span>
        <input type="number" class = "form-control">
      </div>

      <div class = "input-group mb-3">
        <span class = "input-group-text">Price</span>
        <input type="number" class = "form-control">
      </div>

      <div class = "input-group mb-3">
        <span class = "input-group-text">Image</span>
        <input type="file" class = "form-control">
      </div>
    </div>
  </div>

  <div class = "bottom-0 end-0 position-absolute" style = "transform: translate(-90%, -75%);">
   <a class = "btn btn-outline-success btn-lg align-right hideSidebar">Confirm</a>
  </div>

</div>

<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
        <strong>&nbsp;Admin Page</strong>
      </a>
      <li><a href="/" class="text-white">Log Out</a></li>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Hello, Admin</h1>
        <p>
          <a href="/admin/invoice" class="btn btn-secondary my-2">View invoices</a>
        </p>
        <p class="lead text-muted"><br><br><br></p>
        <p>
          <button class="btn btn-primary my-2 showSidebar" value = "0">Add new data</button>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">




        
        @foreach($products as $product)

        <div class="col-lg-4 d-flex align-items-stretch mb-3">
          <div class="card shadow-sm">
          <img src="{{ asset($product->img) }}" alt="cover" height="225"
                                    style="object-fit: contain">

            <div class="card-body d-flex flex-column">
              <p class="card-text"><b>{{$product->name}} (Rp{{$product->price}},00)</b>,<br>{{$product->description}}</p>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary showSidebar" value="{{$product->id}}">Edit</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                </div>
                <small class="text-muted">{{$product->stock}} item(s)</small>
              </div>
            </div>
          </div>
        </div>

        @endforeach






      </div>

    </div>
  </div>

</main>

<footer class="py-5 bg-secondary" style="--bs-bg-opacity: .2;">
  <div class="container">
    <p class="float-end mb-1">
      <a href="">Back to top</a>
    </p>
    <p class="mb-1">You have reached the end of the page</p>
  </div>
</footer>