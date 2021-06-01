/**
 * Global js included on admin layout when Livewire is present
 */

/**
  * Throws toast auto dismissed in 3sec
  * 
  * @param array data
  * [0] - success, warning or error
  * [1] - Title
  * 
  * @info implementation from livewire controller
  * $this->emit('sweet-toast', ['success', 'Saved']);
  * 
  */
Livewire.on('sweet-toast', data => {
  swal.fire({
    title: data[1],
    icon: data[0],
    timer: 3000,
    toast: true,
    position: "top-end",
    showConfirmButton: false
  });
});

/**
  * Throws info modal
  * 
  * @param array data
  * [0] - success, warning or error
  * [1] - Title
  * 
  * @info implementation from livewire controller
  * $this->emit('sweet-info-model', ['success', 'Data has beed stored to db']);
  * 
  */
Livewire.on('sweet-info-model', data => {
  swal.fire({
    text: data[1],
    icon: data[0]
  });
});

/**
  * Reloads current page
  */
Livewire.on('reload-page', () => {
  window.location.reload();
});

/**
 * Confirms user with sweetalert2 before proceeding with livewire event
 * 
 * @param string title 
 * @param string event_name 
 * @param mixed event_data 
 * @param string type 
 * @param message message 
 */
window.sweetConfirmLivewireEvent = function (title, event_name, event_data, type = 'info', message = null) {
  Swal.fire({
    icon: type,
    title: title,
    text: message,
    showCloseButton: true,
    showCancelButton: true,
    preConfirm: () => {
        Livewire.emit(event_name, event_data);
    },
  });
}