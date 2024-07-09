function ajax(data, callback) {
  $.ajax({
    async: true,
    url: "",
    type: "POST",
    contentType: false,
    data: data,
    processData: false,
    cache: false,
    beforeSend: function () {},
    timeout: 10000,
    success: function (response) {
      try {
        const result = JSON.parse(response)
        console.log('logs: ', result)
        callback(result)
        limpia()
      } catch (e) {
        console.log(e);
      }
    },
  });
}
