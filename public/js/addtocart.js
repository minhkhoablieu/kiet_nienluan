document.getElementById('add_to_cart').onclick = function(){
	Swal.fire({
    title: 'Bạn muốn mua bao nhiêu sản phẩm này?',
    input: 'text',
    inputAttributes: {
      autocapitalize: 'off'
    },
    showCancelButton: true,
    cancelButtonColor: '#d33',
      cancelButtonText: 'Hủy',
    confirmButtonText: 'Xác nhận',
    showLoaderOnConfirm: true,
    preConfirm: (login) => {
      return fetch(`//api.github.com/users/${login}`,{
          method: 'POST'
      })
        .then(response => {
          if (!response.ok) {
            throw new Error(response.statusText)
          }
          return response.json()
        })
        .catch(error => {
          Swal.showValidationMessage(
            `Request failed: ${error}`
          )
        })
    },
    allowOutsideClick: () => !Swal.isLoading()
  }).then((result) => {
    if (result.value) {
      Swal.fire(
        `Bạn đã thêm ${result.value.login} sản phẩm vào giỏ `,
        '',
        'success'
        // imageUrl: result.value.avatar_url
      )
    }
  })

};

