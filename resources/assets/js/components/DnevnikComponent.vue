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
                    <div class="calendar">
                      <div class="calendar-day" v-for="n in 42">{{n}}</div>
                      
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
  .calendar{
    width: 700px;
    height: 600px;
    display:grid;
    grid-template-columns: repeat(7,1fr);
    grid-template-rows: repeat(6,1fr);
    grid-column-gap: 0px;
    grid-row-gap:0px;
  }
  .calendar-day{
    border:1px solid;
    margin: -0.5px;
  }
  .calendar-day:hover{
    border:2px solid blue;
  }
  
</style>

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
