require('./bootstrap');
require('@popperjs/core');
window.toastr = require('toastr');
require('bootstrap');


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
