<!-- Header Bar -->
<header class="w3-bar w3-white w3-card-2">
    <div class="w3-content">

        <!-- Logo (always visible) -->
        <a href="{{ route('dashboard') }}" class="w3-bar-item w3-button w3-large gradient-text">HealthForge</a>

        <!-- Hamburger Icon (Mobile Only) -->
        <!-- The 'onclick' attribute has been removed. We will add the event in JS -->
        <a href="javascript:void(0)" id="hamburger-button"
            class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium w3-large">
            &#9776; <!-- Hamburger Icon -->
        </a>

        <!-- Desktop Links (Hidden on Small) -->
        <div class="w3-right w3-hide-small">
            @role('admin')
                <a href="{{ route('admin.dashboard') }}" class="w3-bar-item w3-text-blue w3-button w3-hover-white w3-padding-large">
                    Admin Dashboard
                </a>
            @endrole

            <!-- Desktop Logout Form -->
            <form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                @csrf
                <button type="submit"
                    class="w3-bar-item w3-button w3-round w3-text-blue w3-hover-white w3-padding-large">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>

<!-- Mobile Navigation Menu (Hidden by default) -->
<!-- We've removed style="display:none" and added the w3-hide class -->
<div id="mobileNav" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-card-2">

    @role('admin')
        <a href="{{ route('admin.dashboard') }}"
            class="w3-bar-item w3-button w3-text-blue w3-hover-light-grey w3-padding-large">
            Admin Dashboard
        </a>
    @endrole

    <!-- Mobile Logout Form -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="w3-bar-item w3-button w3-text-blue w3-hover-light-grey w3-padding-large w3-block w3-left-align">
            Logout
        </button>
    </form>
</div>

<script>
    $(document).ready(function() {
        // Find the hamburger button by its ID
        $('#hamburger-button').on('click', function() {
            // Find the mobile nav by its ID and toggle the 'w3-show' class
            $('#mobileNav').toggleClass('w3-show');
        });
    });
</script>
