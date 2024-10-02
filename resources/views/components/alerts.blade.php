    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Nice...",
                text: "{{ session('success') }}",
            });
        </script>
    @endif

    @if (session('loginSuccess'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })

            Toast.fire({
                icon: 'success',
                title: '{{ session('loginSuccess') }}',
            })
        </script>
    @endif

    @if (session('logoutSuccess'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-right',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })

            Toast.fire({
                icon: 'warning',
                title: '{{ session('logoutSuccess') }}',
            })
        </script>
    @endif
