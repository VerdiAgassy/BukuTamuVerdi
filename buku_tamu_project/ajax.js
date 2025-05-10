// Handle Login
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('login', true); // Tambahkan parameter login

            fetch('auth.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success') {
                    window.location.href = 'buku_tamu.php';
                } else {
                    alert(data.message || 'Login gagal!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan jaringan');
            });
        });
    }
});


// Handle register
document.getElementById('registerForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    formData.append('register', true);

    fetch('auth.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success') {
            alert('Registrasi berhasil! Silakan login');
            window.location.href = 'index.php';
        } else {
            alert(data.message || 'Registrasi gagal!');
        }
    });
});


// Handle Guestbook Form
document.addEventListener('DOMContentLoaded', function() {
    const guestForm = document.getElementById('guestForm');
    if (guestForm) {
        let isSubmitting = false; // Tambahkan flag
        
        guestForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if(isSubmitting) return; // Cegah submit ganda
            isSubmitting = true;
            
            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true; // Disable tombol

            fetch('simpan.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === 'success') {
                    location.reload();
                } else {
                    alert(data.message || 'Gagal menyimpan!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Kesalahan jaringan');
            })
            .finally(() => {
                isSubmitting = false;
                submitButton.disabled = false;
            });
        });
    }
});