@extends('layouts.app')

@section('content')

    <section class="search-results">


            <header>
                <div class="container">
                    <h2>Napíšte nám</h2>
                </div>
            </header>
        <div class="container">

            <div class="contact-box col-lg-6 offset-lg-3 animated zoomIn">
                <form action="{{ url('sendemail/send') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Meno</label>
                        <input type="text" name="name" class="form-control" required="" placeholder="Meno">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="exaple@example.com">
                    </div>

                    <div class="form-group">
                        <label for="">Správa</label>
                        <textarea name="message" id="" rows="5" class="form-control" required="" placeholder="Vaša správa"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="send" value="Odoslať" class="btn btn-auth btn-lg btn-block " required="">
                    </div>

                </form>

            </div>


        </div>

        </section>
@endsection
