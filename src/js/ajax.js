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
        console.log(response)
        callback(JSON.parse(response))
      } catch (e) {
        console.log(e);
      }
    },
  });
}
