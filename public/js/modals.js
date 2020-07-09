$('#modal-index').on('show.bs.modal', event => {
  updateModal(event)
});

const updateModal = (modalEvent = null) => {
  const { operation, config, contract, id=null } = (modalEvent === null) ? JSON.parse(event.srcElement.getAttribute('data-settings')) : $(modalEvent.relatedTarget).data('settings');

  console.log(operation, config, contract, id);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
    url: ((operation === 'create') && (config !== 'attestation')) ? `/modal/${contract}/${operation}/${config}` : `/modal/${contract}/${operation}/${config}/${id}`,
    type: 'get',
    success: (data) => {
      $('.modal-body').html(data);
    },
    error: err => {
      console.log(err);
    }
  });
}
