@if (\Session::has('success') || \Session::has('error'))
    <style>
        button.swal2-close {
            display: block !important;
        }

        .swal2-content {
            display: none;
        }
        button.swal2-close {
            padding-bottom: 25px !important;
        }
    </style>
@endif
@if (Session::has('success'))
    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 300000
        });

        Toast.fire({
            icon: 'success',
            title: '{{ Session::get('success') }}'
        })
    </script>
@endif

@if (\Session::has('error'))

    <script type="text/javascript">
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 300000
        });

        Toast.fire({
            icon: 'error',
            title: '{{ \Session::get('error') }}'
        })
    </script>
@endif