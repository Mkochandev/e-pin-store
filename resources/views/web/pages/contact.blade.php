@extends('web.layout.main')

@section('content')
    <main class="main">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="title" style="color: #fff;">Bizimle İletişime Geçin</h2>
                    <div class="contact-info mt-4">
                        <div class="mb-3">
                            <h4 style="color: #0088cc;"><i class="fas fa-map-marker-alt mr-2"></i> Adres</h4>
                            <p style="color: #aaa;">{{ $contact->address }}</p>
                        </div>
                        <div class="mb-3">
                            <h4 style="color: #0088cc;"><i class="fas fa-phone mr-2"></i> Telefon</h4>
                            <p style="color: #aaa;">{{ $contact->phone }}</p>
                        </div>
                        <div class="mb-3">
                            <h4 style="color: #0088cc;"><i class="fas fa-envelope mr-2"></i> E-posta</h4>
                            <p style="color: #aaa;">{{ $contact->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <h2 class="title" style="color: #fff;">Mesaj Gönderin</h2>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name"
                                    class="form-control bg-dark border-secondary text-white" placeholder="Adınız *" required
                                    style="height: 50px;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email"
                                    class="form-control bg-dark border-secondary text-white"
                                    placeholder="E-posta Adresiniz *" required style="height: 50px;">
                            </div>
                        </div>
                        <input type="text" name="subject" class="form-control bg-dark border-secondary text-white mt-3"
                            placeholder="Konu" style="height: 50px;">

                        <textarea name="message" class="form-control bg-dark border-secondary text-white mt-3" rows="5"
                            placeholder="Mesajınız *" required></textarea>

                        <button type="submit" class="btn btn-primary btn-lg mt-3">MESAJI GÖNDER</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
