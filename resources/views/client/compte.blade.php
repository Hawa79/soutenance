  <i class="bi bi-box-arrow-right text-primary"></i>
 <b><a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="logout-link">
                Se déconnecter
            </a></b>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
            <style>
    .card-custom {
        border-radius: 1rem;
        border: 1px solid #e3e3e3;
        transition: all 0.3s ease;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        cursor: pointer;
    }

    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        border-color: #007bff;
    }

    .icon svg {
        width: 32px;
        height: 32px;
        stroke: #007bff;
    }

    .card-title {
        font-weight: 700;
        font-size: 1.1rem;
    }

    .card-text {
        font-size: 0.9rem;
        color: #5a5a5a;
    }

    .logout-link {
        color: #007bff;
        font-weight: 500;
        text-decoration: none;
        transition: 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .logout-link:hover {
        text-decoration: underline;
        color: #0056b3;
    }

    .logout-icon {
        font-size: 1rem;
        transition: transform 0.3s;
    }

    .logout-link:hover .logout-icon {
        transform: translateX(4px);
    }
</style>
