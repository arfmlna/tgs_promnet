<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
    <i class="fa-solid fa-bars fa-bounce"></i>
</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{route('pretest1')}}" class="text-dark text-decoration-none">
                Pre Test 1
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{route('pretest2')}}" class="text-dark text-decoration-none">
                Pre Test 2
            </a>
        </li>
    </ul>
    </div>
</div>