<template>
  <div class="container py-4">
    <header class="pb-3 mb-4 border-bottom">
      <div class="row">
        <div class="col-lg-4">
          <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4">SD IDBC OFFICIAL</span>
          </a>
        </div>
        <div class="col-lg-4 text-center bg-success rounded text-success px-0">
          <h2 class="bg-white mx-5 mt-2 rounded">{{ formatTime(hour) }}:{{ formatTime(minute) }}:{{ formatTime(second) }}
            WIB</h2>
        </div>

        <div class="col-lg-4 text-end">
          <h3>{{ day }}, {{ date }} {{ month }} {{ year }}</h3>
        </div>
      </div>
    </header>

    <div class="p-4 mb-4 bg-light border rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold text-center">Bagaimana Pelayanan dan Fasilitas Kami😁</h1>
      </div>
    </div>

    <div class="row align-items-md-stretch">

      <div class="col-md-3 mx-5 text-center">
        <div class="bg-light border rounded-3">
          <button class="btn btn-success" @click="survey(1)">
            <h1 style="font-size: 200px;">😉</h1><br />
            <h3>SANGAT PUAS</h3>
          </button>
          <!-- <br /> <br />
          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" :style="{ width: (value1 / total * 100) + '%' }">{{
              (value1 / total * 100).toFixed(2) }}%</div>
          </div> -->
        </div>
      </div>
      <div class="col-md-3 mx-5 text-center">
        <div class="bg-light border rounded-3">
          <button class="btn btn-info" @click="survey(2)">
            <h1 style="font-size: 200px;">🙂</h1><br />
            <h3>PUAS</h3>
          </button>
          <!-- <br /> <br />
          <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" :style="{ width: (value2 / total * 100) + '%' }">{{
              (value2 / total * 100).toFixed(2) }}%</div>
          </div> -->
        </div>
      </div>
      <div class="col-md-3 mx-5 text-center">
        <div class="bg-light border rounded-3">
          <button class="btn btn-danger" @click="survey(3)">
            <h1 style="font-size: 200px;">😒</h1><br />
            <h3>KECEWA</h3>
          </button>
        </div>
      </div>

    </div>
  </div>
</template>
  
<script>
import axios from 'axios';
import { shallowReadonly } from 'vue';

export default {

  data() {
    return {
      day: '',
      date: '',
      month: '',
      year: '',
      hour: '',
      minute: '',
      second: ''
    };
  },
  created() {
    this.updateTime();
    setInterval(() => {
      this.updateTime();
    }, 1000);
  },


  methods: {

    updateTime() {
      const weekdays = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

      const today = new Date();

      this.day = weekdays[today.getDay()];
      this.date = today.getDate();
      this.month = months[today.getMonth()];
      this.year = today.getFullYear();
      this.hour = today.getHours();
      this.minute = today.getMinutes();
      this.second = today.getSeconds();
    },
    formatTime(time) {
      return time.toString().padStart(2, '0');
    },



    survey(value) {
      let opt;

      if (value == 1) {
        opt = "Sangat Puas",
          Swal.fire({
            icon: 'success',
            title: 'Terima Kasih',
            text: 'Atas Partisipasinya Dalam Survei Kami😸',
            timer: 5000,
            allowOutsideClick: false,
            showConfirmButton: false
          })
      } else if (value == 2) {
        opt = "Puas"
        Swal.fire({
          icon: 'success',
          title: 'Terima Kasih',
          text: 'Atas Partisipasinya Dalam Survei Kami😸',
          timer: 5000,
          allowOutsideClick: false,
          showConfirmButton: false
        })
      } else if (value == 3) {
        opt = "Kecewa"
        Swal.fire({
          icon: 'success',
          title: 'Terima Kasih',
          text: 'Atas Partisipasinya Dalam Survei Kami😸',
          timer: 5000,
          allowOutsideClick: false,
          showConfirmButton: false
        })
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
  },

}
</script>