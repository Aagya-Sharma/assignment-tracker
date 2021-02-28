<footer>
    <p>
        Copyright &copy; Assignment
        @auth
        
        <a class="logout" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
        </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endauth
    </p>
</footer>