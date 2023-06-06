@extends('layouts.adm')

@section('content')

  <body>
    
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

    <main class="px-md-5">

    <section class="text-center container">
      <div class="row py-lg-4" >
          <p>
            <a href="/admin" class="btn btn-secondary my-2">Go Back</a>
          </p>
      </div>
    </section>

      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col" style="width: 10%">No</th>
              <th scope="col" style="width: 30%">Username</th>
              <th scope="col" style="width: 25%">Total Price</th>
              <th scope="col" style="width: 10%">Status</th>
              <th scope="col" style="width: 5%">Action</th>
            </tr>
          </thead>
          <tbody class = "align-middle">

          @foreach($invoices as $invoice)

            <tr>
              <td>{{$counter}}</td>
              <td>{{$invoice->username}}</td>
              <td>{{$invoice->total}}</td>
              @if($invoice->user_id != 0){
                <td>Paid</td>
              }
              @else{
                <td>Not Paid</td>
              }
              <td>
                <button class="btn btn-outline-primary my-1" value = "{{$invoice->id}}">View</button>
              </td>
            </tr>

          @endforeach

          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<footer class="py-5 fixed-bottom bg-secondary" style="--bs-bg-opacity: .2;">
  <div class="container">
    <p class="float-end mb-1">
      <a href="">Back to top</a>
    </p>
    <p class="mb-1">You have reached the end of the page</p>
  </div>
</footer>