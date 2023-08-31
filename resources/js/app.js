import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    const verMasButton = document.getElementById('ver-mas');
    let currentPage = 1;
    let loadMore = true;

    verMasButton.addEventListener('click', function() {
        if (loadMore) {
            currentPage++;

            fetch(`/cargar-mas-posts?page=${currentPage}`)
                .then(response => response.json())
                .then(data => {
                    if (data.html) {  
                        const postContainer = document.querySelector('.posts-container');
                        postContainer.insertAdjacentHTML('beforeend', data.html);
                    } else {
                        verMasButton.style.display = 'none';
                    }
                })
                .catch(error => console.error(error));
        }
    });
});
