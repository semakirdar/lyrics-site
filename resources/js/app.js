require('./bootstrap');
require('@popperjs/core');
window.toastr = require('toastr');
const bootstrap = require('bootstrap');
const Swal = require('sweetalert2');


let addPlaylist = document.querySelectorAll('.add-play-list-button');
let playlistModal = document.querySelector('.playlist-modal');
let playListName = document.querySelectorAll('.play-list-name');

addPlaylist.forEach(function (item, i) {
    item.addEventListener('click', function () {
        playlistModal.style.display = 'block';
        let id = item.dataset.id;
        document.getElementById('trackId').value = id;

    });
});

playListName.forEach(function (item, i) {
    item.addEventListener('click', function () {
        let id = item.dataset.id;
        document.getElementById('playlistId').value = id;
        document.getElementById('playlistForm').submit();
    });
});

let playlistAdd = document.getElementById('playlistAdd');

let playlistList = document.getElementById('playlist-list');
let playlistCreate = document.getElementById('playlist-create');

playlistAdd.addEventListener('click', function () {
    playlistCreate.style.display = 'block';
    playlistList.style.display = 'none';
});

if (document.querySelector('.playlist-delete')) {
    let playlistDeleteForm = document.querySelector('.playlist-delete');
    playlistDeleteForm.addEventListener('submit', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                playlistDeleteForm.submit();
            }
        });
    });
}

if (document.querySelector('.logout-a')) {
    let logout = document.querySelector('.logout-a');
    let logoutForm = document.querySelector('.logout-form');

    logout.addEventListener('click', function () {

        Swal.fire({
            title: 'Are you sure?',
            text: "Are You Want Logout?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                logoutForm.submit();
            }
        });
    });
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
