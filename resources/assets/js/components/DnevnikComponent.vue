<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <input v-model="id" v-on:keyup.enter="changeId">
                    <div class="panel-heading">{{ info.name }}</div>

                    <div class="panel-body">
                        {{ info.msg }}
                    </div>

                </div>
            </div>
        </div>
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
