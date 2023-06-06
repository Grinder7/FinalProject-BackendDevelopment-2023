<div class="container mt-auto">
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top @if(Request::is('admin*')) border-black @else border-white @endif">
            <div class="col-md-4 d-flex align-items-center">
                <a href="https://getbootstrap.com/" target="_blank" class="mb-3 me-2 mb-md-0 text-decoration-none lh-1">
                    <i class="fa-brands fa-bootstrap" style="color: rgb(255,255,255);"></i>
                </a>
                <span class="mb-3 mb-md-0 @if(Request::is('admin*')) text-black @else text-white @endif">&copy; 2023 IndoJuni, Inc</span>
            </div>
            <p class="float-end mb-1">
                <a class="fw-bold back-to-top @if(Request::is('admin*')) text-black @else text-white @endif" href="#" style="text-decoration: none">Back to top
                    &uarr;</a>
            </p>
        </footer>
    </div>
</div>
