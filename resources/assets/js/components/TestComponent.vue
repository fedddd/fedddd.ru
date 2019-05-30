<template>
    <div class="container">
        test test test
    </div>
</template>

<script>
    export default {
    data() {
    return {
      info: null,
      id: 1
    };
    },
        mounted() {
            console.log('Component mounted.');
            axios
      .get('/api/dnevnik/' + this.id)
      .then(response => (this.info = response.data));
        },

   methods: {
    changeId: function () {
           axios
      .get('/api/dnevnik/' + this.id)
      .then(response => (this.info = response.data))
      .catch(response =>(this.info.msg = 'страница не найдена',this.info.name= 'страница не найдена')); 
    }
  }



    }
</script>
