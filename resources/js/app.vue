<template>
    <div class="container py-4">
      <header class="pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
          <span class="fs-4">SD IDBC OFFICIAL</span>
        </a>
      </header>
  
      <div class="p-4 mb-4 bg-light border rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold text-center">Bagaimana Pelayanan dan Fasilitas Kami😁</h1>
        </div>
      </div>
  
      <div class="row align-items-md-stretch">

        <div class="col-md-3 mx-5 text-center">
          <div class="bg-light border rounded-3">
            <button class="btn btn-success" @click="survey(1)"><h1 style="font-size: 200px;">😉</h1><br /><h3>SANGAT PUAS</h3></button>
          </div>
        </div>
        <div class="col-md-3 mx-5 text-center">
          <div class="bg-light border rounded-3">
            <button class="btn btn-info" @click="survey(2)"><h1 style="font-size: 200px;">🙂</h1><br /><h3>PUAS</h3></button>
          </div>
        </div>
        <div class="col-md-3 mx-5 text-center">
          <div class="bg-light border rounded-3">
            <button class="btn btn-danger" @click="survey(3)"><h1 style="font-size: 200px;">😒</h1><br /><h3>KECEWA</h3></button>
          </div>
        </div>
      
      </div>
    </div>
  </template>
  
  <script>
      import axios from 'axios';
      
      export default {
                  
          methods: {
              survey(value) {
                let opt;
                if (value == 1) {
                  opt = "Sangat Puas"
                  alert(`Terima Kasih Atas Penilaian Anda \n Semoga Anda Selalu Puas Dengan Pelayanan Kami😸`)
                } else if (value == 2) {
                  opt = "Puas"
                  alert(`Terima Kasih Atas Penilaian Anda \n Semoga Pelayanannya Bisa Lebih Kami Tingkatkan😸`)
                } else if (value == 3) {
                  opt = "Kecewa"
                  alert(`Terima Kasih Atas Penilaian Anda \n Mohon Maaf Atas Kekecewaan Anda Kepada Kami😿`)
                }

                  console.log(`Anda Memilih Opsi`, opt);
                  var body = {
                      value: value,
                      // field_name: field_value,
                  };
                  axios({
                      method: 'post',
                      url: '/surveys',
                      data: body
                  })
                  .then(function (response) {
                      console.log(response);
                  })
                  .catch(function (error) {
                      console.log(error);
                  });
              }
          }
      }
  </script>