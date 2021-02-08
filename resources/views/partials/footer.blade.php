<div class="container">
    <div class="row">
        <div class="col-12 col-sm-4 ">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo-footer" src="{{ asset('images/logo_footer.png') }}" alt="" width="100">
            </a>
        </div>

        <div class="col-12 col-sm-4 ">
            <p class="global-footer text-center">Chutné online recepty</p>
        </div>


        <div class="col-12 col-sm-4 footer-link">
            <a href="{{ url('recipe/create') }}" class="btn-add-recipe-footer">
                <i class="fas fa-plus-circle"></i> Pridať recept
            </a>
        </div>


    </div>
</div>

<div class="global-contact">
    <div class="container">
        <p><a href="{{ route('contact') }}" class="contact-link">Kontakt</a></p>
    </div>
</div> 


