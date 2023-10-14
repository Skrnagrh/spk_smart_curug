@if(session('success'))
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="alert alert-success shadow mx-3" style="background-color: #c3e6cb;">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg> {{ session('success') }}
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

@if(session('error'))
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="alert alert-danger shadow mx-4" style="background-color: #f8d7da;">
            <svg viewBox="0 0 24 24" width="32" height="32" stroke="currentColor" stroke-width="2" fill="none"
                stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                </path>
                <line x1="12" y1="9" x2="12" y2="13"></line>
                <line x1="12" y1="17" x2="12.01" y2="17"></line>
            </svg> {{ session('error') }}
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

<script>
    @if(session('success'))
    window.onload = function() {
        $('#successModal').modal('show');
        setTimeout(function() {
            $('#successModal').modal('hide');
        }, 10000); // Menutup modal setelah 10 detik (5000ms)
    };

    $(document).on('click', function(event) {
        if ($(event.target).closest('.modal-dialog').length === 0) {
            $('#successModal').modal('hide');
        }
    });
    @endif

    @if(session('error'))
    window.onload = function() {
        $('#errorModal').modal('show');
        setTimeout(function() {
            $('#errorModal').modal('hide');
        }, 10000); // Menutup modal setelah 10 detik (5000ms)
    };

    $(document).on('click', function(event) {
        if ($(event.target).closest('.modal-dialog').length === 0) {
            $('#errorModal').modal('hide');
        }
    });
    @endif
</script>