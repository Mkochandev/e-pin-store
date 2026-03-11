<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-left nav-links">
                @if (auth()->check())
                    <a href="{{ route('profile') }}">Hesabım</a>
                @else
                    <a href="{{ route('login') }}">Hesabım</a>
                @endif
                <a href="{{ route('shop') }}">Tüm Oyunlar</a>
            </div>
        </div>
    </div>
    <div class="footer-middle">
        <div class="container">
            <div class="footer-left">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('upload/about/' . $logo->logo) }}" class="logo-footer" alt="E-Pin Logo">
                </a>
                <div class="social-icons">
                    @foreach ($socials as $social)
                        <a href="{{ $social->link }}" class="social-icon" target="_blank" title="{{ $social->name }}">
                            <i class="fab fa-{{ strtolower($social->name) }}"></i>
                        </a>
                    @endforeach
                </div>
            </div>
            <img src="{{ asset('epin-assets/images/payments_long.png') }}" alt="Ödeme Yöntemleri" width="180"
                height="28">
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container justify-content-center">
            <p>© Copyright {{ date('Y') }}. Tüm Hakları Saklıdır.</p>
        </div>
    </div>
</footer>
</div>

<script src="{{ asset('epin-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('epin-assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('epin-assets/js/plugins.js') }}"></script>
<script src="{{ asset('epin-assets/js/optional/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('epin-assets/js/optional/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('epin-assets/js/jquery.appear.min.js') }}"></script>

<script src="{{ asset('epin-assets/js/main.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $(document).on('click', '.add-to-wishlist', function (e) {
            e.preventDefault();

            var btn = $(this);
            var gameId = btn.data('game-id');
            var platformId = btn.data('platform-id');

            $.ajax({
                url: "{{ route('wishlist.toggle') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    game_id: gameId,
                    platform_id: platformId
                },
                success: function (response) {
                    if (response.status === 'added') {
                        btn.find('i').removeClass('fa-heart').addClass('fa-heart').css('color', '#e74c3c');
                        showToast(response.message, 'success');
                    } else if (response.status === 'removed') {
                        btn.find('i').css('color', '');
                        showToast(response.message, 'info');
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 401) {
                        window.location.href = "{{ route('login') }}";
                    } else {
                        showToast('Bir hata oluştu. Lütfen tekrar deneyin.', 'error');
                    }
                }
            });
        });

        function showToast(message, type) {
            var bgColor = '#28a745';
            if (type === 'info') bgColor = '#17a2b8';
            if (type === 'error') bgColor = '#dc3545';

            var toast = $('<div class="wishlist-toast">' + message + '</div>');
            toast.css({
                'position': 'fixed',
                'top': '20px',
                'right': '20px',
                'background': bgColor,
                'color': '#fff',
                'padding': '12px 24px',
                'border-radius': '8px',
                'box-shadow': '0 4px 12px rgba(0,0,0,0.2)',
                'z-index': '99999',
                'font-size': '14px',
                'opacity': '0',
                'transition': 'opacity 0.3s ease'
            });

            $('body').append(toast);
            setTimeout(function () { toast.css('opacity', '1'); }, 10);
            setTimeout(function () {
                toast.css('opacity', '0');
                setTimeout(function () { toast.remove(); }, 300);
            }, 3000);
        }
    });
</script>

</body>

</html>